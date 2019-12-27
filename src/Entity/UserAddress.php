<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM; 
use JMS\Serializer\Annotation as Serializer;
/**
 * UserAddress
 * @Serializer\ExclusionPolicy("ALL")
 * @ORM\Table(name="users_address")
 * @ORM\Entity(repositoryClass="App\Repository\UserAddressRepository")
 */
class UserAddress
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
     * @Serializer\Expose
     * @ORM\Column(name="firstname", type="string", length=255, nullable=true)
     */
    private $firstname;

    /**
     * @var string
     * @Serializer\Expose
     * @ORM\Column(name="lastname", type="string", length=255, nullable=true)
     */
    private $lastname;

    /**
     * @var string
     * @Serializer\Expose
     * @ORM\Column(name="street", type="string", length=255, nullable=true)
     */
    private $street;

    /**
     * @var string
     * @Serializer\Expose
     * @ORM\Column(name="cp", type="string", length=255, nullable=true)
     */
    private $cp;

    /**
     * @var string
     * @Serializer\Expose
     * @ORM\Column(name="city", type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * @ORM\ManyToOne(targetEntity="Entity\Country")
     * @Serializer\Expose
     * @ORM\JoinColumn(nullable=true)
     */
    private $country;

    /**
     * @ORM\ManyToOne(targetEntity="Entity\Regions")
     * @ORM\JoinColumn(nullable=true)
     */
    private $region;

    /**
     * @var string
     *
     * @ORM\Column(name="departement_id", type="string", length=255, nullable=true)
     */
    private $departement;

    /**
     * @ORM\OneToOne(targetEntity="Entity\User", mappedBy="userAddress", cascade={"persist"})
     */
    private $user;


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
     * Set firstname
     *
     * @param string $firstname
     * @return UserAddress
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return UserAddress
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set street
     *
     * @param string $street
     * @return UserAddress
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street
     *
     * @return string 
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set cp
     *
     * @param string $cp
     * @return UserAddress
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get cp
     *
     * @return string 
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return UserAddress
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set country
     *
     * @param \Entity\Country $country
     * @return UserAddress
     */
    public function setCountry( $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \Entity\Country 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set region
     *
     * @param \Entity\Regions $region
     * @return UserAddress
     */
    public function setRegion( $region = null)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get region
     *
     * @return \Entity\Regions 
     */
    public function getRegion()
    {
        return $this->region;
    }


    /**
     * Set user
     *
     * @param App\Entity\Users $user
     * @return UserAddress
     */
    public function setUser( $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Entity\Users 
     */
    public function getUser()
    {
        return $this->user;
    }


    /**
     * Set departement
     *
     * @param string $departement
     * @return UserAddress
     */
    public function setDepartement($departement)
    {
        $this->departement = $departement;

        return $this;
    }

    /**
     * Get departement
     *
     * @return string 
     */
    public function getDepartement()
    {
        return $this->departement;
    }

}
