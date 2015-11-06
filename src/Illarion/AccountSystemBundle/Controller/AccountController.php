<?php

namespace Illarion\AccountSystemBundle\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\DBAL\Exception\TableNotFoundException;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use FOS\RestBundle\Controller\Annotations as RestAnnotations;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\View\View;
use Illarion\AccountSystemBundle\Form\AccountCheckType;
use Illarion\AccountSystemBundle\Form\AccountType;
use Illarion\DatabaseBundle\Entity\Accounts\Account;
use Symfony\Component\HttpFoundation\Request;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class AccountController extends FOSRestController implements ClassResourceInterface
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
        $account = $usr->getAccount();

        $data = array(
            'name' => $account->getAccLogin(),
            'state' => $account->getAccState(),
            'maxChars' => $account->getAccMaxchars(),
            'lang' => $account->getAccLang() ? 'de' : 'en',
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

        $view = $this->view()->create($data, 200);

        return $view;
    }

    /**
     * Convert a list of character entities to the data set that contains all the information required by a user of the
     * account system.
     *
     * @param ArrayCollection $chars the characters
     * @return array the data generated for the json
     */
    private static function buildCharList(ArrayCollection $chars)
    {
        $list = array();
        foreach ($chars as $char)
        {
            $list[] = array(
                'name' => $char->getChrName(),
                'code' => $char->getChrStatus(),
                'race' => $char->getChrRace(),
                'sex' => $char->getChrSex(),
                'lastSaveTime' => $char->getChrLastsavetime(),
                'onlineTime' => $char->getChrOnlinetime()
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
     *     input = "Illarion\AccountSystemBundle\Form\AccountType",
     *     statusCodes = {
     *         201 = "Returned in case the account was correctly created.",
     *         400 = "In case the payload for the request was illegal."
     *     }
     * )
     */
    public function postAction(Request $request)
    {
        $form = $this->createForm(new AccountType(false));
        $form->handleRequest($request);

        $translator = $this->get('translator');

        if (!$form->isSubmitted())
        {
            $result = array();
            $result['error'] = array(
                'code' => 400,
                'message' => $translator->trans('Missing data. This function requires at least the name and the password field to be populated.'),
                'form' => $form
            );
            $view = $this->view()->create($result, 400);
        }
        elseif ($form->isValid())
        {
            $data = $form->getData();
            $em = $this->getDoctrineManager();
            $passwordEncoder = $this->get('illarion.security.password.encoder');

            $newAccount = new Account();
            $newAccount->setAccLogin($data['name']);
            if (strlen($data['email']) > 0)
            {
                $newAccount->setAccEmail($data['email']);
            }
            $newAccount->setAccPasswd($passwordEncoder->encodePassword($data['password'], '$1$illarion$'));
            $newAccount->setAccRegisterdate(new \DateTime());
            $newAccount->setAccLastip($request->getClientIp());
            $newAccount->setAccLang($request->getPreferredLanguage(array('de', 'en')) == 'de' ? 0 : 1);
            $newAccount->setAccState(3);
            $newAccount->setAccMaxchars(5);

            try
            {
                $em->persist($newAccount);
                $em->flush();

                $view = $this->view()->create($translator->trans('Account created.'), 201);
            }
            catch (UniqueConstraintViolationException $ex)
            {
                $result = array();
                $result['error'] = array(
                    'code' => 400,
                    'message' => $translator->trans('The name or the E-Mail address is already used.'),
                );
                $view = $this->view()->create($result, 400);
            }
        } else {
            $result = array();
            $result['error'] = array(
                'code' => 400,
                'message' => $translator->trans('The validation of the submitted values failed.'),
                'form' => $form
            );
            $view = $this->view()->create($result, 400);
        }

        return $view;
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
     *     resource = true,
     *     description = "Update a existing account",
     *     input = "Illarion\AccountSystemBundle\Form\AccountType",
     *     statusCodes = {
     *         202 = "Returned in case the account was correctly updated.",
     *         400 = "In case the payload for the request was illegal."
     *     }
     * )
     */
    public function putAction(Request $request)
    {
        $form = $this->createForm(new AccountType(true));
        $form->handleRequest($request);

        $translator = $this->get('translator');

        if (!$form->isSubmitted())
        {
            $result = array();
            $result['error'] = array(
                'code' => 400,
                'message' => $translator->trans('Missing data. This function requires any filled entry.'),
                'form' => $form
            );
            $view = $this->view()->create($result, 400);
        }
        elseif ($form->isValid())
        {
            $data = $form->getData();
            $em = $this->getDoctrineManager();

            $usr = $this->get('security.token_storage')->getToken()->getUser();
            $account = $usr->getAccount();

            $passwordEncoder = $this->get('illarion.security.password.encoder');

            if (strlen($data['name']) > 0)
            {
                $account->setAccLogin($data['name']);
            }
            if (strlen($data['email']) > 0)
            {
                $account->setAccEmail($data['email']);
            }
            if (strlen($data['password']) > 0)
            {
                $account->setAccPasswd($passwordEncoder->encodePassword($data['password'], '$1$illarion$'));
            }
            $account->setAccLastip($request->getClientIp());
            $account->setAccLang($request->getPreferredLanguage(array('de', 'en')) == 'de' ? 0 : 1);

            try
            {
                $em->merge($account);
                $em->flush();

                $view = $this->view()->create($translator->trans('Account updated.'), 202);
            }
            catch (UniqueConstraintViolationException $ex)
            {
                $result = array();
                $result['error'] = array(
                    'code' => 400,
                    'message' => $translator->trans('The name or the E-Mail address is already used.'),
                );
                $view = $this->view()->create($result, 400);
            }
        } else {
            $result = array();
            $result['error'] = array(
                'code' => 400,
                'message' => $translator->trans('The validation of the submitted values failed.'),
                'form' => $form
            );
            $view = $this->view()->create($result, 400);
        }

        return $view;
    }

    /**
     * Check if a account name and/or a e-mail address is still free to be used. While both fields are set as optional,
     * at least one of the two has to be set. The request is considered as illegal in case no data is attached to it.
     *
     * @param Request $request
     * @return View
     * @RestAnnotations\Post("/account/check")
     * @RestAnnotations\View()
     * @ApiDoc(
     *     resource = true,
     *     description = "Checks if a account name and/or e-mail address is still free to be used.",
     *     input = "Illarion\AccountSystemBundle\Form\AccountCheckType",
     *     statusCodes = {
     *         200 = "Returned when the check was performed, no matter the outcome.",
     *         400 = "In case the payload for the request was illegal."
     *     }
     * )
     */
    public function postCheckAction(Request $request)
    {
        $form = $this->createForm(new AccountCheckType());
        $form->handleRequest($request);

        $translator = $this->get('translator');

        if (!$form->isSubmitted())
        {
            $result = array();
            $result['error'] = array(
                'code' => 400,
                'message' => $translator->trans('Missing data. This function requires either the "name" or the "email" field to be populated.'),
                'form' => $form
            );
            $view = $this->view()->create($result, 400);
        }
        elseif ($form->isValid())
        {
            $data = $form->getData();
            $repository = $this->getAccountRepository();

            $result = array();
            if (strlen($data['name']) > 0)
            {
                if (null === $repository->findOneBy(['accLogin' => $data['name']])) {
                    $result['name'] = array(
                        'ok' => true,
                        'value' => $data['name'],
                        'description' => $translator->trans('The name is good.')
                    );
                } else {
                    $result['name'] = array(
                        'ok' => false,
                        'value' => $data['name'],
                        'description' => $translator->trans('This account is already in use.')
                    );
                }
            }

            if (strlen($data['email']) > 0)
            {
                if (null === $repository->findOneBy(['accEmail' => $data['email']])) {
                    $result['email'] = array(
                        'ok' => true,
                        'value' => $data['email'],
                        'description' => $translator->trans('This e-mail address is good.')
                    );
                } else {
                    $result['email'] = array(
                        'ok' => false,
                        'value' => $data['email'],
                        'description' => $translator->trans('This e-mail address is already in use.')
                    );
                }
            }
            $view = $this->view()->create($result, 200);
        } else {
            $result = array();
            $result['error'] = array(
                'code' => 400,
                'message' => $translator->trans('The validation of the submitted values failed.'),
                'form' => $form
            );
            $view = $this->view()->create($result, 400);
        }

        return $view;
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
     * Get the object repository that interacts with the account table.
     *
     * @return \Doctrine\Common\Persistence\ObjectRepository
     */
    private function getAccountRepository()
    {
        $em = $this->getDoctrineManager();

        $metadata = $em->getClassMetadata('IllarionDatabaseBundle:Accounts\Account');
        $class = $metadata->getName();

        return $em->getRepository($class);
    }
}
