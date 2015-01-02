<?php

namespace App\DefaultBundle\DataFixtures\ORM;

use App\DefaultBundle\Entity\Client;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadClientData extends AbstractFixture implements OrderedFixtureInterface
{

    protected $clients = [
        [
            'name' => 'ИТМО',
            'logo' => 'cl.ifmo.png',
            'link' => 'http://www.ifmo.ru/',
            'name_en' => 'ITMO'
        ],
        [
            'name' => 'ЕУСПб',
            'logo' => 'cl.euro.png',
            'link' => 'http://www.eu.spb.ru/',
            'name_en' => 'EUSPB'
        ],
        [
            'name' => 'Reksoft',
            'logo' => 'cl.reksoft.png',
            'link' => 'http://blog.evercodelab.com/reksoft/',
            'name_en' => 'Reksoft'
        ],
        [
            'name' => 'Kelnik Studios',
            'logo' => 'cl.kelnik.png',
            'link' => 'http://kelnik.ru/',
            'name_en' => 'Kelnik Studios',
        ],
        [
            'name' => 'Red Fortress',
            'logo' => 'cl.redfor.png',
            'link' => 'http://redfor.ru/',
            'name_en' => 'Red Fortress',
        ],
    ];

    public function load(ObjectManager $manager)
    {
        $imagesDestinationDir = getcwd() . '/web/uploads/images/clients';
        if (! file_exists($imagesDestinationDir)) {
            mkdir($imagesDestinationDir, 0777, true);
        }
        foreach ($this->clients as $clientData) {
            $client = new Client();
            $client->setName($clientData['name']);
            $client->setLink($clientData['link']);
            copy(getcwd() . '/web/i/' . $clientData['logo'], $imagesDestinationDir . DIRECTORY_SEPARATOR . $clientData['logo']);
            $client->setLogo($clientData['logo']);
            $manager->persist($client);

            $manager->flush();
        }
    }

    public function getOrder()
    {
        return 2; // the order in which fixtures will be loaded
    }
}
