<?php

namespace Illarion\SecurityBundle\Entity\Accounts;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Doctrine\ORM\EntityRepository;

class AccountRepository extends EntityRepository implements UserProviderInterface
{
    public function loadUserByUsername($username)
    {
        $userData = $this->createQueryBuilder('a')
            ->where('a.accLogin = :username')
            ->setParameter('username', $username)
            ->getQuery()
            ->getOneOrNullResult();

        if (null == $userData) {
            $ex = new UsernameNotFoundException();
            $ex->setUsername($username);
            throw $ex;
        }

        return $userData;
    }

    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof Account) {
            throw new UnsupportedUserException(
                sprintf('Instances of "%s" are not supported.', get_class($user))
            );
        }

        return $this->loadUserByUsername($user->getUsername());
    }

    public function supportsClass($class)
    {
        return $this->getEntityName() === $class || is_subclass_of($class, $this->getEntityName());
    }
}