<?php


namespace Hunter\FrontendBundle\Controller;


use Hunter\EntityBundle\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Hunter\EntityBundle\Entity\PostCategory;
use Symfony\Component\HttpFoundation\Request;

class BlogController extends Controller
{
    /**
     * @Template()
     * @param Request $request
     * @return array
     */
    public function indexAction(Request $request)
    {
        $posts = $this->getDoctrine()->getRepository('HunterEntityBundle:Post')->findBy([], ['createdAt' => 'desc']);

        return [
            'posts' => $posts
        ];
    }

    /**
     * @Template()
     * @param Request $request
     * @param PostCategory $category
     * @return array
     */
    public function categoryAction(Request $request, PostCategory $category)
    {
        return [
            'category' => $category
        ];
    }

    /**
     * @Template()
     * @param Request $request
     * @param Post $post
     * @return array
     */
    public function postAction(Request $request, Post $post)
    {
        return [
            'post' => $post
        ];
    }
}