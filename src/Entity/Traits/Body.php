<?php

namespace App\Entity\Traits;


use Symfony\Component\Validator\Constraints as Assert;

trait Body
{

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     * @Assert\Length(
     *     min="3",
     *     max="10000"
     * )
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