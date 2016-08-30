<?php

namespace Mlankatech\AppBundle\Form\Extension;


use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;


class PasleyValidatorTypeExtension extends AbstractTypeExtension
{
    public function getExtendedType()
    {
        return FormType::class;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefined(array('parsley_error_container'));
    }

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        if(isset($options['parsley_error_container'])){
            $view->vars['parsley_error_container'] = $options['parsley_error_container'];
        }
    }
}