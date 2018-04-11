<?php
/**
 * Created by PhpStorm.
 * User: anis
 * Date: 03/04/2018
 * Time: 15:27
 */

namespace ReclamationBundle\Controller;


use ReclamationBundle\Entity\Reponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ReponseController extends Controller
{
    public function insertAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $rec = $em->getRepository(("ReclamationBundle:Reclamation"))->find($id);


        $rdv = new Reponse();


        $form = $this->createForm('ReclamationBundle\Form\ReponseType', $rdv);
        $form->handleRequest($request);
        if ($form->isValid()) {
//            $user = $em->getRepository(("ReclamationBundle:Reclamation"))
//                ->findOneBy(['user' => $rec->getUser()]);
            /*$rdv->setDate((string)$form->getData(date));*/
//            $username = $form["date"]->getData();
            $rdv->setDate(new \DateTime('now'));
            $rdv->setIdrec($rec);
            $em->persist($rdv);
            $rec->setVerified(1);
            $em->persist($rec);
            $em->flush();
            $this->sendNotification();
            return $this->redirectToRoute('index');
        }
        return $this->render('ReclamationBundle:reponseviews:reponse.html.twig', array(
            'Form1' => $form->createView(), 'r'=>$rec

        ));

    }
    /**
     * @Route("/send-notification", name="send_notification")
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function sendNotification()
    {
        $manager = $this->get('mgilet.notification');
        $notif = $manager->createNotification('Vous avez reçu une réponse à votre reclamation');
        $notif->setMessage('Réclamation');
        $notif->setLink('');
        // or the one-line method :
        // $manager->createNotification('Notification subject','Some random text','http://google.fr');

        // you can add a notification to a list of entities
        // the third parameter ``$flush`` allows you to directly flush the entities
        $manager->addNotification(array($this->getUser()), $notif, true);

        return $this->redirectToRoute('index');
    }
    //front affichage
    public function showAction($id)
    {
        $rep = new Reponse();
        $em    = $this->getDoctrine()->getManager();

       $rep = $em->getRepository(("ReclamationBundle:Reponse"))->findOneBy(['idrec'=>$id]);
        $rec = $em->getRepository(("ReclamationBundle:Reclamation"))->findOneBy(['idRec'=>$id]);

//        $rec=$em->getRepository("ReclamationBundle:Reclamation")->findBy(['user' =>$this->container->get('security.token_storage')->getToken()->getUser()->getId()]);

        return $this->render('ReclamationBundle:reponseviews:afficherreponse.html.twig',
            array('r'=>$rep, 'rec'=>$rec
            )
        );
    }

}