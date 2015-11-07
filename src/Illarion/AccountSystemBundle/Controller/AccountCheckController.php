<?php

namespace Illarion\AccountSystemBundle\Controller;

use FOS\RestBundle\Controller\Annotations as RestAnnotations;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use Illarion\AccountSystemBundle\Form\AccountCheckType;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;

/**
 * The controller that takes care for checking the account that is used.
 *
 * @package Illarion\AccountSystemBundle\Controller
 * @RestAnnotations\RouteResource("check")
 */
class AccountCheckController extends FOSRestController
{
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
     *         200 = "Returned when the check was performed, and the name and the e-mail is okay.",
     *         400 = "In case the payload for the request was illegal.",
     *         409 = "Returned in case the check was performed, but the name or e-mail is already in use."
     *     }
     * )
     */
    public function postAction(Request $request)
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
            $resultCode = 200;
            if (strlen($data['name']) > 0)
            {
                if (null === $repository->findOneBy(['accLogin' => $data['name']])) {
                    $result['name'] = array(
                        'ok' => true,
                        'value' => $data['name'],
                        'description' => $translator->trans('The name is good.')
                    );
                } else {
                    $resultCode = 409;
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
                    $resultCode = 409;
                    $result['email'] = array(
                        'ok' => false,
                        'value' => $data['email'],
                        'description' => $translator->trans('This e-mail address is already in use.')
                    );
                }
            }
            $result['code'] = $resultCode;
            $view = $this->view()->create($result, $resultCode);
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
