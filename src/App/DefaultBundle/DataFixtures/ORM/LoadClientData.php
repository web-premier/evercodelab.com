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
            'logo' => 'cl.ifmo.png'
        ),
        array(
            'name' =>'ЕУСПб',
            'logo' => 'cl.euro.png'
        ),
        array(
            'name' =>'Reksoft',
            'logo' => 'cl.reksoft.png'
        ),
        array(
            'name' =>'Kelnik Studios',
            'logo' => 'cl.kelnik.png'
        ),
        array(
            'name' =>'Red Fortress',
            'logo' => 'cl.redfor.png'
        ),
    );

    public function load(ObjectManager $manager)
    {
        foreach ($this->clients as $clientData) {
            $client = new Client();
            $client->setName($clientData['name']);
            copy(getcwd().'/web/i/' . $clientData['logo'], getcwd().'/web/uploads/images/clients/' . $clientData['logo']);
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
