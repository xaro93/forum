<?php
/**
 * Created by PhpStorm.
 * User: Xaro
 * Date: 31.03.2018
 * Time: 11:12
 */

namespace App\Controller\Forum;


use App\Controller\BaseController;

use App\Entity\Post;
use App\Entity\Thread;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**composer require symfony/twig-bundle
 * Index controller.
 *
 * @Route("/")
 */
class IndexController extends BaseController
{

    /**
     * @Route("/", name="forum_index")
     * @Method({"GET"})
     */
    public function index(): Response
    {
        $return = [
            'threads' => $this->getRepository(Thread::class)->findAll(),
        ];
        return $this->render('forum/index/index.html.twig', $return);
    }

}