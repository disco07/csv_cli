<?php

namespace App\Entity;

class ReadCSV
{
    /**
     * @var int|null
     */
    private $sku;

    /**
     * @var string|null
     */
    private $title;

    /**
     * @var bool|null
     */
    private $is_enabled;

    /**
     * @var float|null
     */
    private $price;

    /**
     * @var string|null
     */
    private $currency;

    /**
     * @var string|null
     */
    private $description;

    /**
     * @var \DateTime|null
     */
    private $created_at;

    /**
     * @var string|null
     */
    private $slug;

    /**
     * @return int|null
     */
    public function getSku(): ?int
    {
        return $this->sku;
    }

    /**
     * @param int|null $sku
     */
    public function setSku(?int $sku): void
    {
        $this->sku = $sku;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     */
    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return bool|null
     */
    public function getIsEnabled(): ?bool
    {
        return $this->is_enabled;
    }

    /**
     * @param bool|null $is_enabled
     */
    public function setIsEnabled(?bool $is_enabled): void
    {
        $this->is_enabled = $is_enabled;
    }

    /**
     * @return float|null
     */
    public function getPrice(): ?float
    {
        return $this->price;
    }

    /**
     * @param float|null $price
     */
    public function setPrice(?float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return string|null
     */
    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    /**
     * @param string|null $currency
     */
    public function setCurrency(?string $currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->created_at;
    }

    /**
     * @param \DateTime|null $created_at
     */
    public function setCreatedAt(?\DateTime $created_at): void
    {
        $this->created_at = $created_at;
    }

    /**
     * @return string|null
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }

    /**
     * @param string|null $slug
     */
    public function setSlug(?string $slug): void
    {
        $this->slug = $slug;
    }
}