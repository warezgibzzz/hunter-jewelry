<?php


namespace Hunter\FrontendBundle\Controller;


use Hunter\EntityBundle\Entity\Product;
use Hunter\EntityBundle\Entity\ProductCategory;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class ShopController extends Controller
{
    /**
     * @Template()
     * @param Request $request
     * @return array
     */
    public function indexAction(Request $request)
    {
        $products = $this->getDoctrine()->getRepository('HunterEntityBundle:Product')->findBy([], ['createdAt' => 'desc']);

        return [
            'products' => $products
        ];
    }

    /**
     * @Template()
     * @param Request $request
     * @param ProductCategory $category
     * @return array
     */
    public function categoryAction(Request $request, ProductCategory $category)
    {
        return [
            'category' => $category
        ];
    }

    /**
     * @Template()
     * @param Request $request
     * @param Product $product
     * @return array
     */
    public function productAction(Request $request, Product $product)
    {
        return [
            'product' => $product
        ];
    }
}