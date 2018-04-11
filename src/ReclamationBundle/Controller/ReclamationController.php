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
            $this->sendNotification();
            return $this->redirectToRoute('afficher');
        }
        return $this->render('ReclamationBundle:reclamationviews:Ajout.html.twig', array(
            'Form' => $form->createView()

        ));

    }
    public function sendNotification()
    {
        $manager = $this->get('mgilet.notification');
        $notif = $manager->createNotification('Vous avez reçu une réclamation');
        $notif->setMessage('Réclamation');
        $notif->setLink('index');
        // or the one-line method :
        // $manager->createNotification('Notification subject','Some random text','http://google.fr');

        // you can add a notification to a list of entities
        // the third parameter ``$flush`` allows you to directly flush the entities
        $manager->addNotification(array($this->getUser()), $notif, true);

        return $this->redirectToRoute('index');
    }

    public function todetailAction($id){

        $rec = $this->getDoctrine()->getManager();
        $notifiableNotifications = $rec->getRepository("MgiletNotificationBundle:NotifiableNotification")->findAll();

        $recs = $rec->getRepository(("ReclamationBundle:Reclamation"))->find($id);
        return $this->render('ReclamationBundle:reclamationviews:details.html.twig', array(
                'rec'=>$recs,'notifiableNotifications'=>$notifiableNotifications
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
            ->findBy(['user' => $id]);
        $notifiableNotifications = $rec->getRepository("MgiletNotificationBundle:NotifiableNotification")->findAll();

        $recs = $rec->getRepository(("ReclamationBundle:Reclamation"))->findBy(['idetab' =>$etab]);
        if($request->getMethod()=="POST") {
            $recc = $rec->getRepository('ReclamationBundle:Reclamation')->findBy(['objet'=>$request->get('objet'),'user'=>$this->container->get('security.token_storage')->getToken()->getUser()->getId()]);

            return $this->render('ReclamationBundle:reclamationviews:afficherpart.html.twig'
                , array('reclamations' => $recc,'notifiableNotifications'=>$notifiableNotifications

            ));
        }

        return $this->render('ReclamationBundle:reclamationviews:afficherpart.html.twig', array(
            'reclamations' => $recs,'notifiableNotifications'=>$notifiableNotifications

        ));
    }

//front affichage
    public function indexAction(Request $request)
    {

        $em    = $this->getDoctrine()->getManager();


        $rec=$em->getRepository("ReclamationBundle:Reclamation")->findBy(['user' =>$this->container->get('security.token_storage')->getToken()->getUser()->getId()]);
        $notifiableNotifications = $em->getRepository("MgiletNotificationBundle:NotifiableNotification")->findAll();


        if($request->getMethod()=="POST") {
            $recc = $em->getRepository('ReclamationBundle:Reclamation')->findBy(['objet'=>$request->get('objet'),'user'=>$this->container->get('security.token_storage')->getToken()->getUser()->getId()]);

            return $this->render('ReclamationBundle:reclamationviews:afficher.html.twig',
                array('reclamations' => $recc,'notifiableNotifications'=>$notifiableNotifications

            ));
        }
        $notifiableNotifications = $em->getRepository("MgiletNotificationBundle:NotifiableNotification")->findAll();

        return $this->render('ReclamationBundle:reclamationviews:afficher.html.twig',
            array('reclamations'=>$rec,'notifiableNotifications'=>$notifiableNotifications
               )

        );
    }


}