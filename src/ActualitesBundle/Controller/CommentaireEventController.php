<?php
/**
 * Created by PhpStorm.
 * User: Maha
 * Date: 28/03/2018
 * Time: 17:29
 */

namespace ActualitesBundle\Controller;
use ActualitesBundle\Entity\CommentaireEvent;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class CommentaireEventController extends Controller
{
    public function AjouterComEventAction(Request $request)
    {
        $comEvent = new CommentaireEvent();

        $form = $this->createForm('ActualitesBundle\Form\CommentaireEventType', $comEvent);
        $form->handleRequest($request);
        if ($form->isValid()) {

            dump($comEvent);
            exit();
            $em = $this->getDoctrine()->getManager();
            $comEvent->setIdUser($user = $this->getUser());


            /*          $categorie->setIdUser($user = $this->getUser()->getId());*/
            /*   $categorie->setIdUser(0);*/

            $em->persist($comEvent);
            $em->flush();
/*            return $this->redirectToRoute('afficherCategorie');*/
        }
        return $this->render('ActualitesBundle:EvenementViews:DetailEvenement.html', array(
            'Form' => $form->createView()
        ));
    }


    public function chercherComEventAction($id,Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $evenements = $em->getRepository("ActualitesBundle:Evenements")->find($id);

        return $this->render('ActualitesBundle:EvenementViews:DetailEvenement.html.twig', array('evenement' => $evenements
        ));
    }

}