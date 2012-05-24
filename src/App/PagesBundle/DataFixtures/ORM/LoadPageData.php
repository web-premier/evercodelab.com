<?php
namespace App\PagesBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use App\PagesBundle\Entity\Page;
use App\UserBundle\Entity\User;

class LoadPageData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $PageAbout = new Page();
        $PageAbout->setAlias('about');
        $PageAbout->setName('О нас');
        $PageAbout->setText('EvercodeLab / evercodelab');
        $PageAbout->setUser($manager->merge($this->getReference('user-admin')));
        $PageAbout->setCreatedAt(new \DateTime());
        $PageAbout->setUpdatedAt(new \DateTime());

        $manager->persist($PageAbout);
        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}
