<?php
/**
 * Created by PhpStorm.
 * User: Ellouze Skander
 * Date: 22/03/2018
 * Time: 11:47
 */

namespace FicheBundle\Controller;


use FicheBundle\Entity\Fichepatient;
use FicheBundle\Form\FichepatientType;
use PidevEsbeBundle\Entity\FosUser;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class FichepatientController extends Controller
{
    public function insertAction(Request $request)
    {
        $EM = $this->getDoctrine()->getManager();
        $fiche = new Fichepatient();
        $form = $this->createForm('FicheBundle\Form\FichepatientType', $fiche);
        $form->handleRequest($request);

        $etab = $EM->getRepository(("EtablissementBundle:Etablissements"))
            ->findOneBy(['user' => $this->container->get('security.token_storage')->getToken()->getUser()->getId()]);

        $patients = $EM->getRepository(("FicheBundle:Fichepatient"))
            ->fichePatientNonexistant($etab);



        if ($form->isValid()) {
            $a=($request->get('pat'));
            $b=intval($a);
            $user = $EM->getRepository(("PidevEsbeBundle:FosUser"))
                ->find($b);


            $fiche->setIdpatient($user);
            $em = $this->getDoctrine()->getManager();
            $fiche->setSuivie(strip_tags($fiche->getSuiviehtml()));
            $fiche->setIdetab($etab);
            $em->persist($fiche);
            $em->flush();
            return $this->redirectToRoute('indexx');

        }

        return $this->render('FicheBundle:FicheView:insert.html.twig', array(
            'patients' => $patients,
            'form' => $form->createView()));
    }



    public function indexAction(Request $request)
    {
        $fiches = new Fichepatient();
        $em    = $this->getDoctrine()->getManager();
        $filterForm = $this->createForm('FicheBundle\Form\Filtre\FicheFiltre', $fiches);
        $filterForm->handleRequest($request);

        $filtredFields = $request->query->get('etablissementbundle_etab_filter');
        $dql   = "SELECT m FROM FicheBundle:FichePatient m ";
        $query = $em->createQuery($dql);

        if(sizeof($request->query->get('fichebundle_fichepatient')) >0){
            $query =   $em->getRepository('FicheBundle:Fichepatient')->findFiltredFields($request->query->get('fichebundle_fichepatient'));

            $filterForm->get('idpatient')->setData($filtredFields['idpatient']);


        }

        $paginator  = $this->get('knp_paginator');
        $fiches = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            6/*limit per page*/
        );

        return $this->render('FicheBundle:FicheView:index.html.twig',
            array('fiches'=>$fiches,
                'form' => $filterForm->createView())
        );
    }



    public function editAction(Request $request , $id)
    {
        $em=$this->getDoctrine()->getManager();

        $fiche = $em->getRepository(("FicheBundle:Fichepatient"))
            ->find("$id");
        $form = $this->createForm(FichepatientType::class, $fiche);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $fiche->setSuivie(strip_tags($fiche->getSuiviehtml()));
            $em->persist($fiche);
            $em->flush();
            return $this->redirectToRoute('indexx');
        }
        return $this->render('FicheBundle:FicheView:modif.html.twig', array(
            'form' => $form->createView(),'v'=>$fiche

        ));
    }
}