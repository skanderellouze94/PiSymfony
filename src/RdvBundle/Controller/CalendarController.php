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

    public function callAction(Request $request)
    {
        $rdv = new Rdvdate();
        $form = $this->createForm('RdvBundle\Form\RdvdateType', $rdv);
        $form->handleRequest($request);
        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();

            $em->persist($rdv);
            $em->flush();
        }
        $rdv = $this->getDoctrine()->getManager();
        $rdvs = $rdv->getRepository(("RdvBundle:Rdvdate"))->findAll();
        return $this->render('RdvBundle:rdvviews:call.html.twig', array(
            'rendezvous' => $rdvs,'Form' => $form->createView()

        ));
    }
}