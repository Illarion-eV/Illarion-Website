<?php

namespace Illarion\AccountSystemBundle\Controller;

use FOS\RestBundle\Controller\Annotations as RestAnnotations;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use Illarion\AccountSystemBundle\Form\AccountCheckType;
use Illarion\AccountSystemBundle\Model\AccountCheckResponse;
use Illarion\AccountSystemBundle\Model\CheckResponse;
use Illarion\AccountSystemBundle\Model\ErrorResponse;
use JMS\Serializer\SerializationContext;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;

/**
 * The controller that takes care for checking the account that is used.
 *
 * @package Illarion\AccountSystemBundle\Controller
 * @RestAnnotations\RouteResource("AccountCheck")
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
     *     output = "Illarion\AccountSystemBundle\Model\AccountCheckResponse",
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
        $translator->setLocale($request->getPreferredLanguage(array('de', 'en')));

        $result = new AccountCheckResponse();

        if (!$form->isSubmitted())
        {
            $errorData = new ErrorResponse();
            $errorData->setStatus(400);
            $errorData->setMessage($translator->trans('Missing data. This function requires either the "name" or the "email" field to be populated.'));
            $errorData->setForm($form);

            $result->setError($errorData);

            $result->setError($errorData);
            return $this->view()->create($result, 400)
                ->setSerializationContext(SerializationContext::create()->setGroups(array('Default', 'error')));
        }

        if (!$form->isValid())
        {
            $errorData = new ErrorResponse();
            $errorData->setStatus(400);
            $errorData->setMessage($translator->trans('The validation of the submitted values failed.'));
            $errorData->setForm($form);

            $result->setError($errorData);

            $result->setError($errorData);
            return $this->view()->create($result, 400)
                ->setSerializationContext(SerializationContext::create()->setGroups(array('Default', 'error')));
        }

        $data = $form->getData();
        $repository = $this->getAccountRepository();

        $resultCode = 200;
        if (strlen($data['name']) > 0)
        {
            $checkData = new CheckResponse();
            $checkData->setCheckType('name');
            $checkData->setCheckedValue($data['name']);

            if (null === $repository->findOneBy(['login' => $data['name']])) {
                $checkData->setSuccess(true);
                $checkData->setDescription($translator->trans('The name is good.'));
            } else {
                $resultCode = 409;
                $checkData->setSuccess(false);
                $checkData->setDescription($translator->trans('This account is already in use.'));
            }
            $result->addChecks($checkData);
        }

        if (strlen($data['email']) > 0)
        {
            $checkData = new CheckResponse();
            $checkData->setCheckType('email');
            $checkData->setCheckedValue($data['email']);

            if (null === $repository->findOneBy(['eMail' => $data['email']])) {
                $checkData->setSuccess(true);
                $checkData->setDescription($translator->trans('This e-mail address is good.'));
            } else {
                $resultCode = 409;
                $checkData->setSuccess(false);
                $checkData->setDescription($translator->trans('This e-mail address is already in use.'));
            }
            $result->addChecks($checkData);
        }

        return $this->view()->create($result, $resultCode)
            ->setSerializationContext(SerializationContext::create()->setGroups(array('Default', 'success')));
    }

    /**
     * Get the standard manager of doctrine.
     *
     * @return \Doctrine\Common\Persistence\ObjectManager
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
