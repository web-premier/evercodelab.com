<?php
// src/App/UserBundle/DataFixtures/ORM/LoadAdminData.php
namespace App\UserBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use App\UserBundle\Entity\User;

class LoadAdminData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $userAdmin = new User();
        $userAdmin->setUsername('admin');
        $userAdmin->setPlainPassword('test');
        $userAdmin->setEnabled(1);
        $userAdmin->setEmail('test@test.local');
        $userAdmin->setRoles(array('ROLE_ADMIN'));

        $manager->persist($userAdmin);
        $manager->flush();

        $this->addReference('user-admin',$userAdmin);
    }

    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}
