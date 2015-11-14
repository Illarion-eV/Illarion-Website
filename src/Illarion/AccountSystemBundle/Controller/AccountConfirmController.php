<?php

namespace Illarion\AccountSystemBundle\Controller;

use Illarion\DatabaseBundle\Entity\Accounts\AccountUnconfirmed;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AccountConfirmController extends Controller
{
    /**
     * Confirm a E-Mail address action.
     *
     * @param integer $id the account id
     * @param string $uuid the uuid assigned to the new mail
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/account/confirm/{id}-{uuid}", name="account_account_confirm", methods="GET", requirements={
     *     "id": "\d+"
     *     "uuid": "[a-z0-9-]+"
     * })
     */
    public function getAction($id, $uuid)
    {
        $em = $this->getDoctrineManager();
        $unconfirmedAccountsRepo = $this->getRepository(self::getRepositoryIdentifier('Accounts', 'AccountUnconfirmed'));
        $unconfirmedAcc = $unconfirmedAccountsRepo->findOneBy(array('au_acc_id' => $id, 'au_id' => $uuid));

        if ($unconfirmedAcc === null || !($unconfirmedAcc instanceof AccountUnconfirmed))
        {
            return $this->render('IllarionAccountSystemBundle:check:accountNotFound.html.twig');
        }

        $account = $unconfirmedAcc->getAccount();
        $account->setEMail($unconfirmedAcc->getNewMail());
        $em->persist($account);
        $em->remove($unconfirmedAcc);
        $em->flush();

        return $this->render('IllarionAccountSystemBundle:check:accountMailConfirmed.html.twig');
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
    private static function getRepositoryIdentifier($schema, $table)
    {
        return 'IllarionDatabaseBundle:' . $schema . '\\' . $table;
    }
}
