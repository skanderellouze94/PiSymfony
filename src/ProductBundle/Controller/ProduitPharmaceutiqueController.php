<?php

namespace ProductBundle\Controller;

use ProductBundle\Entity\ProduitPharmaceutique;
use ProductBundle\Entity\Produits;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;

class ProduitPharmaceutiqueController extends Controller
{
    /**
     * @Security("has_role('ROLE_PARTENAIRE')")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user =$this->container->get('security.token_storage')->getToken()->getUser();
        $etab = $em->getRepository('EtablissementBundle:Etablissements')->findBy(array('user'=>$user));
        $produitPharmaceutiques = $em->getRepository('ProductBundle:ProduitPharmaceutique')
            ->findBy(array('idEtab'=>$etab));

        return $this->render('produitpharmaceutique/index.html.twig', array(
            'produitPharmaceutiques' => $produitPharmaceutiques,
        ));
    }

    /**
     * @Security("has_role('ROLE_PARTENAIRE')")
     */
    public function newAction(Request $request)
    {
        $produitPharmaceutique = new Produitpharmaceutique();
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
            $produit->setType('pharma');
            $produit->setNom($request->get('nom'));
            $produit->setPrix($request->get('prix'));
            $user =$this->container->get('security.token_storage')->getToken()->getUser();
            $etab = $em->getRepository('EtablissementBundle:Etablissements')->findBy(array('user'=>$user));
            $produit->setIdEtab($etab[0]);

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
    /**
     * @Security("has_role('ROLE_PARTENAIRE')")
     */
    public function showAction(ProduitPharmaceutique $produitPharmaceutique)
    {

        return $this->render('produitpharmaceutique/show.html.twig', array(
            'produitPharmaceutique' => $produitPharmaceutique,
        ));
    }

    /**
     * @Security("has_role('ROLE_PARTENAIRE')")
     */
    public function editAction(Request $request, ProduitPharmaceutique $produitPharmaceutique)
    {
        $this->getDoctrine()->getManager()->flush();
        $em = $this->getDoctrine()->getManager();
        $produit = $em->getRepository('ProductBundle:Produits')->find($produitPharmaceutique);
        $image = $produit->getImage();
        $pPharma = $em->getRepository('ProductBundle:ProduitPharmaceutique')->find($produitPharmaceutique);
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
            $produitPharmaceutique->setMarque($request->get('marque'));
            $produitPharmaceutique->setModeAdministration($request->get('modeA'));
            $produitPharmaceutique->setForme($request->get('forme'));
            $produitPharmaceutique->setPourqui($request->get('PourQui'));
            $pPharma->setIdProduit($produit);
            $em1->persist($pPharma);
            $em1->flush();

            return $this->redirectToRoute('produitpharmaceutique_show', array('idProduit' => $pPharma->getIdproduit()->getIdProduit()));}

        return $this->render('produitpharmaceutique/edit.html.twig', array(
            'produit' => $pPharma,
            'form' => $form->createView(),
        ));
    }
    /**
     * @Security("has_role('ROLE_PARTENAIRE')")
     */
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
