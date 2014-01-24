<?php

namespace Magic991\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class LetterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name');
        $builder->add('email', 'email');
        $builder->add('phone');
        $builder->add('recipient');
        $builder->add('loveletter', 'textarea');
    }

    public function getName()
    {
        return 'lettername';
    }
}

?>