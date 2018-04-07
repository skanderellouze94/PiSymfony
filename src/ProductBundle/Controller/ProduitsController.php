<?php

namespace ProductBundle\Controller;

use ProductBundle\Entity\Produits;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Produit controller.
 *
 */
class ProduitsController extends Controller
{


    public function indexAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $dql   = "SELECT p FROM ProductBundle:Produits p";
        $query = $em->createQuery($dql);

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            9
        );
        return $this->render('ProductBundle:produits:index.html.twig', array(
            'pagination' => $pagination
        ));
    }



    public function showAction(Produits $produit)
    {


        $em = $this->getDoctrine()->getManager();
        if($produit->getType() === "para"){
            $p = $em->getRepository('ProductBundle:ProduitParapharmacie')->find($produit);
            return $this->render('ProductBundle:produits:showPara.html.twig', array(
                'produit' => $p,

            ));
        }
        elseif ($produit->getType() == "herbo"){
            $p = $em->getRepository('ProductBundle:ProduitHerbo')->find($produit);
            return $this->render('ProductBundle:produits:showHerbo.html.twig', array(
                'produit' => $p,

            ));

        }
        elseif ($produit->getType()== "pharma"){
            $p = $em->getRepository('ProductBundle:ProduitPharmaceutique')->find($produit);
            return $this->render('ProductBundle:produits:showPharma.html.twig', array(
                'produit' => $p,

            ));
        }
        else{
            $p = $em->getRepository('ProductBundle:ProduitSalledesport')->find($produit);
            return $this->render('ProductBundle:produits:showSalle.html.twig', array(
                'produit' => $p,

            ));
        }
    }


    public function editAction(Request $request, Produits $produit)
    {
        $deleteForm = $this->createDeleteForm($produit);
        $editForm = $this->createForm('ProductBundle\Form\ProduitsType', $produit);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('produits_edit', array('idProduit' => $produit->getIdproduit()));
        }

        return $this->render('ProductBundle/produits/edit.html.twig', array(
            'produit' => $produit,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a produit entity.
     *
     */
    public function deleteAction(Request $request, Produits $produit)
    {
        $form = $this->createDeleteForm($produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($produit);
            $em->flush();
        }

        return $this->redirectToRoute('produits_index');
    }

    /**
     * Creates a form to delete a produit entity.
     *
     * @param Produits $produit The produit entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Produits $produit)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('produits_delete', array('idProduit' => $produit->getIdproduit())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
