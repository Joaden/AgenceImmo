<?php

namespace App\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(fields= {"email"}, message= "l'email que vous avez indiqué est déjà utilisé!")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min="8", minMessage="Votre message doit faire minimum 8 caractères!")
     * 
     */
    private $password;

    /**
     * @Assert\EqualTo(propertyPath="password", message="Votre mot de passe n'est pas identique!")
     */
    public $confirm_password;

    /**
     * @ORM\Column(type="array")
     * 
     */
    private $roles;

    /**
     * @Serializer\Expose
     * @ORM\OneToOne(targetEntity="App\Entity\UserAddress", inversedBy="user", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $userAddress;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\InfosUser", mappedBy="User", cascade={"persist", "remove"})
     */
    private $infosUser;



    public function __construct()
    {
        $this->roles = array('ROLE_USER');
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }




    public function eraseCredentials() {}

    public function getSalt() {}

    public function getRoles() 
    {
        return $this->roles;
    }

    public function getInfosUser(): ?InfosUser
    {
        return $this->infosUser;
    }

    public function setInfosUser(?InfosUser $infosUser): self
    {
        $this->infosUser = $infosUser;

        // set (or unset) the owning side of the relation if necessary
        $newUser = $infosUser === null ? null : $this;
        if ($newUser !== $infosUser->getUser()) {
            $infosUser->setUser($newUser);
        }

        return $this;
    }

    
    /**
     * Set userAddress.
     *
     * @param App\Entity\UserAddress $userAddress
     *
     * @return Users
     */
    public function setUserAddress( $userAddress)
    {
        $this->userAddress = $userAddress;

        return $this;
    }

    /**
     * Get userAddress.
     *
     * @return App\Entity\UserAddress
     */
    public function getUserAddress()
    {
        return $this->userAddress;
    }
}
