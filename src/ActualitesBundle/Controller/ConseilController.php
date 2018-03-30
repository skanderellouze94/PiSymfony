<?php

namespace ActualitesBundle\Controller;

use ActualitesBundle\Entity\Conseil;
use ActualitesBundle\Form\ConseilType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;

class ConseilController extends Controller
{
    public function AjouterConseilAction(Request $request)
    {
        $conseil = new Conseil();
        $form = $this->createForm('ActualitesBundle\Form\ConseilType', $conseil);
        $form->handleRequest($request);
        if ($form->isValid() && $form->isSubmitted())
        {
            /**
             *@var UploadedFile $file
             */
            $file=$conseil->getImage();
            if($file->guessExtension()=='jpeg' || $file->guessExtension()=='png' || $file->guessExtension()=='JPEG' ||$file->guessExtension()=='PNG')
            {
            $fileName=md5(uniqid()).'.'.$file->guessExtension();
            $file->move(
                $this->getParameter('image_directory'),$fileName
            );
            $conseil->setImage($fileName);
            $em = $this->getDoctrine()->getManager();
            /*          $conseil->setIdUser($user = $this->getUser()->getId());*/

            $em->persist($conseil);
            $em->flush();
            return $this->redirectToRoute('afficherConseils');
        }
        else
            {
                return $this->render('ActualitesBundle:ConseilViews:erreur.html.twig');
            }
        }
        return $this->render('ActualitesBundle:ConseilViews:AjouterConseil.html.twig', array(
            'Form' => $form->createView()
        ));
    }


    public function AfficherConseilsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $conseil = $em->getRepository("ActualitesBundle:Conseil")->findAll();
        return $this->render('ActualitesBundle:ConseilViews:AfficherConseils.html.twig', array("m" => $conseil
        ));
    }


    public function SupprimerConseilAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $conseil = $em->getRepository("ActualitesBundle:Conseil")->find($id);
        $em->remove($conseil);
        $em->flush();
        $conseils = $em->getRepository("ActualitesBundle:Conseil")->findAll();
        return $this->render('ActualitesBundle:ConseilViews:AfficherConseils.html.twig', array("m" => $conseils
        ));
    }

    public function ModifierConseilAction(Request $request , $id)
    {
        $em=$this->getDoctrine()->getManager();
        $conseil=$em->getRepository('ActualitesBundle:Conseil')->find($id);
        $Form=$this->createForm(ConseilType::class,$conseil);

        $Form->handleRequest($request);
        if($Form->isValid())
        {
            /**
             *@var UploadedFile $file
             */
            $file=$conseil->getImage();
            if($file->guessExtension()=='jpeg' || $file->guessExtension()=='png' || $file->guessExtension()=='JPEG' ||$file->guessExtension()=='PNG')
            {
                $fileName=md5(uniqid()).'.'.$file->guessExtension();
                $file->move(
                    $this->getParameter('image_directory'),$fileName
                );
                $conseil->setImage($fileName);
                $em = $this->getDoctrine()->getManager();
                /*          $conseil->setIdUser($user = $this->getUser()->getId());*/

                $em->persist($conseil);
                $em->flush();
            return $this->redirectToRoute('afficherConseils');
        }}
        return $this->render('ActualitesBundle:ConseilViews:ModifierConseil.html.twig', array(
            'Form'=>$Form->createView()
        ));
    }

    public function indexConseilAction()
    {
        $em = $this->getDoctrine()->getManager();
        $conseil = $em->getRepository("ActualitesBundle:Conseil")->findAll();
        return $this->render('ActualitesBundle:ConseilViews:IndexConseil.html.twig', array("m" => $conseil
        ));
    }
}
