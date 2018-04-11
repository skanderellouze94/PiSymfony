<?php

namespace ProductBundle\Controller;

use ProductBundle\Entity\ProduitPharmaceutique;
use ProductBundle\Entity\Produits;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;

class ProduitPharmaceutiqueController extends Controller
{

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $produitPharmaceutiques = $em->getRepository('ProductBundle:ProduitPharmaceutique')->findAll();

        return $this->render('produitpharmaceutique/index.html.twig', array(
            'produitPharmaceutiques' => $produitPharmaceutiques,
        ));
    }


    public function newAction(Request $request)
    {
        $produitPharmaceutique = new Produitpharmaceutique();
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
            $produitPharmaceutique->setMarque($request->get('marque'));
            $produitPharmaceutique->setModeAdministration($request->get('modeA'));
            $produitPharmaceutique->setForme($request->get('forme'));
            $produitPharmaceutique->setPourqui($request->get('PourQui'));
            $produitPharmaceutique->setIdProduit($produit);
            $em1->persist($produitPharmaceutique);
            $em1->flush();

            return $this->redirectToRoute('produitpharmaceutique_show', array('idProduit' => $produitPharmaceutique->getIdproduit()->getIdproduit()));
        }

        return $this->render('produitpharmaceutique/new.html.twig', array(
            'produitPharmaceutique' => $produitPharmaceutique,
            'form' => $form->createView(),
        ));
    }

    public function showAction(ProduitPharmaceutique $produitPharmaceutique)
    {

        return $this->render('produitpharmaceutique/show.html.twig', array(
            'produitPharmaceutique' => $produitPharmaceutique,
        ));
    }


    public function editAction(Request $request, ProduitPharmaceutique $produitPharmaceutique)
    {
            $this->getDoctrine()->getManager()->flush();
        $em = $this->getDoctrine()->getManager();
        $produit = $em->getRepository('ProductBundle:Produits')->find($produitPharmaceutique);
        $pPharma = $em->getRepository('ProductBundle:ProduitPharmaceutique')->find($produitPharmaceutique);
        $form = $this->createFormBuilder($produit)
            ->add('image', FileType::class, array('data_class' => null, 'label' => false))
            ->getForm();
        $form->handleRequest($request);
        if ($request->isMethod('post')) {
            /**
             * @var UploadedFile
             */
            $file = $produit->getImage();
            $fileName = md5(uniqid()) . '.' . $file->guessExtension();
            $file->move(
                $this->getParameter('product_images'), $fileName
            );
            $produit->setDescription($request->get('description'));
            $produit->setImage($fileName);
            $produit->setNom($request->get('nom'));
            $produit->setPrix($request->get('prix'));
            $em = $this->getDoctrine()->getManager();
            $em->persist($produit);
            $em->flush();
            $em1 = $this->getDoctrine()->getManager();
            $pPharma->setMarque($request->get('marque'));
            $pPharma->setCategorie($request->get('categorie'));
            $pPharma->setIdProduit($produit);
            $em1->persist($pPharma);
            $em1->flush();

            return $this->redirectToRoute('produitpharmaceutique_edit', array('idProduit' => $pPharma->getIdproduit()));}

        return $this->render('produitpharmaceutique/edit.html.twig', array(
            'produit' => $pPharma,
            'form' => $form->createView(),
        ));
    }

    public function deleteAction(ProduitPharmaceutique $produitPharmaceutique)
    {
        $em1 = $this->getDoctrine()->getManager();
        $em = $this->getDoctrine()->getManager();

        $produit =$em1->getRepository('ProductBundle:Produits')
            ->find($produitPharmaceutique);
        $pHerbo = $em->getRepository('ProductBundle:ProduitPharmaceutique')
            ->find($produitPharmaceutique);
        $em->remove($pHerbo);
        $em->flush();
        $em1->remove($produit);
        $em1->flush();
        return $this->redirectToRoute('produitpharmaceutique_index');

        }


}
