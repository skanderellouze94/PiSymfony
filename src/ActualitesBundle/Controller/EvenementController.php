<?php
/**
 * Created by PhpStorm.
 * User: Maha
 * Date: 27/03/2018
 * Time: 00:56
 */

namespace ActualitesBundle\Controller;

use ActualitesBundle\Entity\Action;
use ActualitesBundle\Entity\Evenements;
use ActualitesBundle\Form\EvenementsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use ActualitesBundle\Entity\CommentaireEvent;

class EvenementController extends Controller
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function AjouterEvenementAction(Request $request)
    {
        $evenements= new Evenements();
        $form = $this->createForm('ActualitesBundle\Form\EvenementsType', $evenements);
        $form->handleRequest($request);
        if ($form->isValid() && $form->isSubmitted()) {
            /**
             * @var UploadedFile $file
             */
            $file = $evenements->getImage();
            if ($file->guessExtension() == 'jpeg' || $file->guessExtension() == 'png' || $file->guessExtension() == 'JPEG' || $file->guessExtension() == 'PNG') {
                $fileName = md5(uniqid()) . '.' . $file->guessExtension();
                $file->move(
                    $this->getParameter('image_directory'), $fileName
                );
                $evenements->setImage($fileName);
                $em = $this->getDoctrine()->getManager();


                $evenements->setArchive(0);

                /*          $conseil->setIdUser($user = $this->getUser()->getId());*/
                $a = date_format($evenements->getHoraireCom(), 'H:i:s');
                $b = date_format($evenements->getHoraireFin(), 'H:i:s');
                $evenements->setHoraireCom($a);
                $evenements->setHoraireFin($b);
                $evenements->setIdcreator($user = $this->getUser());
                $em->persist($evenements);
                $em->flush();
                return $this->redirectToRoute('afficherEvenements');
            } else
            {
                return $this->render('ActualitesBundle:ConseilViews:erreur.html.twig');
            }
        }
        return $this->render('ActualitesBundle:EvenementViews:AjouterEvenement.html.twig', array(
            'Form' => $form->createView()
        ));
    }

    public function AfficherEvenementsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $evenements = $em->getRepository("ActualitesBundle:Evenements")->findAll();
        return $this->render('ActualitesBundle:EvenementViews:AfficherEvenements.html.twig', array("m" => $evenements
        ));
    }

    public function AfficherEvenements3Action()
    {

        $em = $this->getDoctrine()->getManager();
        $evenements = $em->getRepository(Evenements::class)->AfficherEvenements3DQL();

        return $this->render('ActualitesBundle:EvenementViews:IndexEvenement.html.twig', array("m"=>$evenements));

    }

    public function SupprimerEvenementAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $evenement = $em->getRepository("ActualitesBundle:Evenements")->find($id);
        $em->remove($evenement);
        $em->flush();
        $evenements = $em->getRepository("ActualitesBundle:Evenements")->findAll();
        return $this->render('ActualitesBundle:EvenementViews:AfficherEvenements.html.twig', array("m" => $evenements
        ));
    }


    public function ModifierEvenementAction(Request $request , $id)
    {
        $em=$this->getDoctrine()->getManager();
        $evenements=$em->getRepository('ActualitesBundle:Evenements')->find($id);
        $e=(strtotime($evenements->getHoraireCom()));

        $Form=$this->createForm(EvenementsType::class,$evenements);
        $date = date_create_from_format('H:i', $evenements->getHoraireCom());
        $Form->get('horaireCom')->setData($date);
        $Form->handleRequest($request);

        if($Form->isValid())
        {
            /**
             *@var UploadedFile $file
             */
            $file=$evenements->getImage();

            if($file->guessExtension()=='jpeg' || $file->guessExtension()=='png' || $file->guessExtension()=='JPEG' ||$file->guessExtension()=='PNG')
            {

                $fileName=md5(uniqid()).'.'.$file->guessExtension();
                $file->move(
                    $this->getParameter('image_directory'),$fileName
                );
                $evenements->setImage($fileName);
                $em = $this->getDoctrine()->getManager();
                $a = date_format($evenements->getHoraireCom(), 'H:i:s');
                $b = date_format($evenements->getHoraireFin(), 'H:i:s');

                $evenements->setHoraireCom(strtotime($a));
                $evenements->setHoraireFin($b);


                /*          $conseil->setIdUser($user = $this->getUser()->getId());*/

                $em->persist($evenements);
                $em->flush();
                return $this->redirectToRoute('afficherEvenements');
            }}
        return $this->render('ActualitesBundle:EvenementViews:ModifierEvenement.html.twig', array(
            'Form'=>$Form->createView()
        ));
    }

    public function indexEvenementAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $evenements = $em->getRepository("ActualitesBundle:Evenements")->findAll();

        $categorie=$em->getRepository("ActualitesBundle:Categorie")->RechercheTypeEvenementDQL();
        $dql="select c from ActualitesBundle:Evenements c ORDER BY c.idEvent DESC ";
        $query=$em->createQuery($dql);
        $paginator  = $this->get('knp_paginator');
        $evenements = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1)/*page number*/,
            2/*limit per page*/
        );
        return $this->render('ActualitesBundle:EvenementViews:IndexEvenement.html.twig', array("m" => $evenements,"c"=>$categorie
        ));
    }


    public function chercherEvenementAction($id,Request $request)
    {

        $comEvent = new CommentaireEvent();
        $em=$this->getDoctrine()->getManager();
        $evenements = $em->getRepository("ActualitesBundle:Evenements")->find($id);
        $commentaires = $em->getRepository("ActualitesBundle:CommentaireEvent")->findBy(array('idEvent'=>$evenements));

        $user = $em->getRepository("PidevEsbeBundle:FosUser")->find(1);

        $form = $this->createForm('ActualitesBundle\Form\CommentaireEventType', $comEvent);
        $form->handleRequest($request);


        $action = new Action();
        $formAction = $this->createForm('ActualitesBundle\Form\ActionType', $action);
        $formAction->handleRequest($request);
        if ($formAction->isValid()) {

         $valeur = $request->get('part');
            if($valeur=='1')
            {
                $action->setType('Participe');}
               else{$action->setType('Interesse');}



            $em = $this->getDoctrine()->getManager();
            $action->setIdEvent($evenements);
            $action->setIdUser($user);




            /*          $categorie->setIdUser($user = $this->getUser()->getId());*/
            /*   $categorie->setIdUser(0);*/
            $em->persist($action);
            $em->flush();

            $commentaires = $em->getRepository("ActualitesBundle:CommentaireEvent")->findBy(array('idEvent'=>$evenements));
            return $this->render('ActualitesBundle:EvenementViews:DetailEvenement.html.twig', array('f'=>$formAction->createView(),'commentaires'=>$commentaires,'evenement' => $evenements, 'Form' => $form->createView()));
            /*            return $this->redirectToRoute('afficherCategorie');*/
        }





        if ($form->isValid()) {




            $em = $this->getDoctrine()->getManager();
            $comEvent->setIdEvent($evenements);


            $comEvent->setIdUser($user = $this->getUser());
            /*   $categorie->setIdUser(0);*/
            $em->persist($comEvent);
            $em->flush();

            $commentaires = $em->getRepository("ActualitesBundle:CommentaireEvent")->findBy(array('idEvent'=>$evenements));
        return $this->render('ActualitesBundle:EvenementViews:DetailEvenement.html.twig', array('f'=>$formAction->createView(),'commentaires'=>$commentaires,'evenement' => $evenements, 'Form' => $form->createView()));
            /*            return $this->redirectToRoute('afficherCategorie');*/
        }

        return $this->render('ActualitesBundle:EvenementViews:DetailEvenement.html.twig', array('f'=>$formAction->createView(),'commentaires'=>$commentaires,'evenement' => $evenements,'Form' => $form->createView()));
    }

    public function RechercheCurrentDateAction()
    {
 /*       $evenements = new Evenements();
        $em = $this->getDoctrine()->getManager();
        $evenements = $em->getRepository('ActualitesBundle:Evenements')->findCurrentDateDQL();

        $EM = $this->getDoctrine()->getManager();
        $evenements = $EM->getRepository(("ActualitesBundle:Evenements"))->findAll();
        return $this->render('ActualitesBundle:EvenementViews:Afficherr.html.twig', array("m"=>$evenements
        ));*/

        $em = $this->getDoctrine()->getManager();
        $evenements = $em->getRepository(Evenements::class)->findCurrentDateDQL();

        return $this->render('ActualitesBundle:EvenementViews:Afficherr.html.twig', array("e"=>$evenements));
    }


    public function RechercheDateDemainAction()
    {
        $em = $this->getDoctrine()->getManager();
        $evenements = $em->getRepository(Evenements::class)->findDateDemainDQL();

        return $this->render('ActualitesBundle:EvenementViews:AfficherDemain.html.twig', array("e"=>$evenements));
    }

    public function RechercheDateSemaineAction()
    {
        $em = $this->getDoctrine()->getManager();
        $evenements = $em->getRepository(Evenements::class)->findDateSemaineDQL();

        return $this->render('ActualitesBundle:EvenementViews:AfficherSemaine.html.twig', array("e"=>$evenements));
    }


    public function AfficherEvenementsCategorieAction($id)
    {
        $em = $this->getDoctrine()->getManager();


        $query = $em->createQuery("select e from ActualitesBundle:Evenements e where e.idCategorie=".$id);
        $events =$query->getResult();

        return $this->render('ActualitesBundle:EvenementViews:IndexEvenementCat.html.twig', array("e"=>$events));

    }

}