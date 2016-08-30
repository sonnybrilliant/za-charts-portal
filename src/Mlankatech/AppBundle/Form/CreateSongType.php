<?php

namespace Mlankatech\AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreateSongType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title',TextType::class,array(
                    'label' => 'Title',
                    'attr' => array(
                        'class' => 'form-control',
                        'tabindex' => '1',
                        'data-parsley-errors-container' => '#parsleyTitle',
                        'data-parsley-required-message' => 'Title is required.',
                        'placeholder' => 'Title'
                    ),
                    'help' => 'Song title',
                    'parsley_error_container' => 'parsleyTitle',
                ))
                ->add('artist', EntityType::class,array(
                    'class' => 'Mlankatech\AppBundle\Entity\Artist',
                    'choice_label' => 'name',
                    'placeholder' => '-- select artist --',
                    'attr' => array(
                        'class' => 'form-control',
                        'tabindex' => '2',
                        'data-parsley-errors-container' => '#parsleyArtist',
                        'data-parsley-required-message' => 'Artist is required.',
                    ),
                    'help' => 'Artist who owns the song ',
                    'parsley_error_container' => 'parsleyArtist',
                ))
                ->add('album',TextType::class,array(
                    'label' => 'Album name',
                    'attr' => array(
                        'class' => 'form-control'
                    )
                ))
                ->add('songWriter',TextType::class,array(
                    'label' => 'Song writer',
                    'attr' => array(
                        'class' => 'form-control'
                    )
                ))
                ->add('featuredArtist',TextType::class,array(
                    'required' => false,
                    'attr' => array(
                        'class' => 'form-control',
                        'tabindex' => '5',
                        'placeholder' => 'featured artist'
                    ),
                    'help' => 'Featured artist'
                ))
            ->add('isrc',TextType::class,array(
                'required' => false,
                'label' => 'ISRC code',
                'attr' => array(
                    'class' => 'form-control',
                    'tabindex' => '5',
                    'placeholder' => 'ISRC code'
                ),
                'help' => 'ISRC Code'
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
             ->add('originalFile', FileType::class,array(
                    'label' => 'Song file(MP3)',
                    'attr' => array(
                        'class' => 'form-control'
                    )
             ))
            ->add('publishedAt', TextType::class,array(
                   'attr' => array(
                       'class' => 'form-control songPublishedAt'
                   ),
                   'help' => 'Song publish date',
                   'date_icon' => true

            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Mlankatech\AppBundle\Entity\Song'
        ));
    }
}
