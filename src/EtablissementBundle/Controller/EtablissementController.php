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
    public function indexAction()
    {
        $EM = $this->getDoctrine()->getManager();
        $etablissements = $EM->getRepository(("EtablissementBundle:Etablissements"))->findAll();
        return $this->render('EtablissementBundle:EtablissementView:index.html.twig', array(
            'etablissements' => $etablissements
        ));
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