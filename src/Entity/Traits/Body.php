<?php

namespace App\Entity\Traits;


trait Body
{

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     */
    private $body = '';


    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @param string $body
     */
    public function setBody(string $body): void
    {
        $this->body = $body;
    }
}