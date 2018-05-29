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
use App\Form\Forum\ThreadType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Thread controller.
 *
 * @Route("/thread")
 */
class ThreadController extends ForumController
{

    /**
     * @Route("/{slug}/show", name="forum_thread_show")
     * @Method({"GET"})
     */
    public function show(Request $request, Thread $thread): Response
    {
        $return = [
            'thread' => $thread
        ];

        return $this->view('forum/thread/show.html.twig', $return);
    }

    /**
     * Creates a new Thread entity.
     *
     * @Route("/new", name="forum_thread_new")
     * @Method({"GET", "POST"})
     *
     */
    public function new(Request $request): Response
    {
        $thread = new Thread();
        $thread->setUser($this->getUser());

        $return = $this->newEntity($request, $thread);

        return $this->view('forum/thread/new.html.twig', $return);
    }

    /**
     * Edit Thread entity.
     *
     * @Route("/{slug}/edit", name="forum_thread_edit")
     * @Method({"GET", "POST"})
     *
     */
    public function edit(Request $request, Thread $thread): Response
    {
        $return = $this->editEntity($request, $thread);

        return $this->view('forum/thread/new.html.twig', $return);
    }
}
