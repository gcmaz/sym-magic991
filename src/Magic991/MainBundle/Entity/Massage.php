<?php

namespace Magic991\MainBundle\Entity;

use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\MinLength;

class Massage
{
    protected $name;

    protected $email;
    
    protected $phone;

    protected $workplace;

    protected $workplaceaddy;
    
    protected $workplacetotal;
        
    protected $whywin;        

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function getWorkplace()
    {
        return $this->workplace;
    }
    
    public function setWorkplace($workplace)
    {
        $this->workplace = $workplace;
    }
    
    public function getWorkplaceaddy()
    {
        return $this->workplaceaddy;
    }
    
    public function setWorkplaceaddy($workplaceaddy)
    {
        $this->workplaceaddy = $workplaceaddy;
    }
    
    public function getWorkplacetotal()
    {
        return $this->workplacetotal;
    }
    
    public function setWorkplacetotal($workplacetotal)
    {
        $this->workplacetotal = $workplacetotal;
    }
    
    public function getWhywin()
    {
        return $this->whywin;
    }
    
    public function setWhywin($whywin)
    {
        $this->whywin = $whywin;
    }
    
    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('name', new NotBlank());

        $metadata->addPropertyConstraint('email', new Email());

        $metadata->addPropertyConstraint('phone', new NotBlank());
        
        $metadata->addPropertyConstraint('workplace', new NotBlank());
        
        $metadata->addPropertyConstraint('workplaceaddy', new NotBlank());
        
        $metadata->addPropertyConstraint('workplacetotal', new NotBlank());
        
        $metadata->addPropertyConstraint('whywin', new NotBlank());
    }
    
}