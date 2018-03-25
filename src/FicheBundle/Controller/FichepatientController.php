<?php
/**
 * Created by PhpStorm.
 * User: Ellouze Skander
 * Date: 22/03/2018
 * Time: 11:47
 */

namespace FicheBundle\Controller;


use FicheBundle\Entity\Fichepatient;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class FichepatientController extends Controller
{
    public function insertAction(Request $request)
    {
        $fiche = new Fichepatient();
        $form = $this->createForm('FicheBundle\Form\FichepatientType', $fiche);
        $form->handleRequest($request);
        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $fiche->setSuivie(strip_tags($fiche->getSuiviehtml()));
            $em->persist($fiche);
            $em->flush();

        }

        return $this->render('FicheBundle:FicheView:insert.html.twig', array(
            'form' => $form->createView()));
    }

    public function indexAction()
    {
        $EM = $this->getDoctrine()->getManager();
        $fiches = $EM->getRepository(("FicheBundle:Fichepatient"))->findAll();
        return $this->render('FicheBundle:FicheView:index.html.twig', array(
            'fiches' => $fiches
        ));
    }
}