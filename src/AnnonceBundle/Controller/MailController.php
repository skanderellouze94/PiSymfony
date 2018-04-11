<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 09/04/2018
 * Time: 17:16
 */

namespace AnnonceBundle\Controller;


use AnnonceBundle\Entity\Mail;
use AnnonceBundle\Form\MailType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Swift_Message;
use Symfony\Component\HttpFoundation\Response;

class MailController extends Controller
{
    public function indexAction(Request $request)
    {    $user = $this->container->get('security.token_storage')->getToken()->getUser();

        $mail = new Mail();
        $form= $this->createForm(MailType::class, $mail);
        $form->handleRequest($request) ;
        if ($form->isValid()) {
            $message = Swift_Message::newInstance()
                ->setSubject('Accuse de réception')
                ->setFrom('EspaceSanteRoot@gmail.com')
                ->setTo($mail->getEmail())
                ->setBody(
                    $this->renderView(
                        'AnnonceBundle:EmailViews:Email.html.twig',
                        array('nom' => $user->getNom(), 'prenom'=>$user->getPrenom())
                    ),
                    'text/html'
                );
            $this->get('mailer')->send($message);
            return $this->redirect($this->generateUrl('my_app_mail_accuse'));
        }
        return $this->render('AnnonceBundle:EmailViews:ReceptionEmail.html.twig',
            array('form'=>$form->createView()));
    }
    public function successAction(){
        return new Response("Email envoyé avec succès, Merci de vérifier votre boîte
mail.");
    }
}
