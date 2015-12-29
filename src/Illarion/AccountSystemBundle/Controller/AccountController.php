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
use Illarion\AccountSystemBundle\Model\AccountCreateResponse;
use Illarion\AccountSystemBundle\Model\AccountDeleteResponse;
use Illarion\AccountSystemBundle\Model\AccountGetCharResponse;
use Illarion\AccountSystemBundle\Model\AccountGetCharsResponse;
use Illarion\AccountSystemBundle\Model\AccountGetCreateResponse;
use Illarion\AccountSystemBundle\Model\AccountGetResponse;
use Illarion\AccountSystemBundle\Model\AccountUpdateResponse;
use Illarion\AccountSystemBundle\Model\ErrorResponse;
use Illarion\AccountSystemBundle\Model\SuccessResponse;
use Illarion\DatabaseBundle\Entity\Accounts\Account;
use Illarion\DatabaseBundle\Entity\Accounts\AccountUnconfirmed;
use Illarion\DatabaseBundle\Entity\Server\Chars;
use Illarion\SecurityBundle\Security\User\User;
use JMS\Serializer\SerializationContext;
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
     *     output="Illarion\AccountSystemBundle\Model\AccountGetResponse",
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

        $data = new AccountGetResponse();
        $data->setName($account->getLogin());
        $data->setState($account->getState());
        $data->setMaxChars($account->getMaxChars());
        $data->setLang($account->getLanguage() ? 'de' : 'en');

        $translator = $this->get('translator');

        $data->addChars(self::buildCharList(
            $translator->trans('Game Server'),
            'illarionserver',
            $account->getIllarionServerChars()));

        try
        {
            $data->addChars(self::buildCharList(
                $translator->trans('Test Server'),
                'testserver',
                $account->getTestServerChars()));
        } catch (TableNotFoundException $ignored) {}

        try
        {
            $data->addChars(self::buildCharList(
                $translator->trans('Development Server'),
                'devserver',
                $account->getDevServerChars()));
        } catch (TableNotFoundException $ignored) {}

        if (count($account->getIllarionServerChars()) < $account->getMaxChars())
        {
            $createInfo = new AccountGetCreateResponse();
            $createInfo->setRoute($this->generateUrl('account_post_character', array('server' => 'illarionserver')));
            $createInfo->setName($translator->trans('Game Server'));
            $createInfo->setId('illarionserver');
            $data->addCreate($createInfo);
        }

        if (!$this->get('security.authorization_checker')->isGranted('ROLE_TESTSERVER_ACCESS'))
        {
            $createInfo = new AccountGetCreateResponse();
            $createInfo->setRoute($this->generateUrl('account_post_character', array('server' => 'testserver')));
            $createInfo->setName($translator->trans('Test Server'));
            $createInfo->setId('testserver');
            $data->addCreate($createInfo);
        }

        if (!$this->get('security.authorization_checker')->isGranted('ROLE_DEVSERVER_ACCESS'))
        {
            $createInfo = new AccountGetCreateResponse();
            $createInfo->setRoute($this->generateUrl('account_post_character', array('server' => 'devserver')));
            $createInfo->setName($translator->trans('Development Server'));
            $createInfo->setId('devserver');
            $data->addCreate($createInfo);
        }

        $view = $this->view()->create($data, 200);

        return $view;
    }

    /**
     * Convert a list of character entities to the data set that contains all the information required by a user of the
     * account system.
     *
     * @param string $serverName
     * @param string $serverId
     * @param Collection $chars the characters
     * @return AccountGetCharsResponse the data generated for the json
     */
    private static function buildCharList($serverName, $serverId, Collection $chars)
    {
        $list = new AccountGetCharsResponse();
        $list->setName($serverName);
        $list->setId($serverId);

        foreach ($chars as $char)
        {
            if (!($char instanceof Chars))
                throw new UnexpectedTypeException($char, Chars::class);

            $lastSaveDate = new \DateTime();;
            $lastSaveDate->setTimestamp($char->getLastsavetime());

            $response = new AccountGetCharResponse();
            $response->setName($char->getName());
            $response->setStatus($char->getStatus());
            $response->setRaceId($char->getRaceId());
            $response->setRaceTypeId($char->getRaceTypeId());
            $response->setLastSaveTime($char->getLastsavetime());
            $response->setOnlineTime($char->getOnlinetime());

            $list->addChar($response);
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
     *     output = "Illarion\AccountSystemBundle\Model\AccountCreateResponse",
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

        $result = new AccountCreateResponse();

        if (!$form->isSubmitted())
        {
            $errorData = new ErrorResponse();
            $errorData->setStatus(400);
            $errorData->setMessage($translator->trans('Missing data. This function requires at least the name and the password field to be populated.'));
            $errorData->setForm($form);

            $result->setError($errorData);
            return $this->view()->create($result, 400,
                SerializationContext::create()->setGroups('error'));
        }

        if (!$form->isValid())
        {
            $errorData = new ErrorResponse();
            $errorData->setStatus(400);
            $errorData->setMessage($translator->trans('The validation of the submitted values failed.'));
            $errorData->setForm($form);

            $result->setError($errorData);
            return $this->view()->create($result, 400,
                SerializationContext::create()->setGroups('error'));
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
            $errorData = new ErrorResponse();
            $errorData->setStatus(400);
            $errorData->setMessage($translator->trans('The name or the E-Mail address is already used.'));
            $errorData->setForm($form);

            $result->setError($errorData);
            return $this->view()->create($result, 400,
                SerializationContext::create()->setGroups('error'));
        }

        if (isset($data['email']))
        {
            $this->storeAndRequestMailConfirm($newAccount, $data['email']);
        }

        $successData = new SuccessResponse();
        $successData->setStatus(201);
        $successData->setMessage($translator->trans('Account created.'));

        $result->setSuccess($successData);
        return $this->view()->create($result, 201,
            SerializationContext::create()->setGroups('success'));
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
     *     output = "Illarion\AccountSystemBundle\Model\AccountUpdateResponse",
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

        $result = new AccountUpdateResponse();

        if (!$form->isSubmitted())
        {
            $errorData = new ErrorResponse();
            $errorData->setStatus(400);
            $errorData->setMessage($translator->trans('Missing data. This function requires any filled entry.'));
            $errorData->setForm($form);

            $result->setError($errorData);
            return $this->view()->create($result, 400,
                SerializationContext::create()->setGroups('error'));
        }

        if (!$form->isValid())
        {
            $errorData = new ErrorResponse();
            $errorData->setStatus(400);
            $errorData->setMessage($translator->trans('The validation of the submitted values failed.'));
            $errorData->setForm($form);

            $result->setError($errorData);
            return $this->view()->create($result, 400,
                SerializationContext::create()->setGroups('error'));
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
            $errorData = new ErrorResponse();
            $errorData->setStatus(400);
            $errorData->setMessage($translator->trans('The name or the E-Mail address is already used.'));
            $errorData->setForm($form);

            $result->setError($errorData);
            return $this->view()->create($result, 400,
                SerializationContext::create()->setGroups('error'));
        }

        if (isset($data['email']))
        {
            $this->storeAndRequestMailConfirm($account, $data['email']);
        }

        $successData = new SuccessResponse();
        $successData->setStatus(202);
        $successData->setMessage($translator->trans('Account updated.'));

        $result->setSuccess($successData);
        return $this->view()->create($result, 202,
            SerializationContext::create()->setGroups('success'));
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
     *     output = "Illarion\AccountSystemBundle\Model\AccountDeleteResponse",
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

        $result = new AccountDeleteResponse();

        $successData = new SuccessResponse();
        $successData->setStatus(200);
        $successData->setMessage($translator->trans('Account deleted.'));

        $result->setSuccess($successData);
        return $this->view()->create($result, 200,
            SerializationContext::create()->setGroups('success'));
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
