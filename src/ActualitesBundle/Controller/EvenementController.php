<?php
/**
 * Created by PhpStorm.
 * User: Maha
 * Date: 27/03/2018
 * Time: 00:56
 */

namespace ActualitesBundle\Controller;

use ActualitesBundle\Entity\Evenements;
use ActualitesBundle\Form\EvenementsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;


class EvenementController extends Controller
{
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
                $a = date_format($evenements->getHoraireCom(), 'H:i');
                $b = date_format($evenements->getHoraireFin(), 'H:i');
                $evenements->setHoraireCom($a);
                $evenements->setHoraireFin($b);
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


}