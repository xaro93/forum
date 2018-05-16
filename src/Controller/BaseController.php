<?php
/**
 * Created by PhpStorm.
 * User: Xaro
 * Date: 31.03.2018
 * Time: 11:09
 */

namespace App\Controller;


use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BaseController extends AbstractController
{

    private $user;

    public function getRepository($repository)
    {
        return $this->getDoctrine()
            ->getManager()
            ->getRepository($repository);
    }

    /**php app/console router:debug
     * @return User
     */
    public function getUser(): User
    {
        if (!$this->user instanceof User) {
            $this->setUser($this->get('security.token_storage')->getToken()->getUser());
        }

        return $this->user;
    }

    /**
     * @param User $user
     * @return $this
     */
    public function setUser(User $user)
    {
        $this->user = $user;

        return $this;
    }

}