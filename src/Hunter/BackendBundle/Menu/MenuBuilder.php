<?php


namespace Hunter\BackendBundle\Menu;


use Knp\Menu\FactoryInterface;

class MenuBuilder
{
    private $factory;

    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function createNavbarMenu(array $options)
    {
        $menu = $this->factory->createItem('root');

        $menu->addChild('backend.navbar.menu.dashboard', ['route' => 'hunter_backend_homepage']);
        $menu->addChild('backend.navbar.menu.products', ['route' => 'hunter_backend_product_index']);
        $menu->addChild('backend.navbar.menu.product_categories', ['route' => 'hunter_backend_product_category_index']);

        return $menu;
    }
}