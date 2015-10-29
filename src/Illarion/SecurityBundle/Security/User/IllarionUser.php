<?php

namespace Illarion\SecurityBundle\Security\User;

use Illarion\SecurityBundle\Entity\Accounts\Account;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\EquatableInterface;

class IllarionUser implements UserInterface, EquatableInterface
{
    /**
     * @var Account
     */
    private $account;

    public function __construct(Account $account)
    {
        $this->$account = $account;
    }

    public function getRoles()
    {
        return null;
    }

    public function getPassword()
    {
        return $this->account->getAccPasswd();
    }

    public function getSalt()
    {
        return '$1$illarion$';
    }

    public function getUsername()
    {
        return $this->account->getAccLogin();
    }

    public function eraseCredentials()
    {
    }

    public function isEqualTo(UserInterface $user)
    {
        if (!$user instanceof IllarionUser) {
            return false;
        }

        if ($this->getPassword() !== $user->getPassword()) {
            return false;
        }

        if ($this->getSalt() !== $user->getSalt()) {
            return false;
        }

        if ($this->getUsername() !== $user->getUsername()) {
            return false;
        }

        return true;
    }
}