<?php


namespace Hunter\FrontendBundle\Menu;


use Knp\Menu\FactoryInterface;

class Builder
{
    /** @var FactoryInterface $factory */
    private $factory;

    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @param array $options
     * @return \Knp\Menu\ItemInterface
     */
    public function createNavMenu(array $options)
    {
        $menu = $this->factory->createItem('root');

        $menu->addChild(
            'frontend.menu.nav.shop',
            [
                'route' => 'hunter_frontend_shop_index',
                'extras' => [
                    'routes' => [
                        ['route' => 'hunter_frontend_shop_category'],
                        ['route' => 'hunter_frontend_shop_product'],
                    ]
                ]
            ]
        );
        $menu->addChild(
            'frontend.menu.nav.blog',
            [
                'route' => 'hunter_frontend_blog_index',
                'extras' => [
                    'routes' => [
                        ['route' => 'hunter_frontend_blog_category'],
                        ['route' => 'hunter_frontend_blog_post'],
                    ]
                ]
            ]
        );
        $menu->addChild('frontend.menu.nav.about', ['route' => 'hunter_frontend_about']);

        return $menu;
    }
}