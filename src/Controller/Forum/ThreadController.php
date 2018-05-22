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
use Symfony\Component\HttpFoundation\Request;
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
     * @Route("/{slug}/show", name="forum_thread_show")
     * @Method({"GET"})
     */
    public function show(Thread $thread): Response
    {
        $return = [
            'thread' => $thread,
        ];
        return $this->render('forum/thread/show.html.twig', $return);
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

        $form = $this->createForm(ThreadType::class, $thread);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($thread);
            $em->flush();

            $this->addFlash('success', 'post.created_successfully');

            return $this->redirectToRoute('forum_index');
        }

        return $this->render('forum/thread/new.html.twig', [
            'entity' => $thread,
            'form' => $form->createView(),
        ]);
    }

}