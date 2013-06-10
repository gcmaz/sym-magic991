<?php

namespace Magic991\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Magic991\MainBundle\Entity\Yrmc;

class YrmcType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('yrmctext', 'ckeditor', array(
            'config_name' => 'yrmc_config',
            'data' => $options['data']
        ));
    }

    public function getName()
    {
        return 'health';
    }
}

?>