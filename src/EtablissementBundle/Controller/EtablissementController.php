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
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;

class EtablissementController extends Controller
{
    public function indexAction(Request $request)
    {
        $etablissement = new Etablissements();
        $em    = $this->getDoctrine()->getManager();
        $filterForm = $this->createForm('EtablissementBundle\Form\Filtre\EtablissementFiltre', $etablissement);
        $filterForm->handleRequest($request);
        $etab = new Etablissements();
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
            3/*limit per page*/
        );

        return $this->render('EtablissementBundle:EtablissementView:index.html.twig',
            array('etablissements'=>$etablissement,'etab'=>$etab,
                'form' => $filterForm->createView())
        );
    }

    public function insertAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $establishment = new Etablissements();
        $form = $this->createForm('EtablissementBundle\Form\EtablissementsType', $establishment);
        $form->handleRequest($request);
        if ($form->isValid()) {

            /**
             *@var UploadedFile $file
             */
            $file=$establishment->getImage();

                $fileName=md5(uniqid()).'.'.$file->guessExtension();
                $file->move(
                    $this->getParameter('image_directory'),$fileName
                );
                $establishment->setImage($fileName);
                if($form["type"]->getData()=='cabinet medical')
                {$subEstab_data = $request->request->get('etablissementbundle_cabinetmedical');}
                if($form["type"]->getData()=='centre beaute')
                {$subEstab_data = $request->request->get('etablissementbundle_centredebeaute');}
                if($form["type"]->getData()=='herboriseterie')
                {$subEstab_data = $request->request->get('etablissementbundle_herboriseterie');}
                if($form["type"]->getData()=='hopital')
                {$subEstab_data = $request->request->get('etablissementbundle_hopitaux');}
                if($form["type"]->getData()=='laboratoire')
                {$subEstab_data = $request->request->get('etablissementbundle_laboratoire');}
                if($form["type"]->getData()=='parapharmacie')
                {$subEstab_data = $request->request->get('etablissementbundle_parapharmacie');}
                if($form["type"]->getData()=='pharmacie')
                {$subEstab_data = $request->request->get('etablissementbundle_pharmacie');}
                if($form["type"]->getData()=='salle de sport')
                {$subEstab_data = $request->request->get('etablissementbundle_salledesport');}

            $establishment = $form->getData();

            $subEstab = $this->getSubEstabEntity($establishment->getType(),$subEstab_data);
            if(!$subEstab){
                throw new \Exception('moma');
            }
            $subEstab->setIdEtab($establishment);
             /*   $establishment->setHeureOuverture(date_format($establishment->getHeureOuverture(),'H:i'));
                $establishment->setHeureFermeture(date_format(getHeureFermeture(),'H:i'));*/


            $establishment->setUser( $this->container->get('security.token_storage')->getToken()->getUser());

            $em->persist($establishment);
            $em->persist($subEstab);
            $em->flush();
            return $this->redirectToRoute('ajouter_demande');

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

    public function showAction(Request $request , $id)
    {
        $em=$this->getDoctrine()->getManager();

        $etab = $em->getRepository(("EtablissementBundle:Etablissements"))
            ->find("$id");

        return $this->render('EtablissementBundle:EtablissementView:show.html.twig', array('e'=>$etab
        ));
    }

    /**
     * @param $type
     * @param $data
     * @return CabinetMedical|CentreBeaute|Herboriseterie|Hopitaux|Laboratoire|Parapharmacie|Pharmacie
     */
    private function getSubEstabEntity($type,$data){

        switch ($type)
        {
            case 'cabinet medical':
                $subEstablishmentObj = new CabinetMedical();
                if(isset($data['cnam'])) $subEstablishmentObj->setCnam($data['cnam']);
                break;

            case 'centre beaute':
                $subEstablishmentObj = new CentreBeaute();
                if(isset($data['nb_employee'])) $subEstablishmentObj->setNbEmployee($data['nb_employee']);
                break;
            case 'herboriseterie':
                $subEstablishmentObj = new Herboriseterie();
                if(isset($data['type'])) $subEstablishmentObj->setType($data['type']);
                break;
            case 'hopital':
                $subEstablishmentObj = new Hopitaux();
                if(isset($data['type'])) $subEstablishmentObj->setType($data['type']);
                if(isset($data['urgence'])) $subEstablishmentObj->setUrgence($data['urgence']);
                if(isset($data['cnam'])) $subEstablishmentObj->setCnam($data['cnam']);
                break;
            case 'laboratoire':
                $subEstablishmentObj = new Laboratoire();
                if(isset($data['nbEquipe'])) $subEstablishmentObj->setNbEquipe($data['nbEquipe']);
                if(isset($data['cnam'])) $subEstablishmentObj->setCnam($data['cnam']);
                if(isset($data['type'])) $subEstablishmentObj->setType($data['type']);
                break;
            case 'parapharmacie':
                $subEstablishmentObj = new Parapharmacie();
                if(isset($data['livraison'])) $subEstablishmentObj->setLivraison($data['livraison']);
                break;
            case 'pharmacie':
                $subEstablishmentObj = new Pharmacie();
                if(isset($data['type'])) $subEstablishmentObj->setType($data['type']);
                break;
            case 'salle de sport':
                $subEstablishmentObj = new SalleDeSport();
            if(isset($data['nbEntraineur'])) $subEstablishmentObj->setNbEntraineur($data['nbEntraineur']);
                break;
            default:
                $subEstablishmentObj = null;
                break;

        }

        return $subEstablishmentObj;
    }

    public function monEtabAction(Request $request,$id)
    {
        $etab = new Etablissements();
        $em = $this->getDoctrine()->getManager();
        $id=$this->container->get('security.token_storage')->getToken()->getUser()->getId();
        $etab = $em->getRepository(("EtablissementBundle:Etablissements"))
            ->findOneBy(['user' => $id]);
        $form = $this->createForm('EtablissementBundle\Form\EtablissementsEditType', $etab);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $etab->getImage();

            $fileName = md5(uniqid()) . '.' . $file->guessExtension();
            $file->move(
                $this->getParameter('image_directory'), $fileName
            );
            $em = $this->getDoctrine()->getManager();
            $em->persist($etab);
            $em->flush();
        }
        return $this->render('EtablissementBundle:EtablissementView:monEtab.html.twig', array(
            'form' => $form->createView(),

        ));
    }

}