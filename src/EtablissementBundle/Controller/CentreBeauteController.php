<?php
/**
 * Created by PhpStorm.
 * User: Ellouze Skander
 * Date: 21/03/2018
 * Time: 15:04
 */

namespace EtablissementBundle\Controller;


use EtablissementBundle\Entity\CentreBeaute;
use EtablissementBundle\Entity\Etablissements;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CentreBeauteController extends Controller
{
    public function indexAction(Request $request)
    {
        $etablissement = new Etablissements();
        $em    = $this->getDoctrine()->getManager();
        $filterForm = $this->createForm('EtablissementBundle\Form\Filtre\EtablissementFiltre', $etablissement);
        $filterForm->handleRequest($request);

        $filtredFields = $request->query->get('etablissementbundle_etab_filter');
        $dql   = "SELECT m FROM EtablissementBundle:Etablissements m WHERE (m.type='centre beaute') ORDER BY m.id DESC ";
        $query = $em->createQuery($dql);

        if(sizeof($request->query->get('etablissementbundle_etab_filter')) >0){
            $query =   $em->getRepository('EtablissementBundle:Etablissements')->findFiltredFields($request->query->get('etablissementbundle_etab_filter'));

            $filterForm->get('nom')->setData($filtredFields['nom']);


        }

        $paginator  = $this->get('knp_paginator');
        $etablissement = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            2/*limit per page*/
        );

        return $this->render('EtablissementBundle:EtablissementView:index.html.twig',
            array('etablissements'=>$etablissement,
                'form' => $filterForm->createView())
        );
    }

    public function insertAction(Request $request)
    {

        $cabinet = new CentreBeaute();
        $form = $this->createForm('EtablissementBundle\Form\CentreBeauteType', $cabinet);
        $form->handleRequest($request);
        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($cabinet);
            $em->flush();
        }
        return $this->render('EtablissementBundle:EtablissementView:insertCentre.html.twig', array(
            'Form' => $form->createView()
        ));
    }
}