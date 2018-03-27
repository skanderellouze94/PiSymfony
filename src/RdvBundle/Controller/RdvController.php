<?php
/**
 * Created by PhpStorm.
 * User: anis
 * Date: 21/03/2018
 * Time: 12:49
 */

namespace RdvBundle\Controller;


use RdvBundle\Entity\Rdvdate;
use RdvBundle\Form\RdvType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class RdvController extends Controller
{
    public function ajouterrAction(Request $request)
    {
        $rdv = new Rdvdate();
        $form = $this->createForm('RdvBundle\Form\RdvType', $rdv);
        $form->handleRequest($request);
        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            /*$rdv->setDate((string)$form->getData(date));*/
//            $username = $form["date"]->getData();
            $s=date_format($rdv->getDate(),'dd/MM/yyyy');
            $a=date_format($rdv->getTime(),'H:i:s');
           $rdv->setDate($s);

           $rdv->setTime($a);

            $em->persist($rdv);
            $em->flush();
        }
        return $this->render('RdvBundle:rdvviews:Ajout.html.twig', array(
            'Form' => $form->createView()

        ));
    }

    public function formatedDate($Date)
    {
        $a = (string)$Date;
        return $a;
    }

    public function afficherAction()
    {
        $rdv = $this->getDoctrine()->getManager();
        $rdvs = $rdv->getRepository(("RdvBundle:Rdvdate"))->findAll();
        return $this->render('RdvBundle:rdvviews:afficher.html.twig', array(
            'rendezvous' => $rdvs

        ));
    }
    public function calAction()
    {
        $rdv = $this->getDoctrine()->getManager();
        $rdvs = $rdv->getRepository(("RdvBundle:Rdv"))->findAll();
        return $this->render('RdvBundle:rdvviews:mycalendar.html.twig', array(
            'rendezvous' => $rdvs

        ));

    }
    public function editAction($id,Request $request)
    {
        $r=$this->getDoctrine()->getManager();

        $rdv = $r->getRepository(("RdvBundle:Rdvdate"))
            ->find("$id");
        $form = $this->createForm(RdvType::class, $rdv);
        $form->handleRequest($request);


        $r->flush();

        return $this->render('RdvBundle:rdvviews:Ajout.html.twig', array(
            'Form' => $form->createView()

        ));

    }
    public function calphpAction()
    {


        return $this->render('RdvBundle:rdvviews:aa:index.html.twig', array(


        ));

    }
    public function calendrierAction(){
        $rdv = $this->getDoctrine()->getManager();
        $rdvs = $rdv->getRepository(("RdvBundle:Rdv"))->findAll();
        return $this->render('RdvBundle:rdvviews:mycalendar.html.twig', array(
            'rendezvous' => $rdvs

        ));
    }
    public function chercherAction(Request $request){
        $r=$this->getDoctrine()->getManager();
        $rdv = new Rdv();
        $form=$this->createForm(RechercherAmendeType::class, $rdv);
        $form->handleRequest($request);
        $rdvs = $r->getRepository(("RdvBundle:Rdvdate"))
            ->findBy(array("payee"=>$rdv->getPayee(),"personneCin"=>$rdv->getPersonneCin()));
        return $this->render('RdvBundle:rdvviews:rechercher.html.twig', array(
            'Form' => $form->createView(),'amendes'=>$rdvs));
    }
}