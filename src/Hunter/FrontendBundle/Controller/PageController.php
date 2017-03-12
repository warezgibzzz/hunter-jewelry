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
        $productManager = $this->getDoctrine()->getRepository('HunterEntityBundle:Product');

        $featured = $productManager->findBy(['isFeatured' => true], ['createdAt' => 'DESC'], 5);
        $recent = $productManager->findBy([], ['createdAt' => 'DESC'], 6);

        return [
            'featured' => $featured,
            'recent' => $recent
        ];
    }

    /**
     * @Template()
     */
    public function aboutAction()
    {
        return [];
    }
}
