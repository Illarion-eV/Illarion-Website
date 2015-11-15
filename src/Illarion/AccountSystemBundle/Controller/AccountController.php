<?php

namespace Illarion\AccountSystemBundle\Controller;

use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Exception\TableNotFoundException;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use FOS\RestBundle\Controller\Annotations as RestAnnotations;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use Illarion\AccountSystemBundle\Exception\UnexpectedTypeException;
use Illarion\AccountSystemBundle\Form\AccountCreateType;
use Illarion\AccountSystemBundle\Form\AccountUpdateType;
use Illarion\DatabaseBundle\Entity\Accounts\Account;
use Illarion\DatabaseBundle\Entity\Accounts\AccountUnconfirmed;
use Illarion\DatabaseBundle\Entity\Server\Chars;
use Illarion\SecurityBundle\Security\User\User;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * This is the controller that contains the operations that are relevant to handle the personal account.
 *
 * @package Illarion\AccountSystemBundle\Controller
 * @RestAnnotations\RouteResource("account")
 */
class AccountController extends FOSRestController
{
    /**
     * Get the basic information about the account. This function will also return the list of characters on all servers
     * in case there are any. This function requires a logged in user as it relies on the account information of the
     * user that is currently logged into the system.
     *
     * @return View
     * @RestAnnotations\Get("/account")
     * @RestAnnotations\View()
     * @ApiDoc(
     *     authentication = true,
     *     authenticationRoles = {"ROLE_PLAYER"},
     *     resource = true,
     *     description = "Get the basic account information and the character lists.",
     *     statusCodes = {
     *         200 = "In case the request was correctly processed."
     *     }
     * )
     */
    public function getAction()
    {
        $usr = $this->get('security.token_storage')->getToken()->getUser();

        if (!($usr instanceof User))
            throw new UnexpectedTypeException($usr, User::class);

        $account = $usr->getAccount();

        $data = array(
            'name' => $account->getLogin(),
            'state' => $account->getState(),
            'maxChars' => $account->getMaxChars(),
            'lang' => $account->getLanguage() ? 'de' : 'en',
            'chars' => array()
        );

        $data['chars']['illarionserver'] = self::buildCharList($account->getIllarionServerChars());

        try
        {
            $data['chars']['testserver'] = self::buildCharList($account->getTestServerChars());
        } catch (TableNotFoundException $ignored) {}

        try
        {
            $data['chars']['devserver'] = self::buildCharList($account->getDevServerChars());
        } catch (TableNotFoundException $ignored) {}

        $data['create'] = array();

        $translator = $this->get('translator');

        if (count($data['chars']['illarionserver']) < $account->getMaxChars())
        {
            $data['create'][] = array(
                'route' => $this->generateUrl('account_post_character', array('server' => 'illarionserver'), UrlGeneratorInterface::ABSOLUTE_URL),
                'name' => $translator->trans('Game Server')
            );
        }

        if (!$this->get('security.authorization_checker')->isGranted('ROLE_TESTSERVER_ACCESS'))
        {
            $data['create'][] = array(
                'route' => $this->generateUrl('account_post_character', array('server' => 'testserver'), UrlGeneratorInterface::ABSOLUTE_URL),
                'name' => $translator->trans('Test Server')
            );
        }

        if (!$this->get('security.authorization_checker')->isGranted('ROLE_DEVSERVER_ACCESS'))
        {
            $data['create'][] = array(
                'route' => $this->generateUrl('account_post_character', array('server' => 'devserver'), UrlGeneratorInterface::ABSOLUTE_URL),
                'name' => $translator->trans('Development Server')
            );
        }

        $view = $this->view()->create($data, 200);

        return $view;
    }

    /**
     * Convert a list of character entities to the data set that contains all the information required by a user of the
     * account system.
     *
     * @param Collection $chars the characters
     * @return array the data generated for the json
     */
    private static function buildCharList(Collection $chars)
    {
        $list = array();
        foreach ($chars as $char)
        {
            if (!($char instanceof Chars))
                throw new UnexpectedTypeException($char, Chars::class);

            $t1 = new \DateTime();
            $t2 = new \DateTime();
            $t2->add(new \DateInterval('PT' . $char->getOnlinetime() . 'S'));
            $onlineTime = $t2->diff($t1);
            $lastSaveDate = $t1;
            $lastSaveDate->setTimestamp($char->getLastsavetime());

            $list[] = array(
                'name' => $char->getName(),
                'status' => $char->getStatus(),
                'race' => $char->getRaceTypeId(),
                'sex' => $char->getRaceTypeId(),
                'lastSaveTime' => $lastSaveDate,
                'onlineTime' => $onlineTime
            );
        }
        return $list;
    }

