<?php

namespace Argidomin\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Request;

/**
 * Class BackendController
 * @package Argidomin\AppBundle\Controller
 * @Route("backend")
 */
class BackendController extends Controller
{
    /**
     * @Route("/", name="indexBackend")
     * @Template()
     */
    public function indexAction()
    {
        return ['locomia'=>'Locomia'];
    }

    /**
     * @Route("/new/{entidad}/", name="addBackend")
     * @Template()
     */
    public function newAction(Request $request, $entidad)
    {
        $add = $this->get($entidad)->newEntity();
        $formulario = $this->createForm($this->get($entidad),$add );

        $formulario->handleRequest($request);

        if ($formulario->isSubmitted() && $formulario->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($add);

            $em->flush();

            return $this->redirect($this->generateUrl('listBackend',['entidad' => $entidad]));
        }

        return $this->render('AppBundle:Backend:'. ucfirst($entidad).'/new.html.twig',
            ['formulario' => $formulario->createView()]);
    }

    /**
     * @Route("/list/{entidad}/", name="listBackend")
     * @Template()
     */
    public function listAction($entidad)
    {
        $list = $this->get($entidad)->getAll();

        return $this->render('AppBundle:Backend:'. ucfirst($entidad).'/list.html.twig',
            ['list' => $list,
            'entidad' =>$entidad]);
    }

    /**
     * @Route("/edit/{entidad}/{objeto}/", name="editBackend")
     * @Template()
     */
    public function editAction(Request $request, $entidad ,$objeto)
    {
        $edit = $this->get($entidad)->getOne($objeto);
        $formulario = $this->createForm($this->get($entidad), $edit);

        $formulario->handleRequest($request);

        if ($formulario->isSubmitted() && $formulario->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($edit);

            $em->flush();

            return $this->redirect($this->generateUrl('listBackend',['entidad' => $entidad]));
        }


        return $this->render('AppBundle:Backend:'. ucfirst($entidad).'/edit.html.twig',
                            ['formulario' => $formulario->createView()]);
    }

}
