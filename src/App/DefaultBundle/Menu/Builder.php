<?php
namespace App\DefaultBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        $menu->addChild('Главная', array('route' => 'index'));
        $menu->addChild('Портфолио', array('route' => 'portfolio'));
        $menu->addChild('Блог', array('uri' => '//blog.evercodelab.com'));

        $menu->setCurrentUri($this->container->get('request')->getRequestUri());

        return $menu;
    }

    public function languageMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'language');

        $ru = $menu->addChild('ru', array('uri' => '#'));
        $ru->setCurrent(true);
        $menu->addChild('en', array('uri' => '#'));

        return $menu;
    }
}