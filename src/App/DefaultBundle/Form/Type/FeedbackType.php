<?php
namespace App\DefaultBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class FeedbackType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name');
        $builder->add('contact', 'email');
        $builder->add('content', 'textarea', [
            'attr' => [
                'cols' => 30,
                'rows' => 10,
            ]
        ]);
    }

    public function getName()
    {
        return 'feedback';
    }
}
