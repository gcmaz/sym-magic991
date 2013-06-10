<?php

namespace Magic991\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class SongRequestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name');
        $builder->add('email', 'email');
        $builder->add('city', 'text', array('required' => false));
        $builder->add('songrequest', 'textarea');
    }

    public function getName()
    {
        return 'songrequests';
    }
}

?>