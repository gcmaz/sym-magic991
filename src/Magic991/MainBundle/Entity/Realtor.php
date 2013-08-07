<?php

namespace Magic991\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Magic991\MainBundle\Entity\Realtor
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Magic991\MainBundle\Entity\Repository\RealtorRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Realtor
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @var string $address
     * 
     * @ORM\Column(name="address", type="string")
     */
    private $address;
    
    /**
     * @var string $description
     *
     * @ORM\Column(name="description", type="text", nullable=false)
     */
    private $description;

    /**
     * @var Media $picture
     *
     * @ORM\OneToOne(targetEntity="Magic991\MainBundle\Entity\Realtor")
     */
    private $picture;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $listDate;
    
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $creationDate;

    /**
     * @var boolean $active
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Realtor
     */
    public function setAddress($address)
    {
        $this->address = $address;
    
        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Realtor
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set listDate
     *
     * @param string $listDate
     * @return Realtor
     */
    public function setListDate($listDate)
    {
        $this->listDate = $listDate;
    
        return $this;
    }

    /**
     * Get listDate
     *
     * @return string 
     */
    public function getListDate()
    {
        return $this->listDate;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     * @return Realtor
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
    
        return $this;
    }

    /**
     * Get creationDate
     *
     * @return \DateTime 
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return Realtor
     */
    public function setActive($active)
    {
        $this->active = $active;
    
        return $this;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set picture
     *
     * @param \Magic991\MainBundle\Entity\Realtor $picture
     * @return Realtor
     */
    public function setPicture(\Magic991\MainBundle\Entity\Realtor $picture = null)
    {
        $this->picture = $picture;
    
        return $this;
    }

    /**
     * Get picture
     *
     * @return \Magic991\MainBundle\Entity\Realtor $picture
     */
    public function getPicture()
    {
        return $this->picture;
    }

    public function __toString()
    {
        return ($this->getAddress() === null) ? 'Dream Homes' : (string) $this->getAddress();
    }
}