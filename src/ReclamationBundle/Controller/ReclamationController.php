<?php
/**
 * Created by PhpStorm.
 * User: anis
 * Date: 27/03/2018
 * Time: 13:04
 */

namespace ReclamationBundle\Controller;


use ReclamationBundle\Entity\Reclamation;
use ReclamationBundle\Form\RechercherecType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ReclamationController extends Controller
{
    public function insertAction(Request $request)
    {
        $rdv = new Reclamation();
        $form = $this->createForm('ReclamationBundle\Form\ReclamationType', $rdv);
        $form->handleRequest($request);
        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            /*$rdv->setDate((string)$form->getData(date));*/
//            $username = $form["date"]->getData();
            $rdv->setDate(new \DateTime('now'));


            $em->persist($rdv);
            $em->flush();
        }
        return $this->render('ReclamationBundle:reclamationviews:Ajout.html.twig', array(
            'Form' => $form->createView()

        ));
    }
    public function afficherAction()
    {
        $rec = $this->getDoctrine()->getManager();
        $recs = $rec->getRepository(("ReclamationBundle:Reclamation"))->findAll();
        return $this->render('ReclamationBundle:reclamationviews:afficher.html.twig', array(
            'reclamations' => $recs

        ));
    }
    public function chercherAction()
    {   $a=new Reclamation();
        $EM = $this->getDoctrine()->getManager();
        $amendes = $EM->getRepository(("ReclamationBundle:Reclamation"))->findPays();
        foreach ($amendes as $a){$a->setPenalite($a->getMontant()+$a->getMontant()*0.3);}

        return $this->render('AmendesBundle:amendeview:afficher.html.twig', array(
            'amende' => $amendes

        ));
    }

}