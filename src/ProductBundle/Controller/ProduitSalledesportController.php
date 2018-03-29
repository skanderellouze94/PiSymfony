<?php

namespace ProductBundle\Controller;

use ProductBundle\Entity\ProduitSalledesport;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


/**
 * Produitsalledesport controller.
 *
 */
class ProduitSalledesportController extends Controller
{
    /**
     * Lists all produitSalledesport entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $produitSalledesports = $em->getRepository('ProductBundle:ProduitSalledesport')->findAll();

        return $this->render('produitsalledesport/index.html.twig', array(
            'produitSalledesports' => $produitSalledesports,
        ));
    }

    /**
     * Finds and displays a produitSalledesport entity.
     *
     */
    public function showAction(ProduitSalledesport $produitSalledesport)
    {

        return $this->render('produitsalledesport/show.html.twig', array(
            'produitSalledesport' => $produitSalledesport,
        ));
    }
}
