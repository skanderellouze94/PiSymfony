<?php

namespace ProductBundle\Controller;

use ProductBundle\Entity\Produits;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * Produit controller.
 *
 */
class ProduitsController extends Controller
{


    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        if($request->isXmlHttpRequest()){

            $serializer = new Serializer(array(new ObjectNormalizer()));
            if ($request->get('all')== "all"){
            $products = $em->getRepository('ProductBundle:Produits')
                ->findProduitByName($request->get('serie'));
            }
            else{
                $types = array();
                $i = 0;
                if($request->get('herbo')!=""){
                    $types[$i] = "herbo";
                    $i = $i +1 ;
                }
                if($request->get('pharma')!=""){
                    $types[$i]= "pharma";
                    $i = $i +1 ;
                }
                if($request->get('para')!=""){
                    $types[$i] = "para";
                    $i = $i +1 ;

                }
                if($request->get('salle')!=""){
                    $types[$i]="salle";

                }
                $products = $em->getRepository('ProductBundle:Produits')
                    ->filterProduit($request->get('serie'),$types);
            }
            $paginator = $this->get('knp_paginator');
            $pagination = $paginator->paginate(
                $products,
                $request->query->getInt('page', 1),
                9
            );
            $data = $serializer->normalize($pagination);


            return new JsonResponse($data);
        }
        else{

            $dql = "SELECT p FROM ProductBundle:Produits p";
            $query = $em->createQuery($dql);

            $paginator = $this->get('knp_paginator');
            $pagination = $paginator->paginate(
                $query,
                $request->query->getInt('page', 1),
                9
            );

            return $this->render('ProductBundle:produits:index.html.twig', array(
                'pagination' => $pagination,

            ));
        }
    }


    public function showAction(Produits $produit)
    {


        $em = $this->getDoctrine()->getManager();
        if ($produit->getType() === "para") {
            $p = $em->getRepository('ProductBundle:ProduitParapharmacie')->find($produit);
            return $this->render('ProductBundle:produits:showPara.html.twig', array(
                'produit' => $p,

            ));
        } elseif ($produit->getType() == "herbo") {
            $p = $em->getRepository('ProductBundle:ProduitHerbo')->find($produit);
            return $this->render('ProductBundle:produits:showHerbo.html.twig', array(
                'produit' => $p,

            ));

        } elseif ($produit->getType() == "pharma") {
            $p = $em->getRepository('ProductBundle:ProduitPharmaceutique')->find($produit);
            return $this->render('ProductBundle:produits:showPharma.html.twig', array(
                'produit' => $p,

            ));
        } else {
            $p = $em->getRepository('ProductBundle:ProduitSalledesport')->find($produit);
            return $this->render('ProductBundle:produits:showSalle.html.twig', array(
                'produit' => $p,

            ));
        }
    }


}