    /**
     * Create a new account. This will right away create a new account if the supplied values allow it.
     *
     * @param Request $request
     * @return View
     * @RestAnnotations\Post("/account")
     * @RestAnnotations\View()
     * @ApiDoc(
     *     resource = true,
     *     description = "Create a new account.",
     *     input = "Illarion\AccountSystemBundle\Form\AccountCreateType",
     *     statusCodes = {
     *         201 = "Returned in case the account was correctly created.",
     *         400 = "In case the payload for the request was illegal."
     *     }
     * )
     */
    public function postAction(Request $request)
    {
        $form = $this->createForm(new AccountCreateType());
        $form->handleRequest($request);

        $translator = $this->get('translator');

        if (!$form->isSubmitted())
        {
            return $this->view()->create(array('error' => array(
                'code' => 400,
                'message' => $translator->trans('Missing data. This function requires at least the name and the password field to be populated.'),
                'form' => $form
            )), 400);
        }

        if (!$form->isValid())
        {
            return $this->view()->create(array('error' => array(
                'code' => 400,
                'message' => $translator->trans('The validation of the submitted values failed.'),
                'form' => $form
            )), 400);
        }

        $data = $form->getData();
        $em = $this->getDoctrineManager();
        $passwordEncoder = $this->get('illarion.security.password.encoder');

        $newAccount = new Account();
        $newAccount->setLogin($data['name']);

        $newAccount->setPassword($passwordEncoder->encodePassword($data['password'], '$1$illarion$'));
        $newAccount->setRegisterDate(new \DateTime());
        $newAccount->setLastIp($request->getClientIp());
        $newAccount->setLanguage($request->getPreferredLanguage(array('de', 'en')) == 'de' ? 0 : 1);
        $newAccount->setState(3);
        $newAccount->setMaxChars(5);

        try
        {
            $em->persist($newAccount);
            $em->flush();
            $em->refresh($newAccount);
        }
        catch (UniqueConstraintViolationException $ex)
        {
            return $this->view()->create(array('error' => array(
                'code' => 400,
                'message' => $translator->trans('The name or the E-Mail address is already used.')
            )), 400);
        }

        if (isset($data['email']))
        {
            $this->storeAndRequestMailConfirm($newAccount, $data['email']);
        }

        return $this->view()->create($translator->trans('Account created.'), 201);
    }

    /**
     * Update the information of the currently logged in account. This function will raise a error in case no entries
     * are changed. Only values that are part of the data send will be updated.
     *
     * @param Request $request
     * @return View
     * @RestAnnotations\Put("/account")
     * @RestAnnotations\View()
     * @ApiDoc(
     *     authentication = true,
     *     authenticationRoles = {"ROLE_PLAYER"},
     *     resource = true,
     *     description = "Update a existing account",
     *     input = "Illarion\AccountSystemBundle\Form\AccountUpdateType",
     *     statusCodes = {
     *         202 = "Returned in case the account was correctly updated.",
     *         400 = "In case the payload for the request was illegal."
     *     }
     * )
     */
    public function putAction(Request $request)
    {
        $form = $this->createForm(new AccountUpdateType());
        $form->handleRequest($request);

        $translator = $this->get('translator');

        if (!$form->isSubmitted())
        {
            return $this->view()->create(array('error' => array(
                'code' => 400,
                'message' => $translator->trans('Missing data. This function requires any filled entry.'),
                'form' => $form
            )), 400);
        }

        if (!$form->isValid())
        {
            return $this->view()->create(array('error' => array(
                'code' => 400,
                'message' => $translator->trans('The validation of the submitted values failed.'),
                'form' => $form
            )), 400);
        }

        $data = $form->getData();
        $em = $this->getDoctrineManager();

        $usr = $this->get('security.token_storage')->getToken()->getUser();

        if (!($usr instanceof User))
            throw new UnexpectedTypeException($usr, User::class);

        $account = $usr->getAccount();

        $passwordEncoder = $this->get('illarion.security.password.encoder');

        if (isset($data['password']) && strlen($data['password']) > 0)
            $account->setPassword($passwordEncoder->encodePassword($data['password'], '$1$illarion$'));

        $account->setLastIp($request->getClientIp());
        $account->setLanguage($request->getPreferredLanguage(array('de', 'en')) == 'de' ? 0 : 1);

        try
        {
            $em->persist($account);
            $em->flush();
        }
        catch (UniqueConstraintViolationException $ex)
        {
            return $this->view()->create(array('error' => array(
                'code' => 400,
                'message' => $translator->trans('The name or the E-Mail address is already used.')
            )), 400);
        }

        if (isset($data['email']))
        {
            $this->storeAndRequestMailConfirm($account, $data['email']);
        }

        return $this->view()->create($translator->trans('Account updated.'), 202);
    }

