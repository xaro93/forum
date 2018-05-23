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
use Symfony\Component\HttpFoundation\Request;

class BaseController extends AbstractController
{

    public $object = null;
    public $formPath = __NAMESPACE__;
    private $user = null;

    public function getRepository($repository)
    {
        return $this->getDoctrine()
            ->getManager()
            ->getRepository($repository);
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        if (!$this->user instanceof User) {
            //  $this->setUser($this->get('security.token_storage')->getToken()->getUser());
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

    /**
     * @return string
     */
    public function getFormPath()
    {
        return str_replace('Controller', 'Form', $this->formPath) . '\\';
    }

    /**
     * @param Request $request
     * @param $entity
     * @param array $formOptions
     * @param null $route
     * @param array $routeOptions
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function newEntity(Request $request, $entity, $formOptions = [], $route = null, $routeOptions = [])
    {

        $form = $this->createForm($this->getFormPath() . $this->object . 'Type', $entity);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->persist($entity);
            $this->em->flush();

            if (is_null($route)) {
                return $this->redirect($request->server->get('HTTP_REFERER'));
            }

            return $this->redirectToRoute($route, $routeOptions);
        }

        return [
            'entity' => $entity,
            'form' => $form->createView(),
        ];
    }

}