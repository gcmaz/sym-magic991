<?php
namespace Magic991\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass="Magic991\MainBundle\Entity\Repository\HealthtipsRepository")
 * @ORM\Table(name="healthtips")
 * @ORM\HasLifecycleCallbacks()
 */
class Healthtips
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="text")
     */
    protected $text;
    
    /**
     *
     * @ORM\Column(type="datetime")
     */
    protected $created;

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
     * Set text
     *
     * @param string $text
     * @return Healthtips
     */
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Healthtips
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }
    
    public function __toString()
    {
        return strval($this->text);
    }

    public function __construct()
    {
        $this->setCreated(new \DateTime());
    }
    
}