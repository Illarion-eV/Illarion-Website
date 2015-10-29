<?php

namespace Illarion\SecurityBundle\Security\User;

use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Translation\Loader\XliffFileLoader;
use Symfony\Component\Translation\MessageSelector;
use Symfony\Component\Translation\Translator;

class IllarionUserProvider extends EntityRepository implements UserProviderInterface
{
    public function loadUserByUsername($username)
    {
        $translator = new Translator('de', new MessageSelector());
        $translator->addLoader('xlf', new XliffFileLoader());
        $translator->addResource('xlf', 'messages.de.xlf', 'de');

        $userData = $this->createQueryBuilder('a')
            ->where('a.acc_login = :username')
            ->setParameter('username', $username)
            ->getQuery()
            ->getOneOrNullResult();

        if (null == $userData) {
            $message = $translator->trans(
                'Unable to find user identified by "%name%".',
                array('name' => $username));
            throw new UsernameNotFoundException($message);
        }

        return new IllarionUser($userData);
    }

    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof IllarionUser) {
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