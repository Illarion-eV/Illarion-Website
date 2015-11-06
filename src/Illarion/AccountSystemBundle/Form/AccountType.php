<?php

namespace Illarion\AccountSystemBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AccountType extends AbstractType
{
    private $forUpdate;

    public function __construct($forUpdate)
    {
        $this->forUpdate = $forUpdate;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text', array('required' => !$this->forUpdate));
        $builder->add('password', 'password', array('required' => !$this->forUpdate));
        $builder->add('email', 'email', array('required' => false));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'csrf_protection' => false
        ));
    }

    public function getName()
    {
        return '';
    }
}
