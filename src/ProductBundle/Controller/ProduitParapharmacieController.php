<?php

namespace ProductBundle\Controller;

use ProductBundle\Entity\ProduitParapharmacie;
use ProductBundle\Entity\Produits;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class ProduitParapharmacieController extends Controller
{
    /**
     * @Security("has_role('ROLE_PARTENAIRE')")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user =$this->container->get('security.token_storage')->getToken()->getUser();
        $etab = $em->getRepository('EtablissementBundle:Etablissements')->findBy(array('user'=>$user));
        $produitParapharmacies = $em->getRepository('ProductBundle:ProduitParapharmacie')
            ->findBy(array('idEtab'=>$etab));

        return $this->render('produitparapharmacie/index.html.twig', array(
            'produitParapharmacies' => $produitParapharmacies,
        ));
    }

    /**
     * @Security("has_role('ROLE_PARTENAIRE')")
     */
    public function newAction(Request $request)
    {
        $produitParapharmacie = new Produitparapharmacie();
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
            $produit->setType('para');
            $produit->setNom($request->get('nom'));
            $produit->setPrix($request->get('prix'));
            $user =$this->container->get('security.token_storage')->getToken()->getUser();
            $etab = $em->getRepository('EtablissementBundle:Etablissements')->findBy(array('user'=>$user));
            $produit->setIdEtab($etab[0]);
            $em = $this->getDoctrine()->getManager();
            $em->persist($produit);
            $em->flush();
            $em1 = $this->getDoctrine()->getManager();
            $produitParapharmacie->setMarque($request->get('marque'));
            $produitParapharmacie->setCategorie($request->get('categorie'));
            $produitParapharmacie->setIdProduit($produit);
            $em1->persist($produitParapharmacie);
            $em1->flush();

            return $this->redirectToRoute('produitparapharmacie_show', array('idProduit' => $produitParapharmacie->getIdproduit()->getIdproduit()));
        }

        return $this->render('produitparapharmacie/new.html.twig', array(
            'produitParapharmacie' => $produitParapharmacie,
            'form' =>$form->createView()
        ));
    }
    /**
     * @Security("has_role('ROLE_PARTENAIRE')")
     */
    public function showAction(ProduitParapharmacie $produitParapharmacie)
    {
        $em = $this->getDoctrine()->getManager();
        $pPara = $em->getRepository('ProductBundle:ProduitParapharmacie')->find($produitParapharmacie->getIdProduit()->getIdProduit());

        return $this->render('produitparapharmacie/show.html.twig', array(
            'produitParapharmacie' => $pPara,
        ));
    }

    /**
     * @Security("has_role('ROLE_PARTENAIRE')")
     */
    public function editAction(Request $request, ProduitParapharmacie $produitParapharmacie)
    {
        $em = $this->getDoctrine()->getManager();
        $em1 = $this->getDoctrine()->getManager();
        $produit = $em->getRepository('ProductBundle:Produits')->find($produitParapharmacie);
        $image = $produit->getImage();
        $pHerbo = $em1->getRepository('ProductBundle:ProduitParapharmacie')->find($produitParapharmacie);
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
            $pHerbo->setMarque($request->get('marque'));
            $pHerbo->setCategorie($request->get('categorie'));
            $pHerbo->setIdProduit($produit);
            $em1->persist($pHerbo);
            $em1->flush();
            return $this->redirectToRoute('produitparapharmacie_index');
        }

            return $this->render('produitparapharmacie/edit.html.twig', array(
                'produit' => $produitParapharmacie,
                'form'=>$form->createView()

            ));
    }

    /**
     * @Security("has_role('ROLE_PARTENAIRE')")
     */
    public function deleteAction(ProduitParapharmacie $produitParapharmacie)
    {
        $em = $this->getDoctrine()->getManager();

        $pHerbo = $em->getRepository('ProductBundle:ProduitParapharmacie')
            ->find($produitParapharmacie);
        $em->remove($pHerbo);
        $em->flush();
        return $this->redirectToRoute('produitherbo_index');
    }


}
