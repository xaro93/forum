<?php
/**
 * Created by PhpStorm.
 * User: Xaro
 * Date: 28.03.2018
 * Time: 22:55
 */

namespace App\Entity\Traits;


trait Base
{

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

}