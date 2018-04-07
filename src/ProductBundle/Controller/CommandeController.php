<?php

namespace ProductBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CommandeController extends Controller
{
    /**
     * @Security("has_role('ROLE_USER')")
     */
    public function ShowUAction()
    {
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        $commands = $em->getRepository('ProductBundle:Commande')
            ->findBy(['idUser'=>$user]);
        return $this->render('ProductBundle:Commande:CommandeU.html.twig', array(
            'commands'=>$commands
        ));
    }

    public function ShowPAction()
    {
        return $this->render('ProductBundle:Commande:CommandeU.html.twig', array(
            // ...
        ));
    }

    /**
     * @Security("has_role('ROLE_USER')")
     */
    public function ShowCAction($idc){
        $em = $this->getDoctrine()->getManager();
        $dc = $em->getRepository('ProductBundle:DetailCommande')
            ->findBy(['commande'=>$idc]);
        return $this->render('ProductBundle:Commande:DetailC.html.twig', array(
            'dc'=>$dc
        ));

    }

}
