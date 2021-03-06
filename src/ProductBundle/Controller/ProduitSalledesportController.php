<?php

namespace ProductBundle\Controller;

use ProductBundle\Entity\Produits;
use ProductBundle\Entity\ProduitSalledesport;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;


class ProduitSalledesportController extends Controller
{
    /**
     * @Security("has_role('ROLE_PARTENAIRE')")
     */
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();
        $user =$this->container->get('security.token_storage')->getToken()->getUser();
        $etab = $em->getRepository('EtablissementBundle:Etablissements')
            ->findBy(array('user'=>$user));
        $produitSalledesports = $em->getRepository('ProductBundle:ProduitSalledesport')
            ->findBy(array('idEtab'=>$etab));

        return $this->render('ProductBundle:produitsalledesport:index.html.twig', array(
            'produitSalledesports' => $produitSalledesports,
        ));
    }

    /**
     * @Security("has_role('ROLE_PARTENAIRE')")
     */
    public function showAction(ProduitSalledesport $produitSalledesport)
    {

        return $this->render('ProductBundle/produitsalledesport/show.html.twig', array(
            'produitSalledesport' => $produitSalledesport,
        ));
    }

    /**
     * @Security("has_role('ROLE_PARTENAIRE')")
     */
    public function newAction(Request $request)
    {
        $produitSalle = new ProduitSalledesport();
        $produit = new Produits();
        $em = $this->getDoctrine()->getManager();
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
            $produit->setType('salle');
            $produit->setNom($request->get('nom'));
            $produit->setPrix($request->get('prix'));
            $user =$this->container->get('security.token_storage')->getToken()->getUser();
            $etab = $em->getRepository('EtablissementBundle:Etablissements')->findBy(array('user'=>$user));
            $produit->setIdEtab($etab[0]);
            $em = $this->getDoctrine()->getManager();
            $em->persist($produit);
            $em->flush();
            $em1 = $this->getDoctrine()->getManager();
            $produitSalle->setType($request->get('type'));
            $em1->persist($produitSalle);
            $em1->flush();

            return $this->redirectToRoute('produitsalledesport_show', array('idProduit' => $produitSalle->getIdproduit()->getIdproduit()));
        }

        return $this->render('ProductBundle:produitsalledesport:new.html.twig', array(
            'produitSalle' => $produitSalle,
            'form' => $form->createView(),
        ));
    }


    /**
     * @Security("has_role('ROLE_PARTENAIRE')")
     */
    public function editAction(Request $request, ProduitSalledesport $produitSalle)
    {
        $em = $this->getDoctrine()->getManager();
        $produit = $em->getRepository('ProductBundle:Produits')->find($produitSalle);
        $image = $produit->getImage();
        $pSalle = $em->getRepository('ProductBundle:ProduitPharmaceutique')->find($produitSalle);
        $form = $this->createFormBuilder($produit)
            ->add('image', FileType::class, array('data_class' => null,
                'label' => false,'required'=>false))
            ->getForm();
        $form->handleRequest($request);
        if ($request->isMethod('post')) {
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
            $pSalle->setMarque($request->get('marque'));
            $pSalle->setCategorie($request->get('categorie'));
            $pSalle->setIdProduit($produit);
            $em1->persist($pSalle);
            $em1->flush();

            return $this->redirectToRoute('produitsalledesport_edit', array('idProduit' => $pSalle->getIdproduit()));}

        return $this->render('ProductBundle/produitsalledesport/edit.html.twig', array(
            'produit' => $pSalle,
            'form' => $form->createView(),
        ));
    }
    /**
     * @Security("has_role('ROLE_PARTENAIRE')")
     */
    public function deleteAction(ProduitSalledesport $produitSalle)
    {
        $em1 = $this->getDoctrine()->getManager();
        $em = $this->getDoctrine()->getManager();

        $produit =$em1->getRepository('ProductBundle:Produits')
            ->find($produitSalle);
        $pSalle = $em->getRepository('ProductBundle:ProduitSalledesport')
            ->find($produitSalle);
        $em->remove($pSalle);
        $em->flush();
        $em1->remove($produit);
        $em1->flush();
        return $this->redirectToRoute('produitsalledesport_index');
    }


}
