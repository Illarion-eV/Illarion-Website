<?php

namespace Illarion\AccountSystemBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class CharacterUpdateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('descriptionDe', 'textarea');
        $builder->add('descriptionEn', 'textarea');
        $builder->add('storyDe', 'textarea');
        $builder->add('storyEn', 'textarea');
        $builder->add('picture', 'file', array(
            'constraints' => array(
                new File(array(
                    'maxSize' => '200k',
                    'mimeTypes' => array('image/png', 'image/jpeg', 'image/gif')
                ))
            ))
        );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'csrf_protection' => false,
            'required' => false
        ));
    }

    public function getName()
    {
        return '';
    }
}
