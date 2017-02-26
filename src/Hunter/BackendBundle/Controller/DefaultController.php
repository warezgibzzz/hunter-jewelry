<?php

namespace Hunter\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('HunterBackendBundle:Default:index.html.twig');
    }
}