    /**
     * Remove the currently logged in account completely.
     *
     * @return View
     * @RestAnnotations\Delete("/account")
     * @RestAnnotations\View()
     * @ApiDoc(
     *     authentication = true,
     *     authenticationRoles = {"ROLE_PLAYER"},
     *     resource = true,
     *     description = "Delete a existing account",
     *     statusCodes = {
     *         200 = "Returned in case the account was successfully deleted."
     *     }
     * )
     */
    public function deleteAction()
    {
        $tokenStorage = $this->get('security.token_storage');
        $secToken = $tokenStorage->getToken();
        $usr = $secToken->getUser();
        $account = $usr->getAccount();

        $em = $this->getDoctrineManager();
        $em->remove($account);
        $em->flush();

        $tokenStorage->setToken(null);
        $this->get('request')->getSession()->invalidate();

        $translator = $this->get('translator');

        return $this->view()->create($translator->trans("Account deleted."), 200);
    }

    /**
     * Get the standard manager of doctrine.
     *
     * @return \Doctrine\Common\Persistence\ObjectManager|object
     */
    private function getDoctrineManager()
    {
        $doctrine = $this->get('doctrine');
        return $doctrine->getManager(null);
    }

    /**
     * Get a specific repository.
     *
     * @param string $identifier the identifier
     * @return \Doctrine\ORM\EntityRepository
     */
    private function getRepository($identifier)
    {
        $em = $this->getDoctrineManager();

        $metadata = $em->getClassMetadata($identifier);
        $class = $metadata->getName();

        return $em->getRepository($class);
    }

    /**
     * Stores the e-mail address and requests a confirmation by e-mail.
     *
     * @param Account $account the account
     * @param string $newMail the new e-mail
     */
    private function storeAndRequestMailConfirm(Account $account, $newMail)
    {
        $em = $this->getDoctrineManager();
        $unconfirmedAccountsRepo = $this->getRepository(self::getRepositoryIdentifier('Accounts', 'AccountUnconfirmed'));
        $unconfirmedAcc = $unconfirmedAccountsRepo->findOneBy(array('au_acc_id' => $account->getId()));
        if ($unconfirmedAcc !== null)
        {
            $em->remove($unconfirmedAcc);
        }

        if (strlen($newMail) > 0)
        {
            $unconfirmedMail = new AccountUnconfirmed();
            $unconfirmedMail->setAccount($account);
            $unconfirmedMail->setNewMail($newMail);
            $em->persist($unconfirmedMail);
            $em->flush();
            $em->refresh($unconfirmedMail);

            $messageData = array(
                'name' => $account->getLogin(),
                'activation_route' => $this->generateUrl('account_account_confirm', array(
                    'id' => $account->getId(),
                    'uuid' => $unconfirmedMail->getId()
                ), UrlGeneratorInterface::ABSOLUTE_URL)
            );

            $translator = $this->get('translator');

            $message = \Swift_Message::newInstance();
            $message->setSubject('Illarion: ' . $translator->trans('Confirm E-Mail Address', array(), 'email'));
            $message->setFrom('accounts@illarion.org', 'Illarion');
            $message->setTo($newMail, $account->getLogin());
            $message->setBody(
                $this->renderView('IllarionAccountSystemBundle:email:newAccountMailAddress.html.twig', $messageData),
                'text/html');
            $message->addPart(
                $this->renderView( 'IllarionAccountSystemBundle:email:newAccountMailAddress.txt.twig', $messageData),
                'text/plain');
            $this->get('mailer')->send($message);
        }
        else
        {
            if ($account->getEMail() !== null)
            {
                $account->setEMail(null);
                $em->persist($account);
                $em->flush();
            }
        }
    }

    /**
     * Build the schema identifier for one of the tables of the Illarion database.
     *
     * @param string $schema the name of the schema
     * @param string $table the name of the table
     * @return string the full identifier
     */
    private static function getRepositoryIdentifier($schema, $table)
    {
        return 'IllarionDatabaseBundle:' . $schema . '\\' . $table;
    }
}
