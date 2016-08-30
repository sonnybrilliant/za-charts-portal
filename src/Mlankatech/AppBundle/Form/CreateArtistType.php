<?php

namespace Mlankatech\AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreateArtistType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name',TextType::class,array(
                    'label' => 'Stage name',
                    'attr' => array(
                        'class' => 'form-control',
                        'tabindex' => '1',
                        'data-parsley-errors-container' => '#parsleyName',
                        'data-parsley-required-message' => 'Stage name is required.',
                        'placeholder' => 'Stage name'
                    ),
                    'help' => 'Artist name',
                    'parsley_error_container' => 'parsleyName',
                ))
                ->add('recordLabel', EntityType::class,array(
                    'class' => 'Mlankatech\AppBundle\Entity\RecordLabel',
                    'choice_label' => 'name',
                    'placeholder' => '-- select record label --',
                    'attr' => array(
                        'class' => 'form-control',
                        'tabindex' => '2',
                        'data-parsley-errors-container' => '#parsleyRecordLabel',
                        'data-parsley-required-message' => 'Record label is required.',
                    ),
                    'help' => 'Artist Record label ',
                    'parsley_error_container' => 'parsleyRecordLabel',
                ))
                ->add('isBand',CheckboxType::class,array(
                    'label' => 'Is a band?',
                    'attr' => array(
                        'class' => 'icheck'
                    )
                ))
                ->add('isLocal',CheckboxType::class,array(
                    'label' => 'Is a South African Artist?',
                    'attr' => array(
                        'class' => 'icheck'
                    )
                ))
                ->add('genres',EntityType::class,array(
                    'class' => 'Mlankatech\AppBundle\Entity\Genre',
                    'choice_label' => 'title',
                    'multiple' => true,
                    'attr' => array(
                        'class' => 'form-control',
                        'tabindex' => '2',
                        'data-parsley-errors-container' => '#parsleyGenres',
                        'data-parsley-required-message' => 'Genre is required.',
                    ),
                    'help' => 'Artist genre, Hint: You can select multiple ',
                    'parsley_error_container' => 'parsleyGenre',
                ))
                ->add('website',TextType::class,array(
                    'attr' => array(
                        'class' => 'form-control',
                        'tabindex' => '5',
                        'placeholder' => 'website'
                    ),
                    'help' => 'Artist website'
                ))
                ->add('gender',EntityType::class,array(
                    'label' => 'Gender',
                    'class' => 'Mlankatech\AppBundle\Entity\Gender',
                    'placeholder' => '-- select gender --',
                    'attr' => array(
                        'class' => 'form-control',
                        'tabindex' => '6'
                    ),
                    'help' => 'Artist gender if applicable'
                ))
                ->add('region',TextType::class,array(
                    'label' => 'City',
                    'attr' => array(
                        'class' => 'form-control',
                        'placeholder' => 'Artist location',
                    ),
                    'help' => 'Area which the Artist is based'
                ))
                ->add('artistImage', FileType::class,array(
                    'label' => 'Profile image(Jpeg)',
                    'attr' => array(
                        'class' => 'form-control'
                    )
                ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Mlankatech\AppBundle\Entity\Artist'
        ));
    }
}
