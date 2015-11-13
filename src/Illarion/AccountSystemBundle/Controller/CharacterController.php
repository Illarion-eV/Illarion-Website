<?php

namespace Illarion\AccountSystemBundle\Controller;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\Criteria;
use FOS\RestBundle\Controller\Annotations as RestAnnotations;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use Illarion\AccountSystemBundle\Exception\AttributeOutOfRangeException;
use Illarion\AccountSystemBundle\Exception\ColourNotFoundException;
use Illarion\AccountSystemBundle\Exception\IllegalValueException;
use Illarion\AccountSystemBundle\Exception\StartPackNotFoundException;
use Illarion\AccountSystemBundle\Exception\UnexpectedTypeException;
use Illarion\AccountSystemBundle\Form\CharacterCreateType;
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
use Illarion\SecurityBundle\Security\User\User;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;
use Illarion\DatabaseBundle\Entity\IllarionServer;
use Illarion\DatabaseBundle\Entity\TestServer;
use Illarion\DatabaseBundle\Entity\DevServer;

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
     *     statusCodes = {
     *         200 = "Returned in case the data was correctly fetched and returned",
     *         400 = "In case the server value was illegal.",
     *         500 = "In case fetching the data from the database failed."
     *     }
     * )
     */
    public function getCreateAction(Request $request, $server)
    {
        $german = ($request->getPreferredLanguage(array('de', 'en')) == 'de');

        $schema = $this->getSchemaFromServerIdent($server);
        if ($schema instanceof View)
            return $schema;

        $result = array();

        $raceRepo = $this->getRepository(self::getRepositioryIdentifier($schema, 'Race'));
        $result['race'] = array();

        $criteria = new Criteria();
        $criteria->where($criteria->expr()->lte('id', 5));
        $criteria->orderBy(array('id' => 'ASC'));
        foreach($raceRepo->matching($criteria) as $race)
        {
            if (!($race instanceof Race))
                throw new UnexpectedTypeException($race, Race::class);


            $raceArray = array(
                'id' => $race->getId(),
                'name' => ($german ? $race->getNameDe() : $race->getNameEn()),
                'attributes' => array(
                    'age' => self::getMinMaxArray($race->getAgeMin(), $race->getAgeMax()),
                    'height' => self::getMinMaxArray($race->getHeightMin(), $race->getHeightMax()),
                    'weight' => self::getMinMaxArray($race->getWeightMin(), $race->getWeightMax()),
                    'agility' => self::getMinMaxArray($race->getAgilityMin(), $race->getAgilityMax()),
                    'constitution' => self::getMinMaxArray($race->getConstitutionMin(), $race->getConstitutionMax()),
                    'dexterity' => self::getMinMaxArray($race->getDexterityMin(), $race->getDexterityMax()),
                    'essence' => self::getMinMaxArray($race->getEssenceMin(), $race->getEssenceMax()),
                    'intelligence' => self::getMinMaxArray($race->getIntelligenceMin(), $race->getIntelligenceMax()),
                    'perception' => self::getMinMaxArray($race->getPerceptionMin(), $race->getPerceptionMax()),
                    'strength' => self::getMinMaxArray($race->getStrengthMin(), $race->getStrengthMax()),
                    'willpower' => self::getMinMaxArray($race->getWillpowerMin(), $race->getWillpowerMax()),
                    'maxPoints' => $race->getAttributePointsMax()
                ),
            );

            $raceArray['types'] = array();
            foreach($race->getTypes() as $raceType)
            {
                if (!($raceType instanceof RaceTypes))
                    throw new UnexpectedTypeException($raceType, RaceTypes::class);

                $typeArray = array('id' => $raceType->getTypeId());

                $typeArray['beards'] = array();
                foreach($raceType->getBeards() as $beard)
                {
                    if (!($beard instanceof RaceBeard))
                        throw new UnexpectedTypeException($beard, RaceBeard::class);


                    $typeArray['beards'][] = array(
                        'id' => $beard->getBeardId(),
                        'name' => $german ? $beard->getNameDe() : $beard->getNameEn()
                    );
                }

                $typeArray['hairs'] = array();
                foreach($raceType->getHairs() as $hair)
                {
                    if (!($hair instanceof RaceHair))
                        throw new UnexpectedTypeException($hair, RaceHair::class);


                    $typeArray['hairs'][] = array(
                        'id' => $hair->getHairId(),
                        'name' => $german ? $hair->getNameDe() : $hair->getNameEn()
                    );
                }

                $typeArray['hairColours'] = array();
                foreach($raceType->getHairColours() as $hairColour)
                {
                    if (!($hairColour instanceof RaceHairColour))
                        throw new UnexpectedTypeException($hairColour, RaceHairColour::class);


                    $typeArray['hairColours'][] = self::getColorValue(
                        $hairColour->getRed(), $hairColour->getGreen(), $hairColour->getGreen(), $hairColour->getAlpha()
                    );
                }

                $typeArray['skinColours'] = array();
                foreach($raceType->getSkinColours() as $skinColour)
                {
                    if (!($skinColour instanceof RaceSkinColour))
                        throw new UnexpectedTypeException($skinColour, RaceSkinColour::class);


                    $typeArray['skinColours'][] = self::getColorValue(
                        $skinColour->getRed(), $skinColour->getGreen(), $skinColour->getGreen(), $skinColour->getAlpha()
                    );
                }

                $raceArray['types'][] = $typeArray;
            }

            $result['race'][] = $raceArray;
        }

        $startPackRepo = $this->getRepository(self::getRepositioryIdentifier($schema, 'StartPacks'));
        $result['startPacks'] = array();
        foreach($startPackRepo->findAll() as $startPack)
        {
            if (!($startPack instanceof StartPacks))
            {
                throw new UnexpectedTypeException($startPack, StartPacks::class);
            }

            $startPackArray = array(
                'id' => $startPack->getId(),
                'name' => $german ? $startPack->getNameDe() : $startPack->getNameEn(),
                'skills' => array(),
                'items' => array()
            );

            foreach($startPack->getSkills() as $packSkill)
            {
                if (!($packSkill instanceof StartPackSkills))
                {
                    throw new UnexpectedTypeException($packSkill, StartPackSkills::class);
                }

                $startPackArray['skills'][] = array(
                    'id' => $packSkill->getSkillId(),
                    'value' => $packSkill->getSkillValue()
                );
            }

            foreach($startPack->getItems() as $packItem)
            {
                if (!($packItem instanceof StartPackItems))
                    throw new UnexpectedTypeException($packItem, StartPackItems::class);


                $item = $packItem->getItem();

                $startPackArray['items'][] = array(
                    'itemId' => $packItem->getItemId(),
                    'position' => $packItem->getLinenumber(),
                    'number' => $packItem->getNumber(),
                    'quality' => $packItem->getQuality(),
                    'name' => $german ? $item->getNameDe() : $item->getNameEn(),
                    'unitWorth' => $item->getWorth(),
                    'unitWeight' => $item->getWeight()
                );
            }

            $result['startPacks'][] = $startPackArray;
        }

        return $this->view()->create($result, 200);
    }

    /**
     * Get the general information for the character creation. This function will return the required data for all
     * possible races.
     *
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
     *     statusCodes = {
     *         200 = "The character is valid, belongs to the logged in account and was correctly fetched.",
     *         400 = "In case the server value was illegal.",
     *         401 = "In case the character does not belong to the logged in account.",
     *         500 = "In case fetching the data from the database failed."
     *     }
     * )
     */
    public function getAction($server, $charId)
    {
        $account = $this->getLoggedInAccount();
        $schema = $this->getSchemaFromServerIdent($server);
        if ($schema instanceof View)
            return $schema;

        $charsRepo = $this->getRepository(self::getRepositioryIdentifier($schema, 'Chars'));

        $char = $charsRepo->findOneBy(array('accId' => $account->getId(), 'playerId' => $charId));
        if ($char === null || !($char instanceof Chars))
        {
            $translator = $this->get('translator');
            return $this->view()->create(array(
                'error' => array(
                    'code' => 401,
                    'message' => $translator->trans('The character could not be located in the current account.'),
                    'value' => array('server' => $server, 'charId' => $charId)
                )
            ), 401);
        }

        $player = $char->getPlayer(); 
        return $this->view()->create(array(
            'id' => $char->getPlayerId(),
            'name' => $char->getName(),
            'race' => $char->getRaceId(),
            'raceType' => $char->getRaceTypeId(),
            'attributes' => array(
                'agility' => $player->getAgility(),
                'constitution' => $player->getConsitution(),
                'dexterity' => $player->getDexterity(),
                'essence' => $player->getEssence(),
                'intelligence' => $player->getIntelligence(),
                'perception' => $player->getPerception(),
                'strength' => $player->getStrength(),
                'willpower' => $player->getWillpower()
            ),
            'dateOfBirth' => $player->getDateOfBirth(),
            'bodyHeight' => $player->getHeight(),
            'bodyWeight' => $player->getWeight(),
            'paperDoll' => array(
                'hairId' => $player->getHairId(),
                'beardId' => $player->getBeardId(),
                'hairColour' => self::getColorValue(
                    $player->getHairColorRed(),
                    $player->getHairColorGreen(),
                    $player->getHairColorBlue(),
                    $player->getHairColorAlpha()
                ),
                'skinColour' => self::getColorValue(
                    $player->getSkinColorRed(),
                    $player->getSkinColorGreen(),
                    $player->getSkinColorBlue(),
                    $player->getSkinColorAlpha()
                )
            ),
            'items' => self::getItems($player->getItems())
        ), 200);
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
     *     description = "Create a new account.",
     *     input = "Illarion\AccountSystemBundle\Form\CharacterCreateType",
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
        $schema = $this->getSchemaFromServerIdent($server);
        if ($schema instanceof View)
            return $schema;

        $translator = $this->get('translator');

        $authManager = $this->get('security.authorization_checker');
        if (($schema === 'TestServer' && !$authManager->isGranted('ROLE_TESTSERVER_ACCESS')) ||
            ($schema === 'DevServer' && !$authManager->isGranted('ROLE_DEVSERVER_ACCESS')))
        {
            return $this->view()->create(array(
                'error' => array(
                    'code' => 401,
                    'message' => $translator->trans('This account is not allowed to create a character on this server.'),
                    'value' => $server
                )
            ), 401);
        }

        $form = $this->createForm(new CharacterCreateType());
        $form->handleRequest($request);

        if (!$form->isSubmitted()) {
            $result = array();
            $result['error'] = array(
                'code' => 400,
                'message' => $translator->trans('Missing data. This function requires all data fields to be filled.'),
                'form' => $form
            );
            $view = $this->view()->create($result, 400);
        }
        elseif ($form->isValid())
        {

            $data = $form->getData();
            $em = $this->getDoctrineManager();

            /** @var Chars $newCharacter */
            /** @var Player $newPlayer */
            switch ($schema)
            {
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
                default: throw new \RuntimeException();
            }

            $raceRepo = $this->getRepository(self::getRepositioryIdentifier($schema, 'Race'));
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
            $newCharacter->setRace($raceDef);
            $newCharacter->setRaceTypeId($data['sex']);
            $em->persist($newCharacter);

            $newPlayer->setCharacter($newCharacter);

            // Apply attributes
            $newPlayer->setAgility($data['agility']);
            $newPlayer->setConsitution($data['constitution']);
            $newPlayer->setDexterity($data['dexterity']);
            $newPlayer->setEssence($data['essence']);
            $newPlayer->setIntelligence($data['intelligence']);
            $newPlayer->setPerception($data['perception']);
            $newPlayer->setStrength($data['strength']);
            $newPlayer->setWillpower($data['willpower']);

            // Check and apply colors (Hair)
            $hairColours = $this->getRepository(self::getRepositioryIdentifier($schema, 'RaceHairColour'));
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
            $skinColours = $this->getRepository(self::getRepositioryIdentifier($schema, 'RaceSkinColour'));
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
            else
            {
                $hairIdRef = $this->getRepository(self::getRepositioryIdentifier($schema, 'RaceHair'));
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
            else
            {
                $hairIdRef = $this->getRepository(self::getRepositioryIdentifier($schema, 'RaceBeard'));
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

            $em->persist($newPlayer);

            $startPacks = $this->getRepository(self::getRepositioryIdentifier($schema, 'StartPacks'));
            $startPack = $startPacks->findOneBy(array('id' => $data['startPack']));
            if ($startPack === null)
                throw new StartPackNotFoundException($data['startPack']);
            if (!($startPack instanceof StartPacks))
                throw new UnexpectedTypeException($startPack, StartPacks::class);

            foreach ($startPack->getSkills() as $skill)
            {
                if (!($skill instanceof StartPackSkills))
                    throw new UnexpectedTypeException($skill, StartPackSkills::class);

                /** @var PlayerSkills $playerSkill */
                switch ($schema)
                {
                    case 'illarionserver': $playerSkill = new IllarionServer\PlayerSkills(); break;
                    case 'testserver': $playerSkill = new TestServer\PlayerSkills(); break;
                    case 'devserver': $playerSkill = new DevServer\PlayerSkills(); break;
                    default: throw new \RuntimeException();
                }

                $playerSkill->setPlayer($newPlayer);
                $playerSkill->setSkillId($skill->getSkillId());
                $playerSkill->setValue($skill->getSkillValue());
                $em->persist($playerSkill);
            }

            foreach ($startPack->getItems() as $item)
            {
                if (!($item instanceof StartPackItems))
                    throw new UnexpectedTypeException($item, StartPackItems::class);

                /** @var PlayerItems $playerItem */
                switch ($schema)
                {
                    case 'illarionserver': $playerItem = new IllarionServer\PlayerItems(); break;
                    case 'testserver': $playerItem = new TestServer\PlayerItems(); break;
                    case 'devserver': $playerItem = new DevServer\PlayerItems(); break;
                    default: throw new \RuntimeException();
                }

                $playerItem->setPlayer($newPlayer);
                $playerItem->setItemId($item->getItemId());
                $playerItem->setLineNumber($item->getLinenumber());
                $playerItem->setNumber($item->getNumber());
                $playerItem->setQuality($item->getQuality());
                $em->persist($playerItem);
            }

            $view = $this->view()->create($translator->trans('Character created.'), 201);
        }
        else
        {
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
     * @return View|string the schema name or a view that contains the error
     */
    private function getSchemaFromServerIdent($server)
    {
        switch ($server)
        {
            case 'illarionserver': return 'IllarionServer';
            case 'testserver': return 'TestServer';
            case 'devserver': return 'DevServer';
            default:
                $translator = $this->get('translator');
                return $this->view()->create(array(
                    'error' => array(
                        'code' => 400,
                        'message' => $translator->trans('The name supplies as server identifier is invalid.'),
                        'value' => $server,
                        'requirement' => 'illarionserver|testserver|devserver'
                    )
                ), 400);
        }
    }

    /**
     * Build the schema identifier for one of the tables of the Illarion database.
     *
     * @param string $schema the name of the schema
     * @param string $table the name of the table
     * @return string the full identifier
     */
    private static function getRepositioryIdentifier($schema, $table)
    {
        return 'IllarionDatabaseBundle:' . $schema . '\\' . $table;
    }

    /**
     * Get a array containing the minimal and the maximal value. The array is prepared for json data
     *
     * @param mixed $minValue min value
     * @param mixed $maxValue max value
     * @return array json prepared data array
     */
    private static function getMinMaxArray($minValue, $maxValue)
    {
        return array('min' => $minValue, 'max' => $maxValue);
    }

    /**
     * Prepare a rgba color value for the transfer as json data.
     *
     * @param mixed $red
     * @param mixed $green
     * @param mixed $blue
     * @param mixed $alpha
     * @return array the data
     */
    private static function getColorValue($red, $green, $blue, $alpha)
    {
        return array(
            'red' => $red,
            'green' => $green,
            'blue' => $blue,
            'alpha' => $alpha
        );
    }

    /**
     * Build a item list for a specific character of the items worn on the body.
     *
     * @param Collection $items the items
     * @return array the data set relevant for the data transfer
     */
    private static function getItems($items)
    {
        $result = array();
        foreach($items as $item)
        {
            if (!($item instanceof PlayerItems))
                throw new UnexpectedTypeException($item, PlayerItems::class);

            if ($item->getInContainer() != 0 || $item->getDepot() != 0)
                continue;

            $result[] = array(
                'id' => $item->getItemId(),
                'position' => $item->getLineNumber(),
                'number' => $item->getNumber(),
                'quality' => $item->getQuality()
            );
        }
        return $result;
    }

    private static function isInRange($value, $min, $max)
    {
        return ($value >= $min) && ($value <= $max);
    }
}
