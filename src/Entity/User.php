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
     * @ORM\OneToOne(targetEntity="App\Entity\UserAddress", inversedBy="user", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $userAddress;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\UserInfos", inversedBy="user", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $userInfos;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comments", mappedBy="userId")
     */
    private $comments;


    public function __construct()
    {
        $this->roles = array('ROLE_USER');
        $this->comments = new ArrayCollection();
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

        /**
     * Set userInfos
     *
     * @param \App\Entity\UserInfos $userInfos
     * @return User
     */
    public function setUserInfos(\App\Entity\UserInfos $userInfos)
    {
        $this->userInfos = $userInfos;

        return $this;
    }

    /**
     * Get userInfos
     *
     * @return \App\Entity\UserInfos
     */
    public function getUserInfos()
    {
        return $this->userInfos;
    }

    /**
     * @return Collection|Comments[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comments $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setUser($this);
        }

        return $this;
    }

    public function removeComment(Comments $comment): self
    {
        if ($this->comments->contains($comment)) {
            $this->comments->removeElement($comment);
            // set the owning side to null (unless already changed)
            if ($comment->getUser() === $this) {
                $comment->setUser(null);
            }
        }

        return $this;
    }
}
