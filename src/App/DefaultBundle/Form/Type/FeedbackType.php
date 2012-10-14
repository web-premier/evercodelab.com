<?php
namespace App\DefaultBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class FeedbackType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name');
        $builder->add('contact');
        $builder->add('content', 'textarea');
    }

    public function getName()
    {
        return 'feedback';
    }
}