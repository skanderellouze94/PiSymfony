<?php
/**
 * Created by PhpStorm.
 * User: anis
 * Date: 27/03/2018
 * Time: 13:04
 */

namespace ReclamationBundle\Controller;


use EtablissementBundle\Entity\Etablissements;
use ReclamationBundle\Entity\Reclamation;
use ReclamationBundle\Form\RechercherecType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ReclamationController extends Controller
{
    public function insertAction(Request $request)
    {

        $rdv = new Reclamation();
        $form = $this->createForm('ReclamationBundle\Form\ReclamationType', $rdv);
        $form->handleRequest($request);
        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            /*$rdv->setDate((string)$form->getData(date));*/
//            $username = $form["date"]->getData();
            $rdv->setDate(new \DateTime('now'));
            $rdv->setUser($this->getUser());
            $em->persist($rdv);
            $em->flush();
        }
        return $this->render('ReclamationBundle:reclamationviews:Ajout.html.twig', array(
            'Form' => $form->createView()

        ));

    }
    public function searchVoitureAction(Request $request)
    {$r=$this->getDoctrine()->getManager();
        $rec=$r->getRepository('ReclamationBundle:Reclamation')->findAll();

        if($request->getMethod()=="POST") {
            $rec = $r->getRepository('ReclamationBundle:Reclamation')->findBy(array('objet'=>$request->get('objet')));

        }
        return $this->render('ReclamationBundle:reclamationviews:afficher.html.twig', array('reclam' => $rec

        ));
    }

    public function todetailAction($id){

        $rec = $this->getDoctrine()->getManager();
        $recs = $rec->getRepository(("ReclamationBundle:Reclamation"))->find($id);
        return $this->render('ReclamationBundle:reclamationviews:details.html.twig', array(
                'rec'=>$recs
        ));
    }
    public function torespAction(){

//        $rec = $this->getDoctrine()->getManager();

        return $this->render('ReclamationBundle:reclamationviews:reponse.html.twig', array(

        ));
    }
    //back

    public function afficherAction(Request $request)
    {
$id=$this->container->get('security.token_storage')->getToken()->getUser()->getId();

        $rec = $this->getDoctrine()->getManager();

        $etab = $rec->getRepository(("EtablissementBundle:Etablissements"))
            ->findOneBy(['user' => $id]);
        if($request->getMethod()=="POST") {
            $recc = $rec->getRepository('ReclamationBundle:Reclamation')->findBy(['objet'=>$request->get('objet'),'user'=>$this->container->get('security.token_storage')->getToken()->getUser()->getId()]);

            return $this->render('ReclamationBundle:reclamationviews:afficherpart.html.twig', array('reclamations' => $recc

            ));
        }
//        $dql="SELECT m FROM ReclamationBundle:Reclamation m WHERE m.idetab=$id ";
//        $query = $rec->createQuery($dql);
        $recs = $rec->getRepository(("ReclamationBundle:Reclamation"))->findBy(['idetab' =>$etab]);
        return $this->render('ReclamationBundle:reclamationviews:afficherpart.html.twig', array(
            'reclamations' => $recs

        ));
    }

//front affichage
    public function indexAction(Request $request)
    {

        $em    = $this->getDoctrine()->getManager();


        $rec=$em->getRepository("ReclamationBundle:Reclamation")->findBy(['user' =>$this->container->get('security.token_storage')->getToken()->getUser()->getId()]);


        if($request->getMethod()=="POST") {
            $recc = $em->getRepository('ReclamationBundle:Reclamation')->findBy(['objet'=>$request->get('objet'),'user'=>$this->container->get('security.token_storage')->getToken()->getUser()->getId()]);

            return $this->render('ReclamationBundle:reclamationviews:afficher.html.twig', array('reclamations' => $recc

            ));
        }
        return $this->render('ReclamationBundle:reclamationviews:afficher.html.twig',
            array('reclamations'=>$rec,
               )

        );
    }


}