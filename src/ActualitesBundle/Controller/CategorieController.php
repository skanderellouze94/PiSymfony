<?php
/**
 * Created by PhpStorm.
 * User: Maha
 * Date: 21/03/2018
 * Time: 12:55
 */

namespace ActualitesBundle\Controller;

use ActualitesBundle\Entity\Categorie;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class CategorieController extends Controller
{
    public function AjouterCategorieAction(Request $request)
    {
        $categorie = new Categorie();
        $form = $this->createForm('ActualitesBundle\Form\CategorieType', $categorie);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            /*          $categorie->setIdUser($user = $this->getUser()->getId());*/
            /*   $categorie->setIdUser(0);*/
            $em->persist($categorie);
            $em->flush();
            return $this->redirectToRoute('afficher');
        }
        return $this->render('ActualitesBundle:CategorieViews:AjouterCategorie.html.twig', array(
            'Form' => $form->createView()
        ));
    }


    public function AfficherCategoriesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $categorie = $em->getRepository("ActualitesBundle:Categorie")->findAll();
        return $this->render('ActualitesBundle:CategorieViews:AfficherCategories.html.twig', array("m" => $categorie
        ));
    }

    public function SupprimerCategorieAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $categorie = $em->getRepository("ActualitesBundle:Categorie")->find($id);

        $em->remove($categorie);
        $em->flush();
        $categorie = $em->getRepository("ActualitesBundle:Categorie")->findAll();
        return $this->render('ActualitesBundle:CategorieViews:AfficherCategories.html.twig',array("m" => $categorie
        ));
    }


    public function ModifierCategorieAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $categorie = $em->getRepository("ActualitesBundle:Categorie")->find($id);
        $form = $this->createForm('ActualitesBundle\Form\CategorieType', $categorie);
        $form->handleRequest($request);
        $em->persist($categorie);
        $em->flush();

        return $this->render('ActualitesBundle:CategorieViews:ModifierCategorie.html.twig', array(
            'Form' => $form->createView()
        ));
    }


/*
    public function ModifierCategorieAction(Request $request, $id)
    {
        $categorie = new Categorie();
        $form = $this->createForm('ActualitesBundle\Form\CategorieType', $categorie);
        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $categorie = $em->getRepository("ActualitesBundle:Categorie")->find($id);
            $form = $this->createForm('ActualitesBundle\Form\CategorieType', $categorie);
            $form->handleRequest($request);
            $em->persist($categorie);
            $em->flush();
            return $this->redirectToRoute('afficher');
        }
        return $this->render('ActualitesBundle:CategorieViews:ModifierCategorie.html.twig', array(
            'Form' => $form->createView()
        ));
    }*/

}



