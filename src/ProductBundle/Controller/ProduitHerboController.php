<?php

namespace ProductBundle\Controller;

use ProductBundle\Entity\ProduitHerbo;
use ProductBundle\Entity\Produits;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class ProduitHerboController extends Controller
{

    /**
     * @Security("has_role('ROLE_PARTENAIRE')")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user =$this->container->get('security.token_storage')->getToken()->getUser();
        $etab = $em->getRepository('EtablissementBundle:Etablissements')->findBy(array('user'=>$user));
        $produitHerbos = $em->getRepository('ProductBundle:ProduitHerbo')
                            ->findBy(array('idEtab'=>$etab));

        return $this->render('produitherbo/index.html.twig', array(
            'produitHerbos' => $produitHerbos,
        ));
    }
    /**
     * @Security("has_role('ROLE_PARTENAIRE')")
     */
    public function newAction(Request $request)
    {
        $produitHerbo = new Produitherbo();
        $produit = new Produits();
        $em = $this->getDoctrine()->getManager();

        $form= $this->createFormBuilder($produit)
            ->add('image',FileType::class,array('data_class'=>null ,
                'label' => false))

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
            $produit->setType('herbo');
            $produit->setNom($request->get('nom'));
            $produit->setPrix($request->get('prix'));
            $user =$this->container->get('security.token_storage')->getToken()->getUser();
            $etab = $em->getRepository('EtablissementBundle:Etablissements')->findBy(array('user'=>$user));
            $produit->setIdEtab($etab[0]);
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
    /**
     * @Security("has_role('ROLE_PARTENAIRE')")
     */
    public function showAction(ProduitHerbo $produitHerbo)
    {
        $em = $this->getDoctrine()->getManager();

        $pHerbo = $em->getRepository('ProductBundle:ProduitHerbo')->find($produitHerbo->getIdProduit()->getIdProduit());
        return $this->render('produitherbo/show.html.twig', array(
            'produitHerbo' => $pHerbo,
        ));
    }

    /**
     * @Security("has_role('ROLE_PARTENAIRE')")
     */
    public function editAction(Request $request, ProduitHerbo $produitHerbo)
    {
        $em = $this->getDoctrine()->getManager();
        $produit = $em->getRepository('ProductBundle:Produits')->find($produitHerbo);
        $image = $produit->getImage();
        $pHerbo = $em->getRepository('ProductBundle:ProduitHerbo')->find($produitHerbo);
        $form= $this->createFormBuilder($produit)
            ->add('image',FileType::class,array('data_class'=>null ,
                'label' => false,'required'=>false))
            ->getForm();
        $form->handleRequest($request);
        if ($request->isMethod('post') ) {
            if( ! ($image == $produit->getImage() || $produit->getImage() == null)){
            /**
             * @var UploadedFile
             */
            $file=$produit->getImage();
            $fileName=md5(uniqid()).'.'.$file->guessExtension();
            $file->move(
                $this->getParameter('product_images'),$fileName
            );
                $produit->setImage($fileName);
            }
            else{
                $produit->setImage($image);
            }
            $produit->setDescription($request->get('description'));
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

    /**
     * @Security("has_role('ROLE_PARTENAIRE')")
     */
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
