<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 22/03/2018
 * Time: 13:29
 */

namespace AnnonceBundle\Controller;


use AnnonceBundle\Entity\Annonce;
use AnnonceBundle\Form\RechercheAjaxAnnonceType;
use AnnonceBundle\Form\RechercheAnnonceType;
//use http\Env\Response;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class AnnonceController extends Controller
{
    public function AjouterAnnonceAction(Request $request)
    {
        $annonce = new Annonce();
        $form = $this->createForm('AnnonceBundle\Form\AnnonceType', $annonce);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $annonce->setDateCreation(new \DateTime('now'));
            if ($annonce->getDateCreation() < $annonce->getDateExpiration()) {
                $em = $this->getDoctrine()->getManager();
                $annonce->setIdPartenaire( $this->container->get('security.token_storage')->getToken()->getUser());
                $em->persist($annonce);
                $em->flush();
            }
            else{
                return $this->render('AnnonceBundle:AnnonceViews:erreur.html.twig');
            }
        }
        return $this->render('AnnonceBundle:AnnonceViews:AjouterAnnonce.html.twig', array(
            'Form' => $form->createView()
        ));
    }




    public function AfficherAnnonceAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        if($request->isXmlHttpRequest() && $request->isMethod('post')){
            $annoce = $em->getRepository('AnnonceBundle:Annonce')
                ->findBy(array('domaine'=>$request->get('serie')));
            $serializer = new Serializer(array(new ObjectNormalizer()));
            $data = $serializer->normalize($annoce);
            return new JsonResponse($data);
        }
        $em = $this->getDoctrine()->getManager();
        $annonce = $em->getRepository("AnnonceBundle:Annonce")->findAll();
        return $this->render('AnnonceBundle:AnnonceViews:AfficherAnnonce.html.twig', array("a" => $annonce
        ));
    }

    public function AfficherAnnoncesAction()
    {
        $annonce = new Annonce();
        $em    = $this->getDoctrine()->getManager();
        $annonce=$em->getRepository("AnnonceBundle:Annonce")->findBy(['idPartenaire' =>$this->container->get('security.token_storage')->getToken()->getUser()->getId()]);

        return $this->render('AnnonceBundle:AnnonceViews:AfficherAnnonceParPartenaire.html.twig',
            array('a'=>$annonce
            )
        );
    }

    public function SupprimerAnnonceAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $annonce = $em->getRepository("AnnonceBundle:Annonce")->find($id);
        $cand= $em->getRepository("AnnonceBundle:Candidature")->findBy(['idAnnonce'=>$annonce]);
        if($cand!=null)
//        { throw new \Exception('m3ebi');}
//        {return $this->redirectToRoute('afficher_annonce_part', array());}
{return $this->render('AnnonceBundle:AnnonceViews:erreur.html.twig', array());}
        if ($annonce->getDateExpiration() >= $annonce->getDateExpiration())
        $em->remove($annonce);
        $em->flush();
        return $this->render('afficher_annonce_part', array());
//        return $this->render('AnnonceBundle:AnnonceViews:SupprimerAnnonce.html.twig', array());
//        return new Response("Votre Annonce a été supprimée");
    }

    public function ModifierAnnonceAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();
        $annonce = $em->getRepository("AnnonceBundle:Annonce")->find($id);
        $form = $this->createForm('AnnonceBundle\Form\AnnonceType', $annonce);
        $form->handleRequest($request);
        $em->persist($annonce);
        $em->flush();


        return $this->render('AnnonceBundle:AnnonceViews:ModifierAnnonce.html.twig', array(
            'Form' => $form->createView()
        ));
        return $this->render('AnnonceBundle:AnnonceViews:AfficherAnnonce.html.twig', array("a" => $annonce));
    }

    public function chercherAction(Request $request){
        $em=$this->getDoctrine()->getManager();
        $annonce = new Annonce();
        $form=$this->createForm(RechercheAnnonceType::class,$annonce);
        $form->handleRequest($request);
        $annonce = $em->getRepository(("AnnonceBundle:Annonce"))
            ->findBy(array("domaine"=>$annonce->getDomaine()));
        return $this->render('AnnonceBundle:AnnonceViews:RechercherAnnonce.html.twig', array('Form' => $form->createView(),"a" => $annonce
        ));
    }

    public function RechercherAction (Request $request)
    {
        if ($request->isXmlHttpRequest() && $request->isMethod('post')) {

            $domaine = $request->get('domaine');
            $em = $this->getDoctrine()->getManager();
            $query = $em->getRepository('AnnonceBundle:Annonce')->createQueryBuilder('a');
            $annonce = $query->where($query->expr()->like('a.domaine', ':p'))
                ->setParameter('p', '%' . $domaine . '%')
                ->getQuery()->getResult();

            $response = $this->render('AnnonceBundle:AnnonceViews:Search.html.twig', array('all' => $annonce));
            return new JsonResponse($response);
        }
            return new JsonResponse(array("status" => true));
    }


    public function EffacerAnnonceDateExpirationAction()
    {
        $em = $this->getDoctrine()->getManager();
        $annonce = $em->getRepository('AnnonceBundle:Annonce')->findAll();
        $date = (new \DateTime('now'));
        foreach ( $annonce as $annonce)
        {
            if($annonce->getDateExpiration()<$date)
            {
                $em->remove($annonce);
                $em->flush();
                $annonce=$em->getRepository("AnnonceBundle:Annonce")->findBy(['idPartenaire' =>$this->container->get('security.token_storage')->getToken()->getUser()->getId()]);

            }
        }
        return $this->render('AnnonceBundle:AnnonceViews:AfficherAnnonceParPartenaire.html.twig',
            array('a'=>$annonce
            )
        );
    }


    public function RechercheDomaineDQLAction(Request $request)
    {
        $annonces = new Annonce();
        $em=$this->getDoctrine()->getManager();
        $annonce=$em->getRepository('AnnonceBundle:Annonce')->findAll();
        $form=$this->createForm(RechercheAjaxAnnonceType::class,$annonces);
        $form->handleRequest($request);
        if ($request->isXmlHttpRequest())
        {
            $serializer = new Serializer(array(new ObjectNormalizer()));
            $annonce=$em->getRepository('AnnonceBundle:Annonce')
                ->findSerieDQL($request->get('domaine'));
            $data=$serializer->normalize($annonce);
            return new JsonResponse($data);
        }
        return $this->render('AnnonceBundle:AnnonceViews:Search.html.twig',array('annonce' => $annonce,'form'=>$form->createView()));

    }


}