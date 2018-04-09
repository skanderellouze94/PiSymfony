<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 22/03/2018
 * Time: 13:29
 */

namespace AnnonceBundle\Controller;


use AnnonceBundle\Entity\Candidature;
use EtablissementBundle\Entity\Etablissements;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;

class CandidatureController extends Controller
{
    public function AjouterCandidatureAction(Request $request,$id)
    {
        $candidature = new Candidature();
        $em = $this->getDoctrine()->getManager();

        $annonce = $em ->getRepository("AnnonceBundle:Annonce")->find($id);

        $etab = new Etablissements();


//        $etab = $em->getRepository(("EtablissementBundle:Etablissements"))
//            ->findOneBy(['user'=>$annonce->getIdPartenaire()]);

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

                $candidature->setEtat("En attente");
                $candidature->setIdAnnonce($annonce);
                $candidature->setDatePostulation(new \DateTime('now'));
                $candidature->setIdUtilisateur( $this->container->get('security.token_storage')->getToken()->getUser());
                $em->persist($candidature);
                $em->flush();
            }
            else
            {
                return $this->render('AnnonceBundle:CandidatureViews:erreur.html.twig');
            }
        }
        return $this->render('AnnonceBundle:CandidatureViews:AjouterCandidature.html.twig', array(
            'an'=>$annonce,
//            'e'=>$etab,
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

    public function AccepterCandidatureAction($id){

            $em = $this->getDoctrine()->getManager();
            $candidature=$em->getRepository("AnnonceBundle:Candidature")->find($id);
            $id1=$candidature->getIdAnnonce()->getId();
            $annonce = $em ->getRepository("AnnonceBundle:Annonce")->find($id1);
            $candidature->setEtat("Acceptée");
            $em->persist($candidature);
            //$em->remove($annonce);
            $em->flush();

//        return $this->render('AnnonceBundle:CandidatureViews:AfficherCandidature.html.twig', array('candidature'=>$candidature,
//        ));

        return $this->redirectToRoute('afficher_candidature', array('candidature'=>$candidature,
        ));
    }

    public function sendEmailAction(){

    }

    public function DeclinerCandidatureAction($id){

        $em = $this->getDoctrine()->getManager();
        $candidature=$em->getRepository("AnnonceBundle:Candidature")->find($id);
        $candidature->setEtat("Refusée");
        $em->persist($candidature);
        $em->flush();
        $annonce = $em->getRepository(("AnnonceBundle:Annonce"))
            ->findBy(['idPartenaire' => $id]);

        $candidature = $em->getRepository(("AnnonceBundle:Candidature"))
            ->findBy(['idAnnonce' => $annonce]);


        return $this->redirectToRoute('afficher_candidature', array('candidature'=>$candidature,
        ));


//        return $this->render('AnnonceBundle:CandidatureViews:AfficherCandidature.html.twig', array('candidature'=>$candidature,
//        ));
    }

    public function AfficherCandidaturesAction(){
        $id=$this->container->get('security.token_storage')->getToken()->getUser()->getId();

            $em = $this->getDoctrine()->getManager();

            $annonce = $em->getRepository(("AnnonceBundle:Annonce"))
                ->findBy(['idPartenaire' => $id]);

            $candidature = $em->getRepository(("AnnonceBundle:Candidature"))
                ->findBy(['idAnnonce' => $annonce]);


            return $this->render('AnnonceBundle:CandidatureViews:AfficherCandidature.html.twig', array(
                'candidature' => $candidature

            ));
    }

    public function AfficherCandidatureParUtilisateurAction(){
        $candidature = new Candidature();
        $em= $this->getDoctrine()->getManager();
        $candidature=$em->getRepository("AnnonceBundle:Candidature")->findBy(['idUtilisateur' =>$this->container->get('security.token_storage')->getToken()->getUser()->getId()]);

        return $this->render('AnnonceBundle:CandidatureViews:AfficherCandidatureUtilisateur.html.twig',
            array('candidature'=>$candidature,
            )
        );
    }

    public function showCandidatureAction($id){
        $em=$this->getDoctrine()->getManager();
        $candidature = $em->getRepository(("AnnonceBundle:Candidature"))
            ->find("$id");

        return $this->render('AnnonceBundle:CandidatureViews:ShowCandidatureUtilisateur.html.twig', array('e'=>$candidature
        ));
    }
}