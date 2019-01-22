<?php

namespace App\Entity;


use App\Entity\Traits\Base;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model\SoftDeletable\SoftDeletable;
use Knp\DoctrineBehaviors\Model\Timestampable\Timestampable;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NotificationRepository")
 * @ORM\Table(name="notification")
 */
class Notification
{
    use Base,
        Timestampable,
        SoftDeletable;

    /**
     * Many Notifications have One NotificationType.
     *
     * @ORM\ManyToOne(targetEntity="NotificationType")
     */
    private $type;


}