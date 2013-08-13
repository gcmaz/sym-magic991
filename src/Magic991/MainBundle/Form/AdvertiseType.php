<?php
namespace Magic991\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class AdvertiseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name');
        $builder->add('feedme', 'text', array('required' => false));
        $builder->add('email', 'email');
        $builder->add('phone');
        $builder->add('comments', 'textarea', array('required' => false));
        $builder->add('captcha', 'captcha', array(
            'background_color' => array(9,15,31),
            'reload' => true,
            'max_front_lines' => 1,
            'max_behind_lines' => 1,
        ));
    }

    public function getName()
    {
        return 'advcontact';
    }
}

?>