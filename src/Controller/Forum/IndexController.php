<?php

namespace App\Controller\Forum;

use App\Controller\BaseController;

use App\Repository\ThreadRepository;
use Symfony\Component\HttpFoundation\Request;
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
     * @Route("/", name="forum_index")
     * @Method({"GET"})
     */
    public function index(Request $request, ThreadRepository $threads): Response
    {
        $return = [
            'threads' => $threads->findLatest(),
        ];
        return $this->view('forum/index/index.html.twig', $return);
    }

}