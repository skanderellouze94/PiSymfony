<?php

namespace ProductBundle\Controller;

use ProductBundle\Entity\Commande;
use ProductBundle\Entity\DetailCommande;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PanierController extends Controller
{
    public function AjouterAction(Request $request,$id)
    {
        $session = $this->get('session');

        if (!$session->has('panier')) $session->set('panier',array());
        $panier = $session->get('panier');

        if (array_key_exists($id, $panier)) {
            if ($request->get('qte') != null){
                $panier[$id] = $request->get('qte');
               $this->get('session')->getFlashBag()->add('success','Quantité modifié avec succès');
            }
            else {
                $panier[$id] = $panier[$id] + 1;
            }
        } else {
            if ($request->get('qte') != null){
                $panier[$id] = $request->get('qte');
            $this->get('session')->getFlashBag()->add('success','qte ajouté avec succès');
            }
        else{
                $panier[$id] = 1;

            $this->get('session')->getFlashBag()->add('success','Article ajouté avec succès');
        }
            }

        $session->set('panier',$panier);
        $loader = new \Twig_Loader_Filesystem();
        $twig = new \Twig_Environment($loader);
        $twig->addGlobal('panier', $session->get('panier'));

        return $this->redirect($this->generateUrl('produits_index'));

    }

    public function SupprimmerAction($id)
    {
        $session = $this->get('session');
        $panier = $session->get('panier');

        if (array_key_exists($id, $panier))
        {
            unset($panier[$id]);
            $session->set('panier',$panier);
        }

        return $this->redirect($this->generateUrl('P_basket'));
    }


    /**
     * @Security("has_role('ROLE_USER')")
     */
    public function PassAction()
    {
        $session = $this->get('session');
        $panier = $session->get('panier');

        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository('ProductBundle:Produits')->findArray(array_keys($session->get('panier')));
        $commande = new Commande();
        $em2 = $this->getDoctrine()->getManager();
        $commande->setType('demande');
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $commande->setIdUser($user);
        $em2->persist($commande);
        $em2->flush();
        foreach ($produits as $p){
            $detailC = new DetailCommande();
            $detailC->setProduit($p);
            $detailC->setQuantite($panier[$p->getIdProduit()]);
            $detailC->setCommande($commande);
            $em1 = $this->getDoctrine()->getManager();
            $em1->persist($detailC);
            $em1->flush();
        }
        $em3= $this->getDoctrine()->getManager();
        $dc = $em3->getRepository('ProductBundle:DetailCommande')
            ->findby(['commande'=>$commande]);
        return $this->get('knp_snappy.pdf')->generateFromHtml(
            $this->renderView(
                'ProductBundle:Commande:Facture.html.twig',
                array(
                    'dc'  => $dc,
                    'c'=>$commande
                )
            ),
            'Facture'.$commande->getIdCommande().'.pdf'
        );
        $session->remove('panier');
        return $this->redirect($this->generateUrl('P_basket'));

    }

    public function BasketAction()
    {
        $session = $this->get('session');
        if (!$session->has('panier')) $session->set('panier', array());

        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository('ProductBundle:Produits')->findArray(array_keys($session->get('panier')));


        return $this->render('ProductBundle:Panier:basket.html.twig', array(
        'produits' => $produits, 'panier' => $session->get('panier')));
    }

}
