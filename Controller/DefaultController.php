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
     * @Route("/apoyos")
     */
    public function indexAction() {

        $firmas = $this->getDoctrine()->getEntityManager()
                        ->getRepository('GanemosMadridFirmasApoyoBundle:Firma')->findAll();

        return $this->render('GanemosMadridFirmasApoyoBundle:Default:index.html.twig', array(
                    'firmas' => $firmas,
        ));
    }

    /**
     * @Route("/apoyos/firmar")
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

            return $this->redirect($this->generateUrl('ok'));
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
