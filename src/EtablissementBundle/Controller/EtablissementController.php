<?php
/**
 * Created by PhpStorm.
 * User: Ellouze Skander
 * Date: 21/03/2018
 * Time: 12:46
 */

namespace EtablissementBundle\Controller;


use EtablissementBundle\Entity\CabinetMedical;
use EtablissementBundle\Entity\CentreBeaute;
use EtablissementBundle\Entity\Etablissements;
use EtablissementBundle\Entity\Herboriseterie;
use EtablissementBundle\Entity\Hopitaux;
use EtablissementBundle\Entity\Laboratoire;
use EtablissementBundle\Entity\Parapharmacie;
use EtablissementBundle\Entity\Pharmacie;
use EtablissementBundle\Entity\SalleDeSport;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EtablissementController extends Controller
{
    public function indexAction(Request $request)
    {
        $etablissement = new Etablissements();
        $em    = $this->getDoctrine()->getManager();
        $filterForm = $this->createForm('EtablissementBundle\Form\Filtre\EtablissementFiltre', $etablissement);
        $filterForm->handleRequest($request);

        $filtredFields = $request->query->get('etablissementbundle_etab_filter');
        $dql   = "SELECT m FROM EtablissementBundle:Etablissements m ORDER BY m.id DESC";
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
        $etablissement = new Etablissements();
        $form = $this->createForm('EtablissementBundle\Form\EtablissementsType', $etablissement);
        $form->handleRequest($request);
        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($etablissement);
            $em->flush();

        }

            return $this->render('EtablissementBundle:EtablissementView:insert.html.twig', array(
            'form' => $form->createView()));
    }

    public function loadSubEstablishmentFormAction(Request $request)
    {

        switch ($request->request->get("subEstablishment"))
        {
            case 'cabinet medical':
                $subEstablishmentObj = new CabinetMedical();
                $form = $this->createForm('EtablissementBundle\Form\CabinetMedicalType', $subEstablishmentObj);
                $view = "EtablissementBundle:EtablissementView:cabinet.html.twig";
                break;

            case 'centre beaute':
                $subEstablishmentObj = new CentreBeaute();
                $form = $this->createForm('EtablissementBundle\Form\CentreBeauteType', $subEstablishmentObj);
                $view = "EtablissementBundle:EtablissementView:centre.html.twig";
                break;
            case 'herboriseterie':
                $subEstablishmentObj = new Herboriseterie();
                $form = $this->createForm('EtablissementBundle\Form\HerboriseterieType', $subEstablishmentObj);
                $view = "EtablissementBundle:EtablissementView:herbo.html.twig";
                break;
            case 'hopital':
                $subEstablishmentObj = new Hopitaux();
                $form = $this->createForm('EtablissementBundle\Form\HopitauxType', $subEstablishmentObj);
                $view = "EtablissementBundle:EtablissementView:hopital.html.twig";
                break;
            case 'laboratoire':
                $subEstablishmentObj = new Laboratoire();
                $form = $this->createForm('EtablissementBundle\Form\LaboratoireType', $subEstablishmentObj);
                $view = "EtablissementBundle:EtablissementView:laboratoire.html.twig";
                break;
            case 'parapharmacie':
                $subEstablishmentObj = new Parapharmacie();
                $form = $this->createForm('EtablissementBundle\Form\ParapharmacieType', $subEstablishmentObj);
                $view = "EtablissementBundle:EtablissementView:parapharmacie.html.twig";
                break;
            case 'pharmacie':
                $subEstablishmentObj = new Pharmacie();
                $form = $this->createForm('EtablissementBundle\Form\PharmacieType', $subEstablishmentObj);
                $view = "EtablissementBundle:EtablissementView:pharmacie.html.twig";
                break;
            case 'salle de sport':
                $subEstablishmentObj = new SalleDeSport();
                $form = $this->createForm('EtablissementBundle\Form\SalleDeSportType', $subEstablishmentObj);
                $view = "EtablissementBundle:EtablissementView:salledesport.html.twig";
                break;

        }
        return $this->render($view, array(
            'form' => $form->createView()));

    }


}