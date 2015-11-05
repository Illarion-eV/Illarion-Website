<?php

namespace Illarion\SecurityBundle\Security\User;

use Illarion\DatabaseBundle\Entity\Accounts\Account;
use Symfony\Component\Security\Core\Role\Role;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;

class User implements AdvancedUserInterface, \Serializable
{
    /**
     * @var Account
     */
    private $account;


    public function __construct(Account $account)
    {
        $this->account = $account;
    }

    /**
     * @return Role[] The user roles
     */
    public function getRoles()
    {
        return [new Role('ROLE_PLAYER')];
    }

    /**
     * @return string The password
     */
    public function getPassword()
    {
        return $this->account->getAccPasswd();
    }

    /**
     * @return string|null The salt
     */
    public function getSalt()
    {
        return '$1$illarion$';
    }

    /**
     * @return string The username
     */
    public function getUsername()
    {
        return $this->account->getAccLogin();
    }

    /**
     * @return Account
     */
    public function getAccount() {
        return $this->account;
    }

    public function isAccountNonLocked()
    {
        return $this->account->getAccState() <= 3;
    }

    public function isCredentialsNonExpired()
    {
        return true;
    }

    public function isEnabled()
    {
        return $this->account->getAccState() >= 3;
    }

    public function eraseCredentials()
    {
    }

    public function serialize()
    {
        return serialize(array($this->account));
    }

    public function unserialize($serialized)
    {
        list($this->account) = unserialize($serialized);
    }

    public function isAccountNonExpired()
    {
        return true;
    }
}