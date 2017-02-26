<?php

namespace Hunter\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('HunterFrontendBundle:Default:index.html.twig');
    }
}
