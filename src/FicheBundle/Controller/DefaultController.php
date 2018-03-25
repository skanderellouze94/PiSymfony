<?php

namespace FicheBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('FicheBundle:Default:index.html.twig');
    }
}
