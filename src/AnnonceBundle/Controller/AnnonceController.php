<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 22/03/2018
 * Time: 13:29
 */

namespace AnnonceBundle\Controller;


use AnnonceBundle\Entity\Annonce;
use AnnonceBundle\Form\RechercheAnnonceType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AnnonceController extends Controller
{
    public function AjouterAnnonceAction(Request $request)
    {
        $annonce = new Annonce();
        $form = $this->createForm('AnnonceBundle\Form\AnnonceType', $annonce);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $annonce->setDateCreation(new \DateTime('now'));
            if ($annonce->getDateCreation() < $annonce->getDateExpiration()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($annonce);
                $em->flush();
            }
            else{
                return $this->render('AnnonceBundle:AnnonceViews:erreur.html.twig');
            }
        }
        return $this->render('AnnonceBundle:AnnonceViews:AjouterAnnonce.html.twig', array(
            'Form' => $form->createView()
        ));
    }




    public function AfficherAnnonceAction()
    {
        $em = $this->getDoctrine()->getManager();
        $annonce = $em->getRepository("AnnonceBundle:Annonce")->findAll();
        return $this->render('AnnonceBundle:AnnonceViews:AfficherAnnonce.html.twig', array("a" => $annonce
        ));
    }

    public function SupprimerAnnonceAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $annonce = $em->getRepository("AnnonceBundle:Annonce")->find($id);

        $em->remove($annonce);
        $em->flush();
        return $this->render('AnnonceBundle:AnnonceViews:SupprimerAnnonce.html.twig', array());
    }

    public function ModifierAnnonceAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();
        $annonce = $em->getRepository("AnnonceBundle:Annonce")->find($id);
        $form = $this->createForm('AnnonceBundle\Form\AnnonceType', $annonce);
        $form->handleRequest($request);
        $em->persist($annonce);
        $em->flush();


        return $this->render('AnnonceBundle:AnnonceViews:ModifierAnnonce.html.twig', array(
            'Form' => $form->createView()
        ));
        return $this->render('AnnonceBundle:AnnonceViews:AfficherAnnonce.html.twig', array("a" => $annonce));
    }

    public function chercherAction(Request $request){
        $em=$this->getDoctrine()->getManager();
        $annonce = new Annonce();
        $form=$this->createForm(RechercheAnnonceType::class,$annonce);
        $form->handleRequest($request);
        $annonce = $em->getRepository(("AnnonceBundle:Annonce"))
            ->findBy(array("domaine"=>$annonce->getDomaine()));
        return $this->render('AnnonceBundle:AnnonceViews:RechercherAnnonce.html.twig', array('Form' => $form->createView(),"a" => $annonce
        ));
    }
}