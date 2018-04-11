<?php
/**
 * Created by PhpStorm.
 * User: anis
 * Date: 21/03/2018
 * Time: 12:49
 */

namespace RdvBundle\Controller;


use RdvBundle\Entity\Rdvdate;
use RdvBundle\Form\RdvdateType;
use RdvBundle\Form\RdvType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class RdvController extends Controller
{
    public function ajouterrAction(Request $request)
    {
        $rdv = new Rdvdate();
        $form = $this->createForm('RdvBundle\Form\RdvdateType', $rdv);
        $form->handleRequest($request);
        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            /*$rdv->setDate((string)$form->getData(date));*/
//            $username = $form["date"]->getData();
            $t= $request->get('datepick').(' ').$request->get('timepick').(':00');

            $literalTime    =   \DateTime::createFromFormat("Y-m-d H:i:s",$t);
//            $expire_date =  $literalTime-> ("Y-m-d H:i:s");
            $rdv->setDate($literalTime);
//            $rdv->setIdService($id);
            $em->persist($rdv);
            $em->flush();
            $this->sendNotification();
            return $this->redirectToRoute('affichage');
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
    //back
    public function listrdvpartAction()
    {$id=$this->container->get('security.token_storage')->getToken()->getUser()->getId();

        $rdv = $this->getDoctrine()->getManager();

        $etab = $rdv->getRepository(("EtablissementBundle:Etablissements"))
        ->findOneBy(['user' => $id]);
        $service = $rdv->getRepository(("ProductBundle:Services"))
        ->findOneBy(['idEtab' =>$etab]);
        $rdvs = $rdv->getRepository(("RdvBundle:Rdvdate"))->findBy(['idService' =>$service]);
        $notifiableNotifications = $rdv->getRepository("MgiletNotificationBundle:NotifiableNotification")->findAll();

        return $this->render('RdvBundle:rdvviews:listrdvpart.html.twig', array(
        'rendezvous' => $rdvs,'notifiableNotifications'=>$notifiableNotifications

        ));
    }
    public function todetailAction($id){

        $rdv = $this->getDoctrine()->getManager();
        $rdvs = $rdv->getRepository(("RdvBundle:Rdvdate"))->find($id);
        return $this->render('RdvBundle:rdvviews:details.html.twig', array(
            'rdv'=>$rdvs
        ));
    }
    public function afficherAction()
    {
        $rdv = $this->getDoctrine()->getManager();
        $rdvs = $rdv->getRepository(("RdvBundle:Rdvdate"))->findBy(['idUser' =>$this->container->get('security.token_storage')->getToken()->getUser()->getId()]);

        return $this->render('RdvBundle:rdvviews:afficher.html.twig', array(
            'rendezvous' => $rdvs

        ));
    }
    public function calAction()
    {
        $rdv = $this->getDoctrine()->getManager();
        $rdvs = $rdv->getRepository(("RdvBundle:Rdv"))->findAll();
        return $this->render('RdvBundle:rdvviews:calendar.html.twig', array(
            'rendezvous' => $rdvs

        ));

    }
    /**
     * @Route("/send-notification", name="send_notification")
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function sendNotification()
    {
        $manager = $this->get('mgilet.notification');
        $notif = $manager->createNotification('Demande de RendezVous');
        $notif->setMessage('RendezVous');
        $notif->setLink('http://symfony.com/');
        // or the one-line method :
        // $manager->createNotification('Notification subject','Some random text','http://google.fr');

        // you can add a notification to a list of entities
        // the third parameter ``$flush`` allows you to directly flush the entities
        $manager->addNotification(array($this->getUser()), $notif, true);


    }
    //front
    public function editAction($id, Request $request)
    {
        $r=$this->getDoctrine()->getManager();
        $dd=new \DateTime('now');
        $daynow=$dd->format("d");
        $monthnow=$dd->format("m");
        $yearnow=$dd->format("Y");

        $rdv = $r->getRepository(("RdvBundle:Rdvdate"))->find("$id");

        $dayrdv=$rdv->getDate()->format("d");
        $monthrdv=$rdv->getDate()->format("m");
        $yearrdv=$rdv->getDate()->format("Y");

        if($dayrdv-$daynow<2 && $monthrdv-$monthnow==0 && $yearrdv-$yearnow==0 || $rdv->getEtat()=='Annulé') {

//
            throw new \Exception('naaaaaaah bro!');
        }
            $rdv->setIdUser($this->container->get('security.token_storage')->getToken()->getUser());

            $form = $this->createForm(RdvdateType::class, $rdv);
            $form->handleRequest($request);
                     if($form->isValid()){
                         $t= $request->get('datepick').(' ').$request->get('timepick').(':00');

                         $literalTime    =   \DateTime::createFromFormat("Y-m-d H:i:s",$t);
//            $expire_date =  $literalTime-> ("Y-m-d H:i:s");
                         $rdv->setDate($literalTime);
                $r->persist($rdv);
            $r->flush();
                return $this->redirectToRoute('affichage');
            }
            return $this->render('RdvBundle:rdvviews:Ajout.html.twig', array(
                'Form' => $form->createView()


            ));


    }
    public function accepterAction($id)
    {
        $r=$this->getDoctrine()->getManager();

        $rdv = $r->getRepository(("RdvBundle:Rdvdate"))
            ->find("$id");
        $rdv->setEtat('Accepte');

        $r->persist($rdv);


        $r->flush();
      return $this->redirectToRoute('lsrdv');

    }
    //front
    public function annulerfrAction($id)
    {
        $r=$this->getDoctrine()->getManager();

        $rdv = $r->getRepository(("RdvBundle:Rdvdate"))
            ->find("$id");
        $rdv->setEtat('Annulé');

        $r->persist($rdv);


        $r->flush();

        return $this->redirectToRoute('affichage');

    }
    //back
    public function annulerAction($id)
    {
        $r=$this->getDoctrine()->getManager();

        $rdv = $r->getRepository(("RdvBundle:Rdvdate"))
            ->find("$id");
        $rdv->setEtat('Annulé');

        $r->persist($rdv);


        $r->flush();
        return $this->redirectToRoute('lsrdv');

    }
    public function refuserAction($id)
    {
        $r=$this->getDoctrine()->getManager();

        $rdv = $r->getRepository(("RdvBundle:Rdvdate"))
            ->find("$id");
        $rdv->setEtat('refuse');

        $r->persist($rdv);


        $r->flush();
        return $this->redirectToRoute('lsrdv');

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