<?php

namespace Illarion\AccountSystemBundle\Controller;

use Doctrine\Common\Collections\Criteria;
use FOS\RestBundle\Controller\Annotations as RestAnnotations;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use Illarion\DatabaseBundle\Entity\Server\Race;
use Illarion\DatabaseBundle\Entity\Server\RaceBeard;
use Illarion\DatabaseBundle\Entity\Server\RaceHair;
use Illarion\DatabaseBundle\Entity\Server\RaceHairColour;
use Illarion\DatabaseBundle\Entity\Server\RaceSkinColour;
use Illarion\DatabaseBundle\Entity\Server\RaceTypes;
use Illarion\DatabaseBundle\Entity\Server\StartPackItems;
use Illarion\DatabaseBundle\Entity\Server\StartPacks;
use Illarion\DatabaseBundle\Entity\Server\StartPackSkills;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\File\Exception\UnexpectedTypeException;
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
    public function getAction(Request $request, $server)
    {
        $translator = $this->get('translator');

        $german = ($request->getPreferredLanguage(array('de', 'en')) == 'de');

        switch ($server)
        {
            case 'illarionserver': $schema = 'IllarionServer'; break;
            case 'testserver': $schema = 'TestServer'; break;
            case 'devserver': $schema = 'DevServer'; break;
            default:
                return $this->view()->create(array(
                    'error' => array(
                        'code' => 400,
                        'message' => $translator->trans('The name supplies as server identifier is invalid.'),
                        'value' => $server,
                        'requirement' => 'illarionserver|testserver|devserver'
                    )
                ), 400);
        }

        $result = array();

        $raceRepo = $this->getRepository(self::getRepositioryIdentifier($schema, 'Race'));
        $raceTypeRepo = $this->getRepository(self::getRepositioryIdentifier($schema, 'RaceTypes'));
        $result['race'] = array();

        $criteria = new Criteria();
        $criteria->where($criteria->expr()->lte('id', 5));
        $criteria->orderBy(array('id' => 'ASC'));
        foreach($raceRepo->matching($criteria) as $race)
        {
            if (!($race instanceof Race))
            {
                throw new UnexpectedTypeException($race, '\Illarion\DatabaseBundle\Entity\Server\Race');
            }

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
            //foreach($raceTypeRepo->findBy(array('raceId' => $race->getId())) as $raceType)
            foreach($race->getTypes() as $raceType)
            {
                if (!($raceType instanceof RaceTypes))
                {
                    throw new UnexpectedTypeException($raceType, RaceTypes::class);
                }
                $typeArray = array('id' => $raceType->getTypeId());

                $typeArray['beards'] = array();
                foreach($raceType->getBeards() as $beard)
                {
                    if (!($beard instanceof RaceBeard))
                    {
                        throw new UnexpectedTypeException($beard, RaceBeard::class);
                    }

                    $typeArray['beards'][] = array(
                        'id' => $beard->getBeardId(),
                        'name' => $german ? $beard->getNameDe() : $beard->getNameEn()
                    );
                }

                $typeArray['hairs'] = array();
                foreach($raceType->getHairs() as $hair)
                {
                    if (!($hair instanceof RaceHair))
                    {
                        throw new UnexpectedTypeException($hair, RaceHair::class);
                    }

                    $typeArray['hairs'][] = array(
                        'id' => $hair->getHairId(),
                        'name' => $german ? $hair->getNameDe() : $hair->getNameEn()
                    );
                }

                $typeArray['hairColours'] = array();
                foreach($raceType->getHairColours() as $hairColour)
                {
                    if (!($hairColour instanceof RaceHairColour))
                    {
                        throw new UnexpectedTypeException($hairColour, RaceHairColour::class);
                    }

                    $typeArray['hairColours'][] = self::getColorValue(
                        $hairColour->getRed(), $hairColour->getGreen(), $hairColour->getGreen(), $hairColour->getAlpha()
                    );
                }

                $typeArray['skinColours'] = array();
                foreach($raceType->getSkinColours() as $skinColour)
                {
                    if (!($skinColour instanceof RaceSkinColour))
                    {
                        throw new UnexpectedTypeException($skinColour, RaceSkinColour::class);
                    }

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
                {
                    throw new UnexpectedTypeException($packItem, StartPackItems::class);
                }

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
}
