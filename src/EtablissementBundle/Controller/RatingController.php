<?php
/**
 * Created by PhpStorm.
 * User: Ellouze Skander
 * Date: 23/03/2018
 * Time: 01:25
 */

namespace EtablissementBundle\Controller;


use EtablissementBundle\Entity\Rating;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class RatingController extends Controller
{
    public function insertAction(Request $request)
    {
        $rating = new Rating();
        $form = $this->createForm('EtablissementBundle\Form\RatingType', $rating);
        $form->handleRequest($request);
        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($rating);
            $em->flush();
        }
        return $this->render('EtablissementBundle:EtablissementView:rate.html.twig', array(
            'form' => $form->createView()
        ));
    }
}