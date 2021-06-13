<?php

namespace Illarion\AccountSystemBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Range;

class CharacterCreateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text');
        $builder->add('race', 'integer', array(
            'constraints' => array(
                new Range(array('min' => 0, 'max' => 5))
            )
        ));
        $builder->add('sex', 'integer', array(
            'constraints' => array(
                new Range(array('min' => 0, 'max' => 1))
            )
        ));
        $builder->add('agility', 'integer');
        $builder->add('constitution', 'integer');
        $builder->add('dexterity', 'integer');
        $builder->add('essence', 'integer');
        $builder->add('intelligence', 'integer');
        $builder->add('perception', 'integer');
        $builder->add('strength', 'integer');
        $builder->add('willpower', 'integer');
        $builder->add('startPack', 'integer');

        $builder->add('hairId', 'integer');
        $builder->add('beardId', 'integer');

        $builder->add('skinColorRed', 'integer', array(
            'constraints' => array(
                new Range(array('min' => 0, 'max' => 255))
            )
        ));
        $builder->add('skinColorGreen', 'integer', array(
            'constraints' => array(
                new Range(array('min' => 0, 'max' => 255))
            )
        ));
        $builder->add('skinColorBlue', 'integer', array(
            'constraints' => array(
                new Range(array('min' => 0, 'max' => 255))
            )
        ));
        $builder->add('skinColorAlpha', 'integer', array(
            'constraints' => array(
                new Range(array('min' => 0, 'max' => 255))
            )
        ));

        $builder->add('hairColorRed', 'integer', array(
            'constraints' => array(
                new Range(array('min' => 0, 'max' => 255))
            )
        ));
        $builder->add('hairColorGreen', 'integer', array(
            'constraints' => array(
                new Range(array('min' => 0, 'max' => 255))
            )
        ));
        $builder->add('hairColorBlue', 'integer', array(
            'constraints' => array(
                new Range(array('min' => 0, 'max' => 255))
            )
        ));
        $builder->add('hairColorAlpha', 'integer', array(
            'constraints' => array(
                new Range(array('min' => 0, 'max' => 255))
            )
        ));

        $builder->add('weight', 'integer');
        $builder->add('height', 'integer');

        $builder->add('age', 'integer');
        $builder->add('dateOfBirthDay', 'integer');
        $builder->add('dateOfBirthMonth', 'integer');
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
