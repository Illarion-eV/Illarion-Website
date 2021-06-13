<?php

namespace Illarion\AccountSystemBundle\Controller;

use IllaDateTime;
use Doctrine\Common\Collections\Criteria;
use FOS\RestBundle\Controller\Annotations as RestAnnotations;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use Illarion\AccountSystemBundle\Exception\AttributeOutOfRangeException;
use Illarion\AccountSystemBundle\Exception\ColourNotFoundException;
use Illarion\AccountSystemBundle\Exception\IllegalValueException;
use Illarion\AccountSystemBundle\Exception\NotSupportedException;
use Illarion\AccountSystemBundle\Exception\StartPackNotFoundException;
use Illarion\AccountSystemBundle\Exception\UnexpectedTypeException;
use Illarion\AccountSystemBundle\Form\CharacterCreateType;
use Illarion\AccountSystemBundle\Form\CharacterUpdateType;
use Illarion\AccountSystemBundle\Model\AttributesCreationResponse;
use Illarion\AccountSystemBundle\Model\CharacterAttributesResponse;
use Illarion\AccountSystemBundle\Model\CharacterCreateResponse;
use Illarion\AccountSystemBundle\Model\CharacterCreationResponse;
use Illarion\AccountSystemBundle\Model\CharacterGetResponse;
use Illarion\AccountSystemBundle\Model\CharacterItemResponse;
use Illarion\AccountSystemBundle\Model\CharacterPaperDollResponse;
use Illarion\AccountSystemBundle\Model\CharacterUpdateResponse;
use Illarion\AccountSystemBundle\Model\ColourResponse;
use Illarion\AccountSystemBundle\Model\ErrorResponse;
use Illarion\AccountSystemBundle\Model\IdNameResponse;
use Illarion\AccountSystemBundle\Model\MinMaxResponse;
use Illarion\AccountSystemBundle\Model\RaceResponse;
use Illarion\AccountSystemBundle\Model\RaceTypeResponse;
use Illarion\AccountSystemBundle\Model\StartPackItemsResponse;
use Illarion\AccountSystemBundle\Model\StartPackResponse;
use Illarion\AccountSystemBundle\Model\SuccessResponse;
use Illarion\DatabaseBundle\Entity\DevServer;
use Illarion\DatabaseBundle\Entity\Homepage\CharacterDetails;
use Illarion\DatabaseBundle\Entity\IllarionServer;
use Illarion\DatabaseBundle\Entity\Server\Chars;
use Illarion\DatabaseBundle\Entity\Server\Player;
use Illarion\DatabaseBundle\Entity\Server\PlayerItems;
use Illarion\DatabaseBundle\Entity\Server\PlayerSkills;
use Illarion\DatabaseBundle\Entity\Server\Race;
use Illarion\DatabaseBundle\Entity\Server\RaceBeard;
use Illarion\DatabaseBundle\Entity\Server\RaceHair;
use Illarion\DatabaseBundle\Entity\Server\RaceHairColour;
use Illarion\DatabaseBundle\Entity\Server\RaceSkinColour;
use Illarion\DatabaseBundle\Entity\Server\RaceTypes;
use Illarion\DatabaseBundle\Entity\Server\StartPackItems;
use Illarion\DatabaseBundle\Entity\Server\StartPacks;
use Illarion\DatabaseBundle\Entity\Server\StartPackSkills;
use Illarion\DatabaseBundle\Entity\TestServer;
use Illarion\SecurityBundle\Security\User\User;
use JMS\Serializer\SerializationContext;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;

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
     * @param Request $request the request that is handled
     * @param string $server the server the creation information are requested for
     * @return View
     * @RestAnnotations\Get("/character/{server}")
     * @RestAnnotations\QueryParam(name="server", requirements="illarionserver|testserver|devserver", description="The server the character is expected to be created on.")
     * @RestAnnotations\View()
     * @ApiDoc(
     *     authentication = true,
     *     authenticationRoles = {"ROLE_PLAYER"},
     *     resource = true,
     *     description = "Get the information for the character creation.",
     *     parameters = {
     *         {"name"="server", "dataType"="string", "required"=true, "requirements"="illarionserver|testserver|devserver"}
     *     },
     *     output = "Illarion\AccountSystemBundle\Model\CharacterCreationResponse",
     *     statusCodes = {
     *         200 = "Returned in case the data was correctly fetched and returned",
     *         400 = "In case the server value was illegal.",
     *         500 = "In case fetching the data from the database failed."
     *     }
     * )
     */
    public function getCreateAction(Request $request, $server)
    {
        $translator = $this->get('translator');
        $preferredLocale = $request->getPreferredLanguage(array('de', 'en'));
        $translator->setLocale($preferredLocale);
        $german = ($preferredLocale == 'de');

        $result = new CharacterCreationResponse();

        $schema = $this->getSchemaFromServerIdent($server);
        if ($schema instanceof ErrorResponse)
        {
            $result->setError($schema);
            return $this->view()->create($result, $schema->getStatus())
                ->setSerializationContext(SerializationContext::create()->setGroups(array('Default', 'error')));
        }

        $raceRepo = $this->getRepository(self::getRepositoryIdentifier($schema, 'Race'));

        $criteria = new Criteria();
        $criteria->where($criteria->expr()->lte('id', 5));
        $criteria->orderBy(array('id' => 'ASC'));
        foreach ($raceRepo->matching($criteria) as $race) {
            if (!($race instanceof Race))
                throw new UnexpectedTypeException($race, Race::class);

            $raceEntry = new RaceResponse();
            $raceEntry->setId($race->getId());
            $raceEntry->setName($german ? $race->getNameDe() : $race->getNameEn());

            $attributes = new AttributesCreationResponse();
            $attributes->setAge(new MinMaxResponse($race->getAgeMin(), $race->getAgeMax()));
            $attributes->setHeight(new MinMaxResponse($race->getHeightMin(), $race->getHeightMax()));
            $attributes->setWeight(new MinMaxResponse($race->getWeightMin(), $race->getWeightMax()));
            $attributes->setAgility(new MinMaxResponse($race->getAgilityMin(), $race->getAgilityMax()));
            $attributes->setConstitution(new MinMaxResponse($race->getConstitutionMin(), $race->getConstitutionMax()));
            $attributes->setDexterity(new MinMaxResponse($race->getDexterityMin(), $race->getDexterityMax()));
            $attributes->setEssence(new MinMaxResponse($race->getEssenceMin(), $race->getEssenceMax()));
            $attributes->setIntelligence(new MinMaxResponse($race->getIntelligenceMin(), $race->getIntelligenceMax()));
            $attributes->setPerception(new MinMaxResponse($race->getPerceptionMin(), $race->getPerceptionMax()));
            $attributes->setStrength(new MinMaxResponse($race->getStrengthMin(), $race->getStrengthMax()));
            $attributes->setWillpower(new MinMaxResponse($race->getWillpowerMin(), $race->getWillpowerMax()));
            $attributes->setTotalAttributePoints($race->getAttributePointsMax());

            $raceEntry->setAttributes($attributes);

            $raceArray['types'] = array();
            foreach ($race->getTypes() as $raceType) {
                if (!($raceType instanceof RaceTypes))
                    throw new UnexpectedTypeException($raceType, RaceTypes::class);

                $type = new RaceTypeResponse();
                $type->setId($raceType->getTypeId());

                foreach ($raceType->getBeards() as $beard) {
                    if (!($beard instanceof RaceBeard))
                        throw new UnexpectedTypeException($beard, RaceBeard::class);

                    $type->addBeard(new IdNameResponse(
                        $beard->getBeardId(),
                        $german ? $beard->getNameDe() : $beard->getNameEn()
                    ));
                }

                foreach ($raceType->getHairs() as $hair) {
                    if (!($hair instanceof RaceHair))
                        throw new UnexpectedTypeException($hair, RaceHair::class);

                    $type->addHair(new IdNameResponse(
                        $hair->getHairId(),
                        $german ? $hair->getNameDe() : $hair->getNameEn()
                    ));
                }

                foreach ($raceType->getHairColours() as $hairColour) {
                    if (!($hairColour instanceof RaceHairColour))
                        throw new UnexpectedTypeException($hairColour, RaceHairColour::class);

                    $type->addHairColour(new ColourResponse(
                        $hairColour->getRed(), $hairColour->getGreen(), $hairColour->getBlue(), $hairColour->getAlpha()
                    ));
                }

                foreach ($raceType->getSkinColours() as $skinColour) {
                    if (!($skinColour instanceof RaceSkinColour))
                        throw new UnexpectedTypeException($skinColour, RaceSkinColour::class);

                    $type->addSkinColour(new ColourResponse(
                        $skinColour->getRed(), $skinColour->getGreen(), $skinColour->getBlue(), $skinColour->getAlpha()
                    ));
                }

                $raceEntry->addType($type);
            }

            $result->addRace($raceEntry);
        }

        $startPackRepo = $this->getRepository(self::getRepositoryIdentifier($schema, 'StartPacks'));
        foreach ($startPackRepo->findAll() as $startPack) {
            if (!($startPack instanceof StartPacks))
                throw new UnexpectedTypeException($startPack, StartPacks::class);

            $startPackEntry = new StartPackResponse();
            $startPackEntry->setId($startPack->getId());
            $startPackEntry->setName($german ? $startPack->getNameDe() : $startPack->getNameEn());

            foreach ($startPack->getSkills() as $packSkill) {
                if (!($packSkill instanceof StartPackSkills))
                    throw new UnexpectedTypeException($packSkill, StartPackSkills::class);

                $startPackEntry->addSkill(new IdNameResponse($packSkill->getSkillId(), $packSkill->getSkillValue()));
            }

            foreach ($startPack->getItems() as $packItem) {
                if (!($packItem instanceof StartPackItems))
                    throw new UnexpectedTypeException($packItem, StartPackItems::class);

                $item = $packItem->getItem();

                $itemEntry = new StartPackItemsResponse();
                $itemEntry->setItemId($packItem->getItemId());
                $itemEntry->setPosition($packItem->getLinenumber());
                $itemEntry->setNumber($packItem->getNumber());
                $itemEntry->setQuality($packItem->getQuality());
                $itemEntry->setName($german ? $item->getNameDe() : $item->getNameEn());
                $itemEntry->setUnitWorth($item->getWorth());
                $itemEntry->setUnitWeight($item->getWeight());

                $startPackEntry->addItem($itemEntry);
            }

            $result->addStartPack($startPackEntry);
        }

        return $this->view()->create($result, 200)
            ->setSerializationContext(SerializationContext::create()->setGroups(array('Default', 'success')));
    }

    /**
     * Get the general information for the character creation. This function will return the required data for all
     * possible races.
     *
     * @param Request $request
     * @param string $server the server the creation information are requested for
     * @param integer $charId the ID of the character
     * @return View
     * @RestAnnotations\Get("/character/{server}/{charId}")
     * @RestAnnotations\QueryParam(name="server", requirements="illarionserver|testserver|devserver", description="The server the character is expected to be created on.")
     * @RestAnnotations\QueryParam(name="charId", requirements="%d+", description="The ID of the character that is requested.")
     * @RestAnnotations\View()
     * @ApiDoc(
     *     authentication = true,
     *     authenticationRoles = {"ROLE_PLAYER"},
     *     resource = true,
     *     description = "Get the information about a specific character.",
     *     parameters = {
     *         {"name"="server", "dataType"="string", "required"=true, "requirements"="illarionserver|testserver|devserver"},
     *         {"name"="charId", "dataType"="number", "required"=true, "requirements"="%d+"}
     *     },
     *     output = "Illarion\AccountSystemBundle\Model\CharacterGetResponse",
     *     statusCodes = {
     *         200 = "The character is valid, belongs to the logged in account and was correctly fetched.",
     *         400 = "In case the server value was illegal.",
     *         401 = "In case the character does not belong to the logged in account.",
     *         500 = "In case fetching the data from the database failed."
     *     }
     * )
     */
    public function getAction(Request $request, $server, $charId)
    {
        $translator = $this->get('translator');
        $translator->setLocale($request->getPreferredLanguage(array('de', 'en')));

        $account = $this->getLoggedInAccount();

        $result = new CharacterGetResponse();

        $schema = $this->getSchemaFromServerIdent($server);
        if ($schema instanceof ErrorResponse)
        {
            $result->setError($schema);
            return $this->view()->create($result, $schema->getStatus())
                ->setSerializationContext(SerializationContext::create()->setGroups(array('Default', 'error')));
        }

        $char = $this->getCharacter($schema, $account->getId(), $charId);
        if ($char instanceof ErrorResponse)
        {
            $result->setError($char);
            return $this->view()->create($result, $char->getStatus())
                ->setSerializationContext(SerializationContext::create()->setGroups(array('Default', 'error')));
        }

        $player = $char->getPlayer();

        $result->setId($char->getPlayerId());
        $result->setName($char->getName());
        $result->setRace($char->getRaceId());
        $result->setRaceType($char->getRaceTypeId());

        $attributes = new CharacterAttributesResponse();
        $attributes->setAgility($player->getAgility());
        $attributes->setConstitution($player->getConstitution());
        $attributes->setDexterity($player->getDexterity());
        $attributes->setEssence($player->getEssence());
        $attributes->setIntelligence($player->getIntelligence());
        $attributes->setPerception($player->getPerception());
        $attributes->setStrength($player->getStrength());
        $attributes->setWillpower($player->getWillpower());
        $result->setAttributes($attributes);

        $result->setDateOfBirth($player->getDateOfBirth());
        $result->setBodyHeight($player->getHeight());
        $result->setBodyWeight($player->getWeight());

        $paperDoll = new CharacterPaperDollResponse();
        $paperDoll->setHairId($player->getHairId());
        $paperDoll->setBeardId($player->getBeardId());
        $paperDoll->setSkinColour(new ColourResponse(
            $player->getSkinColorRed(),
            $player->getSkinColorGreen(),
            $player->getSkinColorBlue(),
            $player->getSkinColorAlpha()));
        $paperDoll->setHairColour(new ColourResponse(
            $player->getHairColorRed(),
            $player->getHairColorGreen(),
            $player->getHairColorBlue(),
            $player->getHairColorAlpha()));
        $result->setPaperDoll($paperDoll);

        foreach ($player->getItems() as $item) {
            if (!($item instanceof PlayerItems))
                throw new UnexpectedTypeException($item, PlayerItems::class);

            if ($item->getInContainer() != 0 || $item->getDepot() != 0)
                continue;

            $itemData = new CharacterItemResponse();
            $itemData->setId($item->getItemId());
            $itemData->setPosition($item->getLineNumber());
            $itemData->setNumber($item->getNumber());
            $itemData->setQuality($item->getQuality());
            $result->addItem($itemData);
        }

        return $this->view()->create($result, 200)
            ->setSerializationContext(SerializationContext::create()->setGroups(array('Default', 'success')));
    }

    /**
     * Create a new character. This will instantly create a new character provided all the values are valid and within
     * the legal ranges.
     *
     * @param Request $request
     * @param string $server the server the creation information are requested for
     * @return View
     * @RestAnnotations\Post("/character/{server}")
     * @RestAnnotations\QueryParam(name="server", requirements="illarionserver|testserver|devserver", description="The server the character is expected to be created on.")
     * @RestAnnotations\View()
     * @ApiDoc(
     *     authentication = true,
     *     authenticationRoles = {"ROLE_PLAYER"},
     *     resource = true,
     *     description = "Create a new character.",
     *     input = "Illarion\AccountSystemBundle\Form\CharacterCreateType",
     *     output = "Illarion\AccountSystemBundle\Model\CharacterCreateResponse",
     *     parameters = {
     *         {"name"="server", "dataType"="string", "required"=true, "requirements"="illarionserver|testserver|devserver"}
     *     },
     *     statusCodes = {
     *         201 = "Returned in case the character was correctly created.",
     *         400 = "In case the payload for the request was illegal or in case the server value is illegal",
     *         401 = "In case the account is not allowed to create a character on this server.",
     *         500 = "In case fetching the data from the database failed."
     *     }
     * )
     */
    public function postAction(Request $request, $server)
    {
        $translator = $this->get('translator');
        $translator->setLocale($request->getPreferredLanguage(array('de', 'en')));

        $result = new CharacterCreateResponse();
        $schema = $this->getSchemaFromServerIdent($server);
        if ($schema instanceof ErrorResponse)
        {
            $result->setError($schema);
            return $this->view()->create($result, $schema->getStatus())
                ->setSerializationContext(SerializationContext::create()->setGroups(array('Default', 'error')));
        }

        $authManager = $this->get('security.authorization_checker');
        if (($schema === 'TestServer' && !$authManager->isGranted('ROLE_TESTSERVER_ACCESS')) ||
            ($schema === 'DevServer' && !$authManager->isGranted('ROLE_DEVSERVER_ACCESS'))
        ) {
            $errorResp = new ErrorResponse();
            $errorResp->setStatus(401);
            $errorResp->setMessage($translator->trans('This account is not allowed to create a character on this server.'));
            $errorResp->setValue($server);
            $result->setError($errorResp);

            return $this->view()->create($result, 401)
                ->setSerializationContext(SerializationContext::create()->setGroups(array('Default', 'error')));
        }

        $form = $this->createForm(new CharacterCreateType());
        $form->handleRequest($request);

        if (!$form->isSubmitted()) {
            $errorResp = new ErrorResponse();
            $errorResp->setStatus(400);
            $errorResp->setMessage($translator->trans('Missing data. This function requires all data fields to be filled.'));
            $errorResp->setForm($form);
            $result->setError($errorResp);

            return $this->view()->create($result, 400)
                ->setSerializationContext(SerializationContext::create()->setGroups(array('Default', 'error')));
        }

        if (!$form->isValid()) {
            $errorResp = new ErrorResponse();
            $errorResp->setStatus(400);
            $errorResp->setMessage($translator->trans('The validation of the submitted values failed.'));
            $errorResp->setForm($form);
            $result->setError($errorResp);

            return $this->view()->create($result, 400)
                ->setSerializationContext(SerializationContext::create()->setGroups(array('Default', 'error')));
        }

        $data = $form->getData();
        $em = $this->getDoctrineManager();

        /** @var Chars $newCharacter */
        /** @var Player $newPlayer */
        switch ($schema) {
            case 'IllarionServer':
                $newCharacter = new IllarionServer\Chars();
                $newPlayer = new IllarionServer\Player();
                break;
            case 'TestServer':
                $newCharacter = new TestServer\Chars();
                $newPlayer = new TestServer\Player();
                break;
            case 'DevServer':
                $newCharacter = new DevServer\Chars();
                $newPlayer = new DevServer\Player();
                break;
            default:
                throw new \RuntimeException();
        }

        $raceRepo = $this->getRepository(self::getRepositoryIdentifier($schema, 'Race'));
        $raceDef = $raceRepo->findOneBy(array('id' => $data['race']));
        if (!($raceDef instanceof Race))
            throw new UnexpectedTypeException($raceDef, Race::class);

        $account = $this->getLoggedInAccount();

        // Check attributes
        if (self::isInRange($data['agility'], $raceDef->getAgilityMin(), $raceDef->getAgilityMax()))
            throw new AttributeOutOfRangeException('agility', $data['agility'],
                $raceDef->getAgilityMin(), $raceDef->getAgilityMax());

        if (self::isInRange($data['constitution'], $raceDef->getConstitutionMin(), $raceDef->getConstitutionMax()))
            throw new AttributeOutOfRangeException('constitution', $data['constitution'],
                $raceDef->getConstitutionMin(), $raceDef->getConstitutionMax());

        if (self::isInRange($data['dexterity'], $raceDef->getDexterityMin(), $raceDef->getDexterityMax()))
            throw new AttributeOutOfRangeException('dexterity', $data['dexterity'],
                $raceDef->getDexterityMin(), $raceDef->getDexterityMax());

        if (self::isInRange($data['essence'], $raceDef->getEssenceMin(), $raceDef->getEssenceMax()))
            throw new AttributeOutOfRangeException('essence', $data['essence'],
                $raceDef->getEssenceMin(), $raceDef->getEssenceMax());

        if (self::isInRange($data['intelligence'], $raceDef->getIntelligenceMin(), $raceDef->getIntelligenceMax()))
            throw new AttributeOutOfRangeException('intelligence', $data['intelligence'],
                $raceDef->getIntelligenceMin(), $raceDef->getIntelligenceMax());

        if (self::isInRange($data['perception'], $raceDef->getPerceptionMin(), $raceDef->getPerceptionMax()))
            throw new AttributeOutOfRangeException('perception', $data['perception'],
                $raceDef->getPerceptionMin(), $raceDef->getPerceptionMax());

        if (self::isInRange($data['strength'], $raceDef->getStrengthMin(), $raceDef->getStrengthMax()))
            throw new AttributeOutOfRangeException('strength', $data['strength'],
                $raceDef->getStrengthMin(), $raceDef->getStrengthMax());

        if (self::isInRange($data['willpower'], $raceDef->getWillpowerMin(), $raceDef->getWillpowerMax()))
            throw new AttributeOutOfRangeException('willpower', $data['willpower'],
                $raceDef->getWillpowerMin(), $raceDef->getWillpowerMax());

        $totalAttributes = 0;
        $totalAttributes += $data['agility'];
        $totalAttributes += $data['constitution'];
        $totalAttributes += $data['dexterity'];
        $totalAttributes += $data['essence'];
        $totalAttributes += $data['intelligence'];
        $totalAttributes += $data['perception'];
        $totalAttributes += $data['strength'];
        $totalAttributes += $data['willpower'];

        if ($totalAttributes <> $raceDef->getAttributePointsMax())
            throw new AttributeOutOfRangeException('race_attribute_points_max', $totalAttributes,
                $raceDef->getAttributePointsMax(), $raceDef->getAttributePointsMax());

        $newCharacter->setAccount($account);
        $newCharacter->setName($data['name']);
        $newCharacter->setRaceId($raceDef->getId());
        $newCharacter->setRaceTypeId($data['sex']);
        $em->persist($newCharacter);
        $em->flush();
        $em->refresh($newCharacter);

        $newPlayer->setPlayerId($newCharacter->getPlayerId());

        // Apply attributes
        $newPlayer->setAgility($data['agility']);
        $newPlayer->setConstitution($data['constitution']);
        $newPlayer->setDexterity($data['dexterity']);
        $newPlayer->setEssence($data['essence']);
        $newPlayer->setIntelligence($data['intelligence']);
        $newPlayer->setPerception($data['perception']);
        $newPlayer->setStrength($data['strength']);
        $newPlayer->setWillpower($data['willpower']);

        // Check and apply colors (Hair)
        $hairColours = $this->getRepository(self::getRepositoryIdentifier($schema, 'RaceHairColour'));
        $hairColorDef = $hairColours->findOneBy(array(
            'rhc_race_id' => $raceDef->getId(),
            'rhc_type_id' => $data['sex'],
            'rhc_red' => $data['hairColorRed'],
            'rhc_green' => $data['hairColorGreen'],
            'rhc_blue' => $data['hairColorBlue'],
            'rhc_alpha' => $data['hairColorAlpha']));
        if ($hairColorDef === null)
            throw new ColourNotFoundException('Hair', $raceDef->getId(), $data['sex'],
                $data['hairColorRed'], $data['hairColorGreen'], $data['hairColorBlue'], $data['hairColorAlpha']);
        if (!($hairColorDef instanceof RaceHairColour))
            throw new UnexpectedTypeException($hairColorDef, RaceHairColour::class);

        $newPlayer->setHairColorRed($hairColorDef->getRed());
        $newPlayer->setHairColorGreen($hairColorDef->getGreen());
        $newPlayer->setHairColorBlue($hairColorDef->getBlue());
        $newPlayer->setHairColorAlpha($hairColorDef->getAlpha());

        // Check and apply colors (Skin)
        $skinColours = $this->getRepository(self::getRepositoryIdentifier($schema, 'RaceSkinColour'));
        $skinColorDef = $skinColours->findOneBy(array(
            'rsc_race_id' => $raceDef->getId(),
            'rsc_type_id' => $data['sex'],
            'rsc_red' => $data['skinColorRed'],
            'rsc_green' => $data['skinColorGreen'],
            'rsc_blue' => $data['skinColorBlue'],
            'rsc_alpha' => $data['skinColorAlpha']));
        if ($skinColorDef === null)
            throw new ColourNotFoundException('Skin', $raceDef->getId(), $data['sex'],
                $data['skinColorRed'], $data['skinColorGreen'], $data['skinColorBlue'], $data['skinColorAlpha']);
        if (!($skinColorDef instanceof RaceSkinColour))
            throw new UnexpectedTypeException($skinColorDef, RaceSkinColour::class);

        $newPlayer->setSkinColorRed($skinColorDef->getRed());
        $newPlayer->setSkinColorGreen($skinColorDef->getGreen());
        $newPlayer->setSkinColorBlue($skinColorDef->getBlue());
        $newPlayer->setSkinColorAlpha($skinColorDef->getAlpha());

        if ($data['hairId'] === 0)
            $newPlayer->setHairId(0);
        else {
            $hairIdRef = $this->getRepository(self::getRepositoryIdentifier($schema, 'RaceHair'));
            $hair = $hairIdRef->findOneBy(array(
                'rh_race_id' => $raceDef->getId(),
                'rh_type_id' => $data['sex'],
                'rh_hair_id' => $data['hairId']
            ));
            if ($hair === null)
                throw new IllegalValueException('hair id', $data['hairId']);
            else
                $newPlayer->setHairId($data['hairId']);
        }

        if ($data['beardId'] === 0)
            $newPlayer->setHairId(0);
        else {
            $hairIdRef = $this->getRepository(self::getRepositoryIdentifier($schema, 'RaceBeard'));
            $hair = $hairIdRef->findOneBy(array(
                'rb_race_id' => $raceDef->getId(),
                'rb_type_id' => $data['sex'],
                'rb_beard_id' => $data['beardId']
            ));
            if ($hair === null)
                throw new IllegalValueException('beard id', $data['beardId']);
            else
                $newPlayer->setHairId($data['beardId']);
        }

        if (self::isInRange($data['height'], $raceDef->getHeightMin(), $raceDef->getHeightMax()))
        throw new AttributeOutOfRangeException('height', $data['height'],
            $raceDef->getHeightMin(), $raceDef->getHeightMax());

        if (self::isInRange($data['weight'], $raceDef->getWeightMin(), $raceDef->getWeightMax()))
        throw new AttributeOutOfRangeException('weight', $data['weight'],
            $raceDef->getWeightMin(), $raceDef->getWeightMax());

        $newPlayer->setHeight($data['height']);
        $newPlayer->setWeight($data['weight']);

        if (self::isInRange($data['age'], $raceDef->getAgeMin(), $raceDef->getAgeMax()))
            throw new AttributeOutOfRangeException('age', $data['age'],
                $raceDef->getAgeMin(), $raceDef->getAgeMax());

        $newPlayer->setAge($data['age']);

        $currentYear = IllaDateTime::IllaTimestampToTime('y');
        $dateOfBirth = IllaDateTime::mkIllaDatestamp($data['dateOfBirthMonth'], $data['dateOfBirthDay'], $currentYear - $data['age']);
        $newPlayer->setDateOfBirth($dateOfBirth);

        $em->persist($newPlayer);

        $startPacks = $this->getRepository(self::getRepositoryIdentifier($schema, 'StartPacks'));
        $startPack = $startPacks->findOneBy(array('id' => $data['startPack']));
        if ($startPack === null)
            throw new StartPackNotFoundException($data['startPack']);
        if (!($startPack instanceof StartPacks))
            throw new UnexpectedTypeException($startPack, StartPacks::class);

        foreach ($startPack->getSkills() as $skill) {
            if (!($skill instanceof StartPackSkills))
                throw new UnexpectedTypeException($skill, StartPackSkills::class);

            /** @var PlayerSkills $playerSkill */
            switch ($schema) {
                case 'illarionserver':
                    $playerSkill = new IllarionServer\PlayerSkills();
                    break;
                case 'testserver':
                    $playerSkill = new TestServer\PlayerSkills();
                    break;
                case 'devserver':
                    $playerSkill = new DevServer\PlayerSkills();
                    break;
                default:
                    throw new \RuntimeException();
            }

            $playerSkill->setPlayerId($newCharacter->getPlayerId());
            $playerSkill->setSkillId($skill->getSkillId());
            $playerSkill->setValue($skill->getSkillValue());
            $em->persist($playerSkill);
        }

        foreach ($startPack->getItems() as $item) {
            if (!($item instanceof StartPackItems))
                throw new UnexpectedTypeException($item, StartPackItems::class);

            /** @var PlayerItems $playerItem */
            switch ($schema) {
                case 'illarionserver':
                    $playerItem = new IllarionServer\PlayerItems();
                    break;
                case 'testserver':
                    $playerItem = new TestServer\PlayerItems();
                    break;
                case 'devserver':
                    $playerItem = new DevServer\PlayerItems();
                    break;
                default:
                    throw new \RuntimeException();
            }

            $playerItem->setPlayerId($newCharacter->getPlayerId());
            $playerItem->setItemId($item->getItemId());
            $playerItem->setLineNumber($item->getLinenumber());
            $playerItem->setNumber($item->getNumber());
            $playerItem->setQuality($item->getQuality());
            $em->persist($playerItem);
        }
        $em->flush();

        $successData = new SuccessResponse();
        $successData->setStatus(201);
        $successData->setMessage($translator->trans('Character created.'));

        $result->setSuccess($successData);
        return $this->view()->create($result, 201)
            ->setSerializationContext(SerializationContext::create()->setGroups(array('Default', 'success')));
    }

    /**
     * Update the values of a character.
     *
     * @param Request $request
     * @param string $server the server the creation information are requested for
     * @param integer $charId the ID of the character
     * @return View
     * @RestAnnotations\Put("/character/{server}/{charId}")
     * @RestAnnotations\QueryParam(name="server", requirements="illarionserver|testserver|devserver", description="The server the character is expected to be created on.")
     * @RestAnnotations\QueryParam(name="charId", requirements="%d+", description="The ID of the character that is requested.")
     * @RestAnnotations\View()
     * @ApiDoc(
     *     authentication = true,
     *     authenticationRoles = {"ROLE_PLAYER"},
     *     resource = true,
     *     description = "Update a character.",
     *     input = "Illarion\AccountSystemBundle\Form\CharacterUpdateType",
     *     output = "Illarion\AccountSystemBundle\Model\CharacterUpdateResponse",
     *     parameters = {
     *         {"name"="server", "dataType"="string", "required"=true, "requirements"="illarionserver|testserver|devserver"},
     *         {"name"="charId", "dataType"="number", "required"=true, "requirements"="%d+"}
     *     },
     *     statusCodes = {
     *         202 = "Returned in case the character was correctly updated.",
     *         400 = "In case the payload for the request was illegal or in case the server value is illegal",
     *         401 = "In case the account does not contain the character requested.",
     *         500 = "In case fetching the data from the database failed."
     *     }
     * )
     */
    public function putAction(Request $request, $server, $charId)
    {
        $translator = $this->get('translator');
        $translator->setLocale($request->getPreferredLanguage(array('de', 'en')));

        $result = new CharacterUpdateResponse();

        $schema = $this->getSchemaFromServerIdent($server);
        if ($schema instanceof ErrorResponse)
        {
            $result->setError($schema);
            return $this->view()->create($result, $schema->getStatus())
                ->setSerializationContext(SerializationContext::create()->setGroups(array('Default', 'error')));
        }

        if ($schema === 'TestServer' && $schema == 'DevServer')
            throw new NotSupportedException('Updating the character information is currently only supported on the illarion server.');

        $account = $this->getLoggedInAccount();
        $char = $this->getCharacter($schema, $account->getId(), $charId);
        if ($char instanceof View)
        {
            $result->setError($char);
            return $this->view()->create($result, $char->getStatus())
                ->setSerializationContext(SerializationContext::create()->setGroups(array('Default', 'error')));
        }

        $form = $this->createForm(new CharacterUpdateType());
        $form->handleRequest($request);

        if (!$form->isSubmitted()) {
            $errorResp = new ErrorResponse();
            $errorResp->setStatus(400);
            $errorResp->setMessage($translator->trans('Missing data. This function requires any filled entry.'));
            $errorResp->setForm($form);
            $result->setError($errorResp);

            return $this->view()->create($result, $errorResp->getStatus())
                ->setSerializationContext(SerializationContext::create()->setGroups(array('Default', 'error')));
        }

        if (!$form->isValid()) {
            $errorResp = new ErrorResponse();
            $errorResp->setStatus(400);
            $errorResp->setMessage($translator->trans('The validation of the submitted values failed.'));
            $errorResp->setForm($form);
            $result->setError($errorResp);

            return $this->view()->create($result, $errorResp->getStatus())
                ->setSerializationContext(SerializationContext::create()->setGroups(array('Default', 'error')));
        }

        $data = $form->getData();
        $charDetailsRepo = $this->getRepository(self::getRepositoryIdentifier('Homepage', 'CharacterDetails'));
        $oldDetails = $charDetailsRepo->findOneBy(array('char_id' => $char->getPlayerId()));

        if ($oldDetails == null || !($oldDetails instanceof CharacterDetails)) {
            $details = new CharacterDetails();
            $details->setCharId($char->getPlayerId());
        } else
            $details = $oldDetails;

        if (isset($data['descriptionDe']))
            $details->setDescriptionDe($data['descriptionDe']);
        if (isset($data['descriptionEn']))
            $details->setDescriptionEn($data['descriptionEn']);
        if (isset($data['storyDe']))
            $details->setDescriptionDe($data['storyDe']);
        if (isset($data['storyEn']))
            $details->setDescriptionEn($data['storyEn']);

        // TODO: Picture implementation

        $em = $this->getDoctrineManager();
        $em->persist($details);

        $em->flush();

        $successResp = new SuccessResponse();
        $successResp->setStatus(202);
        $successResp->setMessage($translator->trans('Character updated.'));
        $result->setSuccess($successResp);
        return $this->view()->create($result, 202)
            ->setSerializationContext(SerializationContext::create()->setGroups(array('Default', 'success')));
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
     * Get the account that is currently authenticated.
     *
     * @return \Illarion\DatabaseBundle\Entity\Accounts\Account
     */
    private function getLoggedInAccount()
    {
        $usr = $this->get('security.token_storage')->getToken()->getUser();

        if (!($usr instanceof User))
            throw new UnexpectedTypeException($usr, User::class);

        return $usr->getAccount();
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
     * Get the schema identifier of the server in case the mapping is good or a object that represents the mapping
     * error.
     *
     * @param string $server the server identifier
     * @return ErrorResponse|string the schema name or a view that contains the error
     */
    private function getSchemaFromServerIdent($server)
    {
        switch ($server) {
            case 'illarionserver':
                return 'IllarionServer';
            case 'testserver':
                return 'TestServer';
            case 'devserver':
                return 'DevServer';
            default:
                $translator = $this->get('translator');

                $errorResp = new ErrorResponse();
                $errorResp->setStatus(400);
                $errorResp->setMessage($translator->trans('The name supplies as server identifier is invalid.'));
                return $errorResp;
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

    private static function isInRange($value, $min, $max)
    {
        return ($value >= $min) && ($value <= $max);
    }

    /**
     * Get a specific character that belongs to a account.
     *
     * @param string $schema the schema name the character is fetched from
     * @param integer $accId the id of the account
     * @param integer $charId the id of the character that is expected
     * @return ErrorResponse|Chars a view that contains a error message or the character
     */
    private function getCharacter($schema, $accId, $charId)
    {
        $charsRepo = $this->getRepository(self::getRepositoryIdentifier($schema, 'Chars'));

        $char = $charsRepo->findOneBy(array('accId' => $accId, 'playerId' => $charId));
        if ($char == null || !($char instanceof Chars)) {
            $translator = $this->get('translator');

            $errorResp = new ErrorResponse();
            $errorResp->setStatus(401);
            $errorResp->setMessage($translator->trans('The character could not be located in the current account.'));
            return $errorResp;
        }

        return $char;
    }
}
