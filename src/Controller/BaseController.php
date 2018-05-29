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
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class BaseController extends AbstractController
{

    public $object = null;
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
              $this->setUser($this->get('security.token_storage')->getToken()->getUser());
        }

        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getFormPath()
    {
        $namespace = (new \ReflectionClass($this))->getNamespaceName();

        return str_replace('Controller', 'Form', $namespace) . '\\';
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

        $entityName = (new \ReflectionClass($entity))->getShortName();

        $form = $this->createForm($this->getFormPath() . $entityName . 'Type', $entity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

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

    /**
     * @param Request $request
     * @param $entity
     * @param array $formOptions
     * @param null $route
     * @param array $routeOptions
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function editEntity(Request $request, $entity, $formOptions = [], $route = null, $routeOptions = [])
    {

        $entityName = (new \ReflectionClass($entity))->getShortName();

        $form = $this->createForm($this->getFormPath() . $entityName . 'Type', $entity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->flush();

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

    public function view(string $view, $parameters = [], Response $response = null): Response
    {
        if ($parameters instanceof RedirectResponse){
            return $parameters;
        }

        return $this->render($view, $parameters, $response);
    }

}