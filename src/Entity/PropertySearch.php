<?php
namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

class PropertySearch {

    /**
     * @var int|null
     */
    private $maxPrice;

    /**
     * @var int|null
     * @Assert\Range(min=9, max=800)
     */
    private $minSurface;

    /**
     * @var ArrayCollection
     */
    private $options;

    /**
     * @var ArrayCollection
     */
    private $optionsType;


    /**
     * @var ArrayCollection
     */
    private $type;

    public function __construct()
    {
        $this->options = new ArrayCollection();
        $this->optionsType = new ArrayCollection();
        $this->type = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getMaxPrice(): ?int
    {
        return $this->maxPrice;
    }

    /**
     * @param int|null $maxPrice
     * @return PropertySearch
     */
    public function setMaxPrice(int $maxPrice): PropertySearch
    {
        $this->maxPrice = $maxPrice;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getMinSurface(): ?int
    {
        return $this->minSurface;
    }

     /**
     * @param int|null $minSurface
     * @return PropertySearch
     */
    public function setMinSurface(int $minSurface): PropertySearch
    {
        $this->minSurface = $minSurface;
        return $this;
    }


    /**
     * Get the value of options
     *
     * @return  ArrayCollection
     */ 
    public function getOptions(): ArrayCollection
    {
        return $this->options;
    }

    /**
     * Set the value of options
     *
     * @param  ArrayCollection  $optionsType
     *
     * 
     */ 
    public function setOptions(ArrayCollection $options): void
    {
        $this->options = $options;
    }

    /**
     * Get the value of optionsType
     *
     * @return  ArrayCollection
     */
    public function getOptionsType(): ArrayCollection
    {
        return $this->optionsType;
    }

    /**
     * Set the value of optionsType
     *
     * @param  ArrayCollection  $optionsType
     *
     *
     */
    public function setOptionsType(ArrayCollection $optionsType): void
    {
        $this->optionsType = $optionsType;
    }

    /**
     * Get the value of type
     *
     * @return  ArrayCollection
     */
    public function getType(): ArrayCollection
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @param  ArrayCollection  $type
     *
     *
     */
    public function setType(ArrayCollection $type): void
    {
        $this->type = $type;
    }
}