<?php

namespace ProductBundle\Controller;

use ProductBundle\Entity\Services;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ServicesController extends Controller
{
    /**
     * @Security("has_role('ROLE_PARTENAIRE')")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user =$this->container->get('security.token_storage')->getToken()->getUser();
        $etab = $em->getRepository('EtablissementBundle:Etablissements')->findBy(array('user'=>$user));
        $services = $em->getRepository('ProductBundle:Services')->findBy(array('idEtab'=>$etab));

        return $this->render('services/index.html.twig', array(
            'services' => $services,
        ));
    }

    /**
     * @Security("has_role('ROLE_PARTENAIRE')")
     */
    public function newAction(Request $request)
    {
        $service = new Services();
        $em = $this->getDoctrine()->getManager();
        if ($request->isMethod('post') && $request->get('submit')) {
            $service->setNom($request->get('nom'));
            $service->setDescription($request->get('description'));
            $service->setTarif($request->get('tarif'));
            $user =$this->container->get('security.token_storage')->getToken()->getUser();
            $etab = $em->getRepository('EtablissementBundle:Etablissements')->findBy(array('user'=>$user));
            $service->setIdEtab($etab[0]);
            $em->persist($service);
            $em->flush();

            return $this->redirectToRoute('services_index');
        }

        return $this->render('services/new.html.twig', array(
            'service' => $service,
        ));
    }


    public function showAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $dql = "SELECT s FROM ProductBundle:Services s";
        $query = $em->createQuery($dql);

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            3
        );

        return $this->render('services/show.html.twig', array(
            'service' => $pagination,
        ));
    }

    /**
     * @Security("has_role('ROLE_PARTENAIRE')")
     */
    public function editAction(Request $request, Services $s)
    {
        $em = $this->getDoctrine()->getManager();
        $service = $em->getRepository('ProductBundle:Services')->find($s);
        if ($request->isMethod('post') && $request->get('submit')) {
            $service->setNom($request->get('nom'));
            $service->setDescription($request->get('description'));
            $service->setTarif($request->get('tarif'));
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('services_index');
        }

        return $this->render('services/edit.html.twig', array(
            'service' => $service,
        ));
    }

    /**
     * @Security("has_role('ROLE_PARTENAIRE')")
     */
    public function deleteAction(Services $service)
    {
        $em = $this->getDoctrine()->getManager();
        $service = $em->getRepository('ProductBundle:Services')->find($service);
        $em->remove($service);
        $em->flush();
        return $this->redirectToRoute('services_index');
    }

}
