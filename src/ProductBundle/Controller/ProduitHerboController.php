<?php

namespace ProductBundle\Controller;

use ProductBundle\Entity\ProduitHerbo;
use ProductBundle\Entity\Produits;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class ProduitHerboController extends Controller
{

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $produitHerbos = $em->getRepository('ProductBundle:ProduitHerbo')
                            ->findAll();

        return $this->render('produitherbo/index.html.twig', array(
            'produitHerbos' => $produitHerbos,
        ));
    }

    public function newAction(Request $request)
    {
        $produitHerbo = new Produitherbo();
        $produit = new Produits();
        $form= $this->createFormBuilder($produit)
            ->add('image',FileType::class,array('data_class'=>null ,'label' => false))

            ->getForm();
        $form->handleRequest($request);
        if ($request->isMethod('post') && $form->isValid() ) {
            /**
             * @var UploadedFile
             */
            $file=$produit->getImage();
            $fileName=md5(uniqid()).'.'.$file->guessExtension();
            $file->move(
                $this->getParameter('product_images'),$fileName
            );
            $produit->setDescription($request->get('description'));
            $produit->setImage($fileName);
            $produit->setNom($request->get('nom'));
            $produit->setPrix($request->get('prix'));
            $em = $this->getDoctrine()->getManager();
            $em->persist($produit);
            $em->flush();
            $em1 = $this->getDoctrine()->getManager();
            if($request->get('bio')){
            $produitHerbo->setBio(1);}
            else{
                $produitHerbo->setBio(0);
            }
            $produitHerbo->setMarque($request->get('marque'));
            $produitHerbo->setCategorie($request->get('categorie'));
            $produitHerbo->setIdProduit($produit);
            $em1->persist($produitHerbo);
            $em1->flush();
            return $this->redirectToRoute('produitherbo_index');
        }

        return $this->render('produitherbo/new.html.twig', array(
            'produitHerbo' => $produitHerbo,
            'form'=>$form->createView()
        ));
    }

    public function showAction(ProduitHerbo $produitHerbo)
    {
        $em = $this->getDoctrine()->getManager();

        $pHerbo = $em->getRepository('ProductBundle:ProduitHerbo')->find($produitHerbo->getIdProduit()->getIdProduit());
        return $this->render('produitherbo/show.html.twig', array(
            'produitHerbo' => $pHerbo,
        ));
    }

    public function editAction(Request $request, ProduitHerbo $produitHerbo)
    {
        $em = $this->getDoctrine()->getManager();
        $produit = $em->getRepository('ProductBundle:Produits')->find($produitHerbo);
        $pHerbo = $em->getRepository('ProductBundle:ProduitHerbo')->find($produitHerbo);
        $form= $this->createFormBuilder($produit)
            ->add('image',FileType::class,array('data_class'=>null ,'label' => false))
            ->getForm();
        $form->handleRequest($request);
        if ($request->isMethod('post') ) {
            /**
             * @var UploadedFile
             */
            $file=$produit->getImage();
            $fileName=md5(uniqid()).'.'.$file->guessExtension();
            $file->move(
                $this->getParameter('product_images'),$fileName
            );
            $produit->setDescription($request->get('description'));
            $produit->setImage($fileName);
            $produit->setNom($request->get('nom'));
            $produit->setPrix($request->get('prix'));
            $em = $this->getDoctrine()->getManager();
            $em->persist($produit);
            $em->flush();
            $em1 = $this->getDoctrine()->getManager();
            if($request->get('bio')){
                $produitHerbo->setBio(1);}
            else{
                $produitHerbo->setBio(0);
            }
            $pHerbo->setMarque($request->get('marque'));
            $pHerbo->setCategorie($request->get('categorie'));
            $pHerbo->setIdProduit($produit);
            $em1->persist($pHerbo);
            $em1->flush();
            return $this->redirectToRoute('produitherbo_index');
        }
        return $this->render('produitherbo/edit.html.twig', array(
            'produitHerbo' => $produitHerbo,
            'form'=>$form->createView()
        ));
    }


    public function deleteAction(ProduitHerbo $produitHerbo)
    {
        $em = $this->getDoctrine()->getManager();

        $pHerbo = $em->getRepository('ProductBundle:ProduitHerbo')
            ->find($produitHerbo);
            $em->remove($pHerbo);
            $em->flush();
        return $this->redirectToRoute('produitherbo_index');
    }

}