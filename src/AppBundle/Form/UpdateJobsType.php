<?php

namespace AppBundle\Form;


use Symfony\Component\OptionsResolver\OptionsResolver;

class UpdateJobsType extends JobsType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);
        $resolver->setDefaults(['is_edit' => true]);
    }

    public function getName()
    {
        return 'job_edit';
    }
}