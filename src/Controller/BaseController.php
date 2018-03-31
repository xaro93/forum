<?php
/**
 * Created by PhpStorm.
 * User: Xaro
 * Date: 31.03.2018
 * Time: 11:09
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BaseController extends Controller
{

    public function getRepository($repository)
    {
        return $this->getDoctrine()
            ->getManager()
            ->getRepository($repository);
    }

}