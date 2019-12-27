<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Country
 * @ORM\Table(name="country")
 * @ORM\Entity(repositoryClass="App\Repository\CountryRepository")
 */
class Country
{
    /**
     * @var integer
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=255, nullable=true)
     */
    private $code;


    /**
     * @var string
     *
     * @ORM\Column(name="nameCode", type="string", length=255, nullable=true)
     */
    private $nameCode;


    /**
     * @var string
     *
     * @ORM\Column(name="symbol", type="string", length=2, nullable=true)
     */
    private $symbol;


    function __toString()
    {
        return $this->name;
    }


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
     * set id
     *
     * @return integer
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Country
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
     * Set code
     *
     * @param string $code
     * @return Country
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }
    /**
     * Set nameCode
     *
     * @param string $nameCode
     * @return Country
     */
    public function setNameCode($nameCode)
    {
        $this->nameCode = $nameCode;

        return $this;
    }

    /**
     * Get nameCode
     *
     * @return string
     */
    public function getNameCode()
    {
        return $this->nameCode;
    }
    /**
     * Set symbol
     *
     * @param string $symbol
     * @return Country
     */
    public function setSymbol($symbol)
    {
        $this->symbol = $symbol;

        return $this;
    }

    /**
     * Get symbol
     *
     * @return string
     */
    public function getSymbol()
    {
        return $this->symbol;
    }
}
