<?php

namespace App\Entity\Traits;


trait Slug
{

    /**
     * @var string
     *
     * @ORM\Column(type="string", unique=true)
     */
    private $slug;

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     */
    public function setSlug(string $slug): void
    {
        $this->slug = $slug;
    }
}