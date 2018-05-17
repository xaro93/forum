<?php
/**
 * Created by PhpStorm.
 * User: Xaro
 * Date: 31.03.2018
 * Time: 11:12
 */

namespace App\Controller\Admin;


use App\Controller\BaseController;

use App\Entity\Post;
use App\Entity\Thread;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * Index controller.
 *
 * @Route("/")
 */
class IndexController extends BaseController
{

    /**
     * @Route("/", name="admin_index")
     * @Method({"GET"})
     */
    public function index(): Response
    {
        $return = [
        ];
        return $this->render('admin/index/index.html.twig', $return);
    }

}