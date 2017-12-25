<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class JobsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class)
            ->add('description', TextareaType::class)
            ->add('job_category', IntegerType::class)
            ->add('employee_type', IntegerType::class)
            ->add('position_type', IntegerType::class)
            ->add('experience_level', IntegerType::class)
            ->add('school_level', IntegerType::class)
            ->add('salary', NumberType::class)
            ->add('country', IntegerType::class)
            ->add('state', IntegerType::class)
            ->add('city', IntegerType::class)
            ->add('company_id', IntegerType::class)
            ->add('contact_email', EmailType::class)
            ->add('expires_after', IntegerType::class)
            ->add('featured', IntegerType::class)
            ->add('featured', HiddenType::class)
            ->add('active', IntegerType::class)
            ->add('active', HiddenType::class)
            ->add('date_posted', DateTimeType::class, [
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd HH:mm:ss'
            ])
            ->add('date_expired', DateTimeType::class, [
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd HH:mm:ss'
                ])
            ->add('views', IntegerType::class, [
                'disabled' => !$options['is_edit']
            ])
            ->add('new_record', IntegerType::class, [
                'disabled' => !$options['is_edit']
            ])
            ->add('new_record', HiddenType::class, [
                'disabled' => !$options['is_edit']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Jobs',
            'is_edit' => false,
            'csrf_protection' => false
        ));
    }

    public function getName()
    {
        return "jobs";
    }
}