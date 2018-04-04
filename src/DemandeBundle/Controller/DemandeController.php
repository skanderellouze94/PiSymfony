<?php
/**
 * Created by PhpStorm.
 * User: Maha
 * Date: 03/04/2018
 * Time: 19:50
 */

namespace DemandeBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use DemandeBundle\Entity\Demande;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;

class DemandeController extends Controller
{

    public function AjouterDemandeAction(Request $request)
    {
        $demande = new Demande();
        $form = $this->createForm('DemandeBundle\Form\DemandeType', $demande);
        $form->handleRequest($request);
        if ($form->isValid() && $form->isSubmitted())
        {
            /**
             * @var UploadedFile $file
             */
            $file = $demande->getCinImageRecto();
            $file1 = $demande->getCinImageVerso();
            $file2 = $demande->getDiplome();
            $file3 = $demande->getPatente();
            $file4 = $demande->getPhotoEtab();

            if ($file->guessExtension() == 'jpeg' || $file->guessExtension() == 'png' || $file->guessExtension() == 'JPEG' || $file->guessExtension() == 'PNG') {
                $fileName = md5(uniqid()) . '.' . $file->guessExtension();
                $file->move(
                    $this->getParameter('image_directory'), $fileName
                );
                $demande->setCinImageRecto($fileName);
            }
            if ($file1->guessExtension() == 'jpeg' || $file1->guessExtension() == 'png' || $file1->guessExtension() == 'JPEG' || $file1->guessExtension() == 'PNG') {
                $fileName = md5(uniqid()) . '.' . $file1->guessExtension();
                $file1->move(
                    $this->getParameter('image_directory'), $fileName
                );
                $demande->setCinImageVerso($fileName);
            }

            if ($file2->guessExtension() == 'jpeg' || $file2->guessExtension() == 'png' || $file2->guessExtension() == 'JPEG' || $file2->guessExtension() == 'PNG') {
                $fileName = md5(uniqid()) . '.' . $file2->guessExtension();
                $file2->move(
                    $this->getParameter('image_directory'), $fileName
                );
                $demande->setDiplome($fileName);
            }

            if ($file3->guessExtension() == 'jpeg' || $file3->guessExtension() == 'png' || $file3->guessExtension() == 'JPEG' || $file3->guessExtension() == 'PNG') {
                $fileName = md5(uniqid()) . '.' . $file3->guessExtension();
                $file3->move(
                    $this->getParameter('image_directory'), $fileName
                );
                $demande->setPatente($fileName);
            }

            if ($file4->guessExtension() == 'jpeg' || $file4->guessExtension() == 'png' || $file4->guessExtension() == 'JPEG' || $file4->guessExtension() == 'PNG') {
                $fileName = md5(uniqid()) . '.' . $file4->guessExtension();
                $file4->move(
                    $this->getParameter('image_directory'), $fileName
                );
                $demande->setPhotoEtab($fileName);





            $em = $this->getDoctrine()->getManager();
            $etab = $em->getRepository(("EtablissementBundle:Etablissements"))
             ->findOneBy(['user'=> $this->container->get('security.token_storage')->getToken()->getUser()]);


            $demande->setIdUser($user = $this->getUser());
            $demande->setEtat("Pas Encore ");
            $demande->setIdEtab($etab);

            $em->persist($demande);
            $em->flush();
           /* return $this->redirectToRoute('insert');*/}

        else
            {
                return $this->render('ActualitesBundle:ConseilViews:erreur.html.twig');
            }
        }


        return $this->render('DemandeBundle:DemandeViews:AjouterDemande.html.twig', array(
            'Form' => $form->createView()
        ));
    }

    public function AfficherDemandesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $demande = $em->getRepository("DemandeBundle:Demande")->findAll();
        return $this->render('DemandeBundle:DemandeViews:AfficherDemandes.html.twig', array("m" => $demande
        ));
    }



    public function DeclinerDemandeAction($id){

        $em = $this->getDoctrine()->getManager();
        $demande=$em->getRepository("DemandeBundle:Demande")->find($id);
        $demande->setEtat("Refusée");
        $etab =$demande->getIdEtab();
        $em->remove($etab);

        $em->persist($demande);
        $em->flush();

        $demande = $em->getRepository("DemandeBundle:Demande")->findAll();
        return $this->render('DemandeBundle:DemandeViews:AfficherDemandes.html.twig',array("m" => $demande
        ));
    }


    public function AccepterDemandeAction($id){

        $em = $this->getDoctrine()->getManager();
        $demande=$em->getRepository("DemandeBundle:Demande")->find($id);
        $demande->setEtat("Accéptée");

        $em->persist($demande);
        $em->flush();

        return $this->render('DemandeBundle:DemandeViews:AfficherDemandes.html.twig',array("m" => $demande
        ));
    }



}