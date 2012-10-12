<?php

namespace App\DefaultBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use App\DefaultBundle\Entity\Portfolio;

class LoadProjectData extends AbstractFixture implements OrderedFixtureInterface
{


//Внутренние и Open Source проекты:
//http://php-guide.evercodelab.com/
//http://thebookofknowledge.evercodelab.com/
//Бандлы для Symfony2:
//https://github.com/EvercodeLab/FaqBundle
//https://github.com/EvercodeLab/BannerBundle
//https://github.com/EvercodeLab/EvercodePageBundle

    protected $projects = array(
        array(
            'name' =>'ITOP',
            'link' => 'http://itop-portal.net/',
            'description' => '',
        ),
        array(
            'name' =>'Manaflask',
            'link' => 'http://manaflask.com/en/',
            'description' => '',
        ),
        array(
            'name' =>'Noob-Club',
            'link' => 'http://www.noob-club.ru/',
            'description' => '',
        ),
        array(
            'name' =>'Игра «Морской Бой»',
            'link' => 'http://bqbs.ru/',
            'description' => '',
        ),
        array(
            'name' =>'Saraswati.Pro',
            'link' => 'http://saraswati.pro/',
            'description' => ' Digital Publishing for iPad',
        ),
        array(
            'name' =>'Mahamandala',
            'link' => 'http://mahamandala.com/',
            'description' => '',
        ),
        array(
            'name' =>'DropNotify',
            'link' => 'http://dropnotify.evercodelab.com/',
            'description' => '',
        ),
        array(
            'name' =>'The Book of Knowledge',
            'link' => 'http://thebookofknowledge.evercodelab.com/',
            'description' => '',
        ),
        array(
            'name' =>'PHP Study Guide',
            'link' => 'http://php-guide.evercodelab.com/',
            'description' => '',
        ),
        array(
            'name' =>'FaqBundle',
            'link' => 'https://github.com/EvercodeLab/FaqBundle',
            'description' => '',
        ),
        array(
            'name' =>'BannerBundle',
            'link' => 'https://github.com/EvercodeLab/BannerBundle',
            'description' => '',
        ),
        array(
            'name' =>'EvercodePageBundle',
            'link' => 'https://github.com/EvercodeLab/EvercodePageBundle',
            'description' => '',
        ),
    );

    public function load(ObjectManager $manager)
    {
        foreach ($this->projects as $data) {
            $project = new Portfolio();
            $project->setName($data['name']);
            $project->setLink($data['link']);
            $project->setDescription($data['description']);

            $manager->persist($project);
            $manager->flush();
        }
    }

    public function getOrder()
    {
        return 3; // the order in which fixtures will be loaded
    }
}
