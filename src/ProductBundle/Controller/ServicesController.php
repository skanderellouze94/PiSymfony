<?php

namespace ProductBundle\Controller;

use ProductBundle\Entity\Services;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ServicesController extends Controller
{

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $services = $em->getRepository('ProductBundle:Services')->findAll();

        return $this->render('services/index.html.twig', array(
            'services' => $services,
        ));
    }


    public function newAction(Request $request)
    {
        $service = new Services();

        if ($request->isMethod('post') && $request->get('submit')) {
            $service->setNom($request->get('nom'));
            $service->setDescription($request->get('description'));
            $service->setTarif($request->get('tarif'));
            $em = $this->getDoctrine()->getManager();
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


    public function deleteAction(Services $service)
    {
        $em = $this->getDoctrine()->getManager();
        $service = $em->getRepository('ProductBundle:Services')->find($service);
        $em->remove($service);
        $em->flush();
        return $this->redirectToRoute('services_index');
    }

}
