<?php

namespace App\DefaultBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use App\DefaultBundle\Entity\Client;

class LoadClientData extends AbstractFixture implements OrderedFixtureInterface
{

    protected $clients = array(
        array(
            'name' =>'ИТМО',
            'logo' => 'cl.ifmo.png',
            'link' => 'http://www.ifmo.ru/',
        ),
        array(
            'name' =>'ЕУСПб',
            'logo' => 'cl.euro.png',
            'link' => 'http://www.eu.spb.ru/',
        ),
        array(
            'name' =>'Reksoft',
            'logo' => 'cl.reksoft.png',
            'link' => 'http://blog.evercodelab.com/reksoft/',
        ),
        array(
            'name' =>'Kelnik Studios',
            'logo' => 'cl.kelnik.png',
            'link' => 'http://kelnik.ru/',
        ),
        array(
            'name' =>'Red Fortress',
            'logo' => 'cl.redfor.png',
            'link' => 'http://redfor.ru/',
        ),
    );

    public function load(ObjectManager $manager)
    {
        $imagesDestinationDir = getcwd().'/web/uploads/images/clients';
        if (! file_exists($imagesDestinationDir)) {
            mkdir($imagesDestinationDir, 0777, true);
        }
        foreach ($this->clients as $clientData) {
            $client = new Client();
            $client->setName($clientData['name']);
            $client->setLink($clientData['link']);
            copy(getcwd().'/web/i/' . $clientData['logo'], $imagesDestinationDir . DIRECTORY_SEPARATOR . $clientData['logo']);
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
