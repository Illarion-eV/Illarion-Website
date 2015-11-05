<?php

namespace Illarion\SecurityBundle\Security\User;

use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class UserProvider implements UserProviderInterface
{
    private $class;
    private $metadata;
    private $repository;

    public function __construct(ManagerRegistry $registry, $managerName = null)
    {
        $em = $registry->getManager($managerName);

        $this->metadata = $em->getClassMetadata('IllarionDatabaseBundle:Accounts\Account');
        $this->class = $this->metadata->getName();

        $this->repository = $em->getRepository($this->class);
    }

    public function loadUserByUsername($username)
    {
        $account = $this->repository->findOneBy(array('accLogin' => $username));
        return new User($account);
    }

    public function refreshUser(UserInterface $user)
    {
        if (!$this->supportsClass($user)) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', get_class($user)));
        }

        if (!$id = $this->metadata->getIdentifierValues($user->getAccount())) {
            throw new \InvalidArgumentException('You cannot refresh a user '.
                'from the EntityUserProvider that does not contain an identifier. '.
                'The user object has to be serialized with its own identifier '.
                'mapped by Doctrine.'
            );
        }

        $refreshedUser = $this->repository->find($id);
        if (null === $refreshedUser) {
            throw new UsernameNotFoundException(sprintf('User with id %s not found', json_encode($id)));
        }

        return new User($refreshedUser);
    }

    public function supportsClass($class)
    {
        return $class instanceof User;
    }
}