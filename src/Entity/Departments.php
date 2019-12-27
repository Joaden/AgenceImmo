<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Departments
 *
 * @ORM\Table(name="departments")
 * @ORM\Entity(repositoryClass="App\Repository\DepartmentsRepository")
 */
class Departments
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="name_num", type="string", nullable=false)
     */
    private $nameNum;
    /**
     * @var integer
     *
     * @ORM\Column(name="region_id", type="integer", nullable=false)
     */
    private $region;

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
     * @return Departments
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
     * Set nameNum
     *
     * @param string $nameNum
     * @return Departments
     */
    public function setNameNum($nameNum)
    {
        $this->nameNum = $nameNum;

        return $this;
    }

    /**
     * Get nameNum
     *
     * @return string 
     */
    public function getNameNum()
    {
        return $this->nameNum;
    }

    /**
     * Set region
     *
     * @param integer $region
     * @return Departments
     */
    public function setRegion($region)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get region
     *
     * @return integer 
     */
    public function getRegion()
    {
        return $this->region;
    }
}
