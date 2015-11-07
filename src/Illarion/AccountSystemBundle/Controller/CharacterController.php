<?php

namespace Illarion\AccountSystemBundle\Controller;

use FOS\RestBundle\Controller\Annotations as RestAnnotations;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

/**
 * This controller is used for all interactions with characters.
 *
 * @package Illarion\AccountSystemBundle\Controller
 * @RestAnnotations\RouteResource("character")
 */
class CharacterController extends FOSRestController
{
    /**
     * Get the general information for the character creation. This function will return the required data for all
     * possible races.
     *
     * @param string $server the server the creation information are requested for
     * @return View
     * @RestAnnotations\Get("/character/{server}")
     * @RestAnnotations\QueryParam(name="server", requirements="illarionserver|testserver|devserver", description="The server the character is expected to be created on.")
     * @RestAnnotations\View()
     * @ApiDoc(
     *     resource = true,
     *     description = "Get the information for the character creation.",
     *     parameters = {
     *         {"name"="server", "dataType"="string", "required"=true, "requirements"="illarionserver|testserver|devserver"}
     *     },
     *     statusCodes = {
     *         200 = "Returned in case the data was correctly fetched and returned",
     *         400 = "In case the server value was illegal.",
     *         500 = "In case fetching the data from the database failed."
     *     }
     * )
     */
    public function getAction($server)
    {

    }
}
