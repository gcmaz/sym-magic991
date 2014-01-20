<?php

namespace Magic991\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Magic991\MainBundle\Entity\Healthtips;

class HealthtipsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('text', 'ckeditor', array(
            'config_name' => 'healthtips_config',
            'data' => $options['data']
        ));
    }

    public function getName()
    {
        return 'healthtips';
    }
}

?>