<?php

namespace GanemosMadridFirmasApoyoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use GanemosMadridFirmasApoyoBundle\Entity\Firma;
use GanemosMadridFirmasApoyoBundle\Form\FirmaType;

class DefaultController extends Controller {

    /**
     * @Route("/apoyos", name="apoyos")
     */
    public function indexAction() {

        $firmas = $this->getDoctrine()->getManager()
                        ->getRepository('GanemosMadridFirmasApoyoBundle:Firma')->findAll(array(), array('id' => 'ASC'));

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
                $firmas, $this->get('request')->query->get('page', 1), 20
        );

        return $this->render('GanemosMadridFirmasApoyoBundle:Default:index.html.twig', array('pagination' => $pagination));
    }

    /**
     * @Route("/", name="firmar")
     */
    public function firmarAction(Request $request) {
        $firma = new Firma();

        $form = $this->createForm(new FirmaType(), $firma);

        $form->handleRequest($request);

        if ($form->isValid()) {

            $firma->setProvincia($request->request->get('provincia'));
            $firma->setCiudad($request->request->get('ciudad'));

            $em = $this->getDoctrine()->getManager();
            $em->persist($firma);
            $em->flush();

            return $this->redirect($this->generateUrl('ok', $request->query->all()));
        }

        return $this->render('GanemosMadridFirmasApoyoBundle:Default:firmar.html.twig', array(
                    'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/apoyos/firmar_ok", name="ok")
     */
    public function firmarOkAction() {
        return $this->render('GanemosMadridFirmasApoyoBundle:Default:firmar_ok.html.twig');
    }

}
