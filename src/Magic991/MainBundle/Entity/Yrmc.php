<?php
namespace Magic991\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass="Magic991\MainBundle\Entity\Repository\YrmcRepository")
 * @ORM\Table(name="yrmc")
 * @ORM\HasLifecycleCallbacks()
 */
class Yrmc
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
    protected $yrmctext;
    
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
     * Set yrmctext
     *
     * @param string $yrmctext
     * @return Yrmc
     */
    public function setYrmctext($yrmctext)
    {
        $this->yrmctext = $yrmctext;

        return $this;
    }

    /**
     * Get yrmctext
     *
     * @return string 
     */
    public function getYrmctext()
    {
        return $this->yrmctext;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Yrmc
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
        return strval($this->yrmctext);
    }

    public function __construct()
    {
        $this->setCreated(new \DateTime());
    }
    
}
