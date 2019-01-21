<?php

namespace App\Entity;


use App\Entity\Traits\Base;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model\SoftDeletable\SoftDeletable;
use Knp\DoctrineBehaviors\Model\Timestampable\Timestampable;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NotificationTypeRepository")
 * @ORM\Table(name="notification_type")
 */
class NotificationType
{
    const THREAD_NEW = 'thread_new';
    const THREAD_EDIT = 'thread_edit';
    const THREAD_DELETE = 'thread_delete';

    use Base,
        Timestampable,
        SoftDeletable;


}