<?php

namespace Hunter\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class PageController extends Controller
{
    /**
     * @Template()
     * @return array
     */
    public function indexAction()
    {
        return [];
    }
}
