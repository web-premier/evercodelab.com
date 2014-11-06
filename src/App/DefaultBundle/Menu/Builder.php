<?php
namespace App\DefaultBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        $menu->addChild('menu.main', ['route' => 'index']);
        $menu->addChild('menu.portfolio', ['route' => 'portfolio']);
        $menu->addChild('menu.blog', ['uri' => '//blog.evercodelab.com']);

        $menu->setCurrentUri($this->container->get('request')->getRequestUri());

        return $menu;
    }

    public function languageMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'language');

        $route = $this->container->get('request')->get('_route');

        $menu->addChild('ru', ['route' => $route, 'routeParameters' => ['_locale' => 'ru']]);
        $menu->addChild('en', ['route' => $route, 'routeParameters' => ['_locale' => 'en']]);

        $menu->setCurrentUri($this->container->get('request')->getRequestUri());

        return $menu;
    }
}
