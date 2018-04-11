<?php
/**
 * Created by PhpStorm.
 * User: anis
 * Date: 28/03/2018
 * Time: 13:01
 */

namespace RdvBundle\Controller;


use RdvBundle\Entity\Rdvdate;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class CalendarController extends Controller
{
    public function insertAction(Request $request)
    {
        $rdv = new Rdvdate();
        $form = $this->createForm('RdvBundle\Form\RdvdateType', $rdv);
        $form->handleRequest($request);
        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();

            $em->persist($rdv);
            $em->flush();
        }
        return $this->render('RdvBundle:rdvviews:CalAjout.html.twig', array(
            'Form' => $form->createView()

        ));
    }

    public function loadCalendarDataAction(){
        $em = $this->getDoctrine()->getManager();
        $rdvs = $em->getRepository('RdvBundle:Rdvdate')->findby(['idUser'=>$this->getUser(),'etat'=>'Accepté']);
        $listRdvsJson = array();
        foreach ($rdvs as $r){
            $listRdvsJson[] = array(
                'title' => $r->getIdService()->getNom(),
                'start' => "" . ($r->getDate()->format('Y-m-d H:i:s')) . "",
                'end' => "" . ($r->getDate()->format('Y-m-d H:i:s')) . "",
                'url'=>"http://localhost/PiSymfony/web/app_dev.php/rdv/detail/".($r->getidRdv())."",
                'id' => "" . ($r->getIdRdv(). ""));
        }
        return new JsonResponse(array('events' => $listRdvsJson));
    }

    public function callAction(Request $request)
    {


        $rdv = $this->getDoctrine()->getManager();
        $rdvs = $rdv->getRepository(("RdvBundle:Rdvdate"))->findAll();
        $notifiableNotifications = $rdv->getRepository("MgiletNotificationBundle:NotifiableNotification")->findAll();

        return $this->render('RdvBundle:rdvviews:calendar.html.twig', array(
            'rendezvous' => $rdvs, 'notifiableNotifications'=>$notifiableNotifications

        ));
    }
}