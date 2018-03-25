<?php
/**
 * Created by PhpStorm.
 * User: Ellouze Skander
 * Date: 21/03/2018
 * Time: 15:03
 */

namespace EtablissementBundle\Controller;

use EtablissementBundle\Entity\CabinetMedical;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CabinetMedicalController extends Controller
{
    public function insertAction(Request $request)
    {
        $cabinet = new CabinetMedical();
        $form = $this->createForm('EtablissementBundle\Form\CabinetMedicalType', $cabinet);
        $form->handleRequest($request);
        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($cabinet);
            $em->flush();
        }
        return $this->render('EtablissementBundle:EtablissementView:insertCabinet.html.twig', array(
            'Form' => $form->createView()
        ));
    }
}