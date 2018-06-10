<?php

namespace App\Entity;


use App\Entity\Traits\Base;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NotificationRepository")
 * @ORM\Table(name="notification")
 */
class Notification
{
    use Base;

    /**
     * Many Notifications have One NotificationType.
     *
     * @ORM\ManyToOne(targetEntity="NotificationType")
     */
    private $type;


}