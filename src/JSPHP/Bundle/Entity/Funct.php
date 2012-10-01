<?php

namespace JSPHP\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * JSPHP\Bundle\Entity\Funct
 */
class Funct
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $name
     */
    private $name;

    /**
     * @var varchar $package
     */
    private $package;

    /**
     * @var string $description
     */
    private $description;


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
     * Set name
     *
     * @param string $name
     * @return Funct
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set package
     *
     * @param varchar $package
     * @return Funct
     */
    public function setPackage(\varchar $package)
    {
        $this->package = $package;
    
        return $this;
    }

    /**
     * Get package
     *
     * @return varchar 
     */
    public function getPackage()
    {
        return $this->package;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Funct
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
     * @var string $limitations
     */
    private $limitations;


    /**
     * Set limitations
     *
     * @param string $limitations
     * @return Funct
     */
    public function setLimitations($limitations)
    {
        $this->limitations = $limitations;
    
        return $this;
    }

    /**
     * Get limitations
     *
     * @return string 
     */
    public function getLimitations()
    {
        return $this->limitations;
    }

    /**
     * @ORM\PrePersist
     */
    public function setCreatedAtValue()
    {
        $this->created_at = new \DateTime();
    }

    /**
     * @var \DateTime $created_at
     */
    private $created_at;

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Funct
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
    
        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }
    /**
     * @var string $demo
     */
    private $demo;


    /**
     * Set demo
     *
     * @param string $demo
     * @return Funct
     */
    public function setDemo($demo)
    {
        $this->demo = $demo;
    
        return $this;
    }

    /**
     * Get demo
     *
     * @return string 
     */
    public function getDemo()
    {
        return $this->demo;
    }
}