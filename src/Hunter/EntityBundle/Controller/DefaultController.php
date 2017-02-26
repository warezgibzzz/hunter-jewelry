<?php

namespace Hunter\EntityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('HunterEntityBundle:Default:index.html.twig');
    }
}
