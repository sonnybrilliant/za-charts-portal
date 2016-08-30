<?php

namespace Mlankatech\AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreateRadioStationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name',TextType::class,array(
                    'label' => 'Name',
                    'attr' => array(
                        'class' => 'form-control',
                        'tabindex' => '1',
                        'data-parsley-errors-container' => '#parsleyName',
                        'data-parsley-required-message' => 'Name is required.',
                        'placeholder' => 'Name'
                    ),
                    'help' => 'Radio station name',
                    'parsley_error_container' => 'parsleyName',
                ))
                ->add('languages', EntityType::class,array(
                    'class' => 'Mlankatech\AppBundle\Entity\Language',
                    'choice_label' => 'title',
                    'label' => 'languages used',
                    'multiple' => true,
                    'placeholder' => '-- select languages --',
                    'attr' => array(
                        'class' => 'form-control',
                        'tabindex' => '2',
                        'data-parsley-errors-container' => '#parsleyLanguage',
                        'data-parsley-required-message' => 'Language/s required.',
                    ),
                    'help' => 'Primary languages used by the Radio station',
                    'parsley_error_container' => 'parsleyLanguage',
                ))
                ->add('frequency',TextType::class,array(
                    'label' => 'Radio frequency',
                    'attr' => array(
                        'class' => 'form-control',
                        'tabindex' => '1',
                        'data-parsley-errors-container' => '#parsleyFrequency',
                        'data-parsley-required-message' => 'Frequency is required.',
                        'placeholder' => 'Frequency 98.8 FM'
                    ),
                    'help' => 'Radio station frequency',
                    'parsley_error_container' => 'parsleyFrequency',
                ))
                ->add('website',TextType::class,array(
                    'label' => 'Website',
                    'attr' => array(
                        'class' => 'form-control',
                        'tabindex' => '1',
                        'data-parsley-errors-container' => '#parsleyWebsite',
                        'data-parsley-required-message' => 'Website is required.',
                        'placeholder' => 'Website'
                    ),
                    'help' => 'Radio station website',
                    'parsley_error_container' => 'parsleyWebsite',
                ))
                ->add('contactNumber',TextType::class,array(
                    'label' => 'Contact number',
                    'attr' => array(
                        'class' => 'form-control',
                        'tabindex' => '1',
                        'data-parsley-errors-container' => '#parsleyContactNumber',
                        'data-parsley-required-message' => 'Contact number is required.',
                        'placeholder' => 'Contact number'
                    ),
                    'help' => 'Radio station contact number',
                    'parsley_error_container' => 'parsleyContactNumber',
                ))
            ->add('stream',TextType::class,array(
                'required' => false,
                'label' => 'Live stream url',
                'attr' => array(
                    'class' => 'form-control',
                    'tabindex' => '5',
                    'placeholder' => 'Stream url'
                ),
                'help' => 'Radio station live stream'
            ));


    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Mlankatech\AppBundle\Entity\RadioStation'
        ));
    }
}
