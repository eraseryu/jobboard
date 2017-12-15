<?php

namespace AppBundle\Form;


use Symfony\Component\OptionsResolver\OptionsResolver;
//use Symfony\Component\Form\AbstractType;
//use Symfony\Component\Form\FormBuilderInterface;

class UpdateNewsType extends NewsType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);
        $resolver->setDefaults(['is_edit' => true]);
    }

    public function getName()
    {
        return 'news_edit';
    }

}