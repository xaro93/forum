<?php
/**
 * Created by PhpStorm.
 * User: Xaro
 * Date: 31.03.2018
 * Time: 11:12
 */

namespace App\Controller\Forum;


use App\Controller\BaseController;

use App\Entity\Thread;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Thread controller.
 *
 * @Route("/thread")
 */
class ThreadController extends BaseController
{

    /**
     * @Route("/{slug}", name="forum_thread_show")
     * @Method({"GET"})
     */
    public function show(Thread $thread): Response
    {
        $return = [
            'thread' => $thread,
        ];
        return $this->render('forum/thread/show.html.twig', $return);
    }

}