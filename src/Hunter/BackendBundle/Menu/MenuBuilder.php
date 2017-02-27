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

        $menu->addChild('backend.dashboard', ['route' => 'hunter_backend_homepage']);
        return $menu;
    }
}