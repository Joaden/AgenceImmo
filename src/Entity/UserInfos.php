<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass="App\Repository\UserInfosRepository")
 */
class UserInfos
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateInscription;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $ip;

    /**
     * @ORM\Column(type="datetime")
     */
    private $connexionTime;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $isValid;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $birth;

     /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", mappedBy="userInfos", cascade={"persist"})
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateInscription(): ?\DateTimeInterface
    {
        return $this->dateInscription;
    }

    public function setDateInscription(\DateTimeInterface $dateInscription): self
    {
        $this->dateInscription = $dateInscription;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getIp(): ?string
    {
        return $this->ip;
    }

    public function setIp(?string $ip): self
    {
        $this->ip = $ip;

        return $this;
    }

    public function getConnexionTime(): ?\DateTimeInterface
    {
        return $this->connexionTime;
    }

    public function setConnexionTime(\DateTimeInterface $connexionTime): self
    {
        $this->connexionTime = $connexionTime;

        return $this;
    }

    public function getIsValid(): ?int
    {
        return $this->isValid;
    }

    public function setIsValid(?int $isValid): self
    {
        $this->isValid = $isValid;

        return $this;
    }

    public function getBirth(): ?\DateTimeInterface
    {
        return $this->birth;
    }

    public function setBirth(?\DateTimeInterface $birth): self
    {
        $this->birth = $birth;

        return $this;
    }

        /**
     * Set user
     *
     * @param \App\Entity\User $user
     * @return UserInfos
     */
    public function setUser(\App\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \App\Entity\Users
     */
    public function getUser()
    {
        return $this->user;
    }
}
