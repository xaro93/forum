<?php
/**
 * Created by PhpStorm.
 * User: Xaro
 * Date: 31.03.2018
 * Time: 11:12
 */

namespace App\Controller\Forum;


use App\Controller\BaseController;

use App\Entity\User;
use App\Form\Forum\RegisterType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * Account controller.
 *
 * @Route("/account")
 */
class AccountController extends BaseController
{

    /**
     *
     * @Route("/login", name="forum_account_login")
     * @Method({"GET", "POST"})
     */
    public function login(AuthenticationUtils $helper): Response
    {
        return $this->render('forum/account/login.html.twig', [
            // last username entered by the user (if any)
            'last_username' => $helper->getLastUsername(),
            // last authentication error (if any)
            'error' => $helper->getLastAuthenticationError(),
        ]);
    }

    /**
     * @Route("/register", name="forum_account_register")
     * @Method({"GET", "POST"})
     */
    public function register(Request $request): Response
    {
        $user = new User();
        $user->setRoles([User::ROLE_USER]);

        $form = $this->createForm(RegisterType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
                $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('forum_account_login');
        }

        return $this->view('forum/account/register.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/logout", name="forum_account_logout")
     */
    public function logout(): void
    {
        throw new \Exception('This should never be reached!');
    }

}