<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 22/03/2018
 * Time: 13:29
 */

namespace AnnonceBundle\Controller;


use AnnonceBundle\Entity\Candidature;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;

class CandidatureController extends Controller
{
    public function AjouterCandidatureAction(Request $request)
    {
        $candidature = new Candidature();
        $form = $this->createForm('AnnonceBundle\Form\CandidatureType', $candidature);
        $form->handleRequest($request);
        if ($form->isValid()){
            /**
             *@var UploadedFile $file
             */
            $file=$candidature->getCv();
            if($file->guessExtension()=='pdf' || $file->guessExtension()=='PDF' )
            {
                $fileName=md5(uniqid()).'.'.$file->guessExtension();
                $file->move(
                    $this->getParameter('image_directory'),$fileName
                );
                $candidature->setCv($fileName);
                $em = $this->getDoctrine()->getManager();
                $candidature->setEtat("En attente");
                $em->persist($candidature);
                $em->flush();
            }
            else
            {
                return $this->render('AnnonceBundle:CandidatureViews:erreur.html.twig');
            }
        }
        return $this->render('AnnonceBundle:CandidatureViews:AjouterCandidature.html.twig', array(
            'Form' => $form->createView()
        ));
    }

//    public function AfficherCandidatureAction()
//    {
//        $em = $this->getDoctrine()->getManager();
//        $annonce = $em->getRepository("AnnonceBundle:Annonce")->findAll();
//        return $this->render('AnnonceBundle:AnnonceViews:AfficherAnnonce.html.twig', array("a" => $annonce
//        ));
//    }
//
//    public function SupprimerCandidatureAction($id)
//    {
//        $em = $this->getDoctrine()->getManager();
//        $annonce = $em->getRepository("AnnonceBundle:Annonce")->find($id);
//
//        $em->remove($annonce);
//        $em->flush();
//        return $this->render('AnnonceBundle:AnnonceViews:SupprimerAnnonce.html.twig', array());
//    }


}