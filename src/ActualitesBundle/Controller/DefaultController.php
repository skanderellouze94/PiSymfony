<?php

namespace ActualitesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ActualitesBundle:Default:index.html.twig');
    }
}
