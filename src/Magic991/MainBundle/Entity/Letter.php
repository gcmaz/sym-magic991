<?php

namespace Magic991\MainBundle\Entity;

use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\MinLength;

class Letter
{
    protected $name;

    protected $email;
    
    protected $phone;

    protected $recipient;
        
    protected $loveletter;        

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

    public function getRecipient()
    {
        return $this->recipient;
    }

    public function setRecipient($recipient)
    {
        $this->recipient = $recipient;
    }
    
    public function getLoveletter()
    {
        return $this->loveletter;
    }

    public function setLoveletter($loveletter)
    {
        $this->loveletter = $loveletter;
    }
    
    
    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('name', new NotBlank());

        $metadata->addPropertyConstraint('email', new Email());

        $metadata->addPropertyConstraint('phone', new NotBlank());
        
        $metadata->addPropertyConstraint('recipient', new NotBlank());
        
        $metadata->addPropertyConstraint('loveletter', new NotBlank());
    }
    
}