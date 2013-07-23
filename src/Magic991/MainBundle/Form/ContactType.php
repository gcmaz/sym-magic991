<?php

namespace Magic991\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name');
        $builder->add('feedme', 'text', array('required' => false));
        $builder->add('email', 'email');
        $builder->add('department', 'choice', array(
            'choices' => array(
                'Programming' => 'Programming',
                'PSA' => 'Public Service Announcement',
                'Community Event' => 'Community Event',
                'Contests' => 'Contests',
                'Sales' => 'Sales',
                'Website' => 'Website'
            ),
            'required' => false,
            'empty_value' => 'Choose a Department',
            'empty_data' => null
        ));
        $builder->add('comments', 'textarea');
    }

    public function getName()
    {
        return 'contact';
    }
}

?>