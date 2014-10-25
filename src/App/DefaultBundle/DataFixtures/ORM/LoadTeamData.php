<?php

namespace App\DefaultBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use App\DefaultBundle\Entity\Team;

class LoadTeamData extends AbstractFixture implements OrderedFixtureInterface
{

    protected $teamMembers = [
        [
            'name' =>'Сергей Лунев',
            'photo' => 'sergey.jpeg',
            'email' => 'sergey@evercodelab.com',
            'twitter' => 'lunev_sergey',
            'github' => 'sergeylunev',
        ],
        [
            'name' =>'Николай Малинин',
            'photo' => 'kolya.jpeg',
            'email' => 'nikolay@evercodelab.com',
            'twitter' => '',
            'github' => 'Neyaz',
        ],
        [
            'name' =>'Михаил Голодяев',
            'photo' => 'misha.jpeg',
            'email' => 'misha@evercodelab.com',
            'twitter' => '',
            'github' => 'golodyaevm',
        ],
        [
            'name' =>'Дмитрий Константинов',
            'photo' => 'dima.jpeg',
            'email' => 'dima@evercodelab.com',
            'twitter' => '',
            'github' => 'KoD2012',
        ],
        [
            'name' =>'Никита Мовшин',
            'photo' => 'nikita.jpeg',
            'email' => 'nikita@evercodelab.com',
            'twitter' => 'MovshinNikita',
            'github' => 'movshin',
        ],
        [
            'name' =>'Рома Лапин',
            'photo' => 'roma.jpeg',
            'email' => 'roma@evercodelab.com',
            'twitter' => 'memphys',
            'github' => 'memphys',
        ],
    ];

    public function load(ObjectManager $manager)
    {
        $imagesDestinationDir = getcwd().'/web/uploads/images/team';
        if (! file_exists($imagesDestinationDir)) {
            mkdir($imagesDestinationDir, 0777, true);
        }
        foreach ($this->teamMembers as $memberData) {
            $awesomeGuy = new Team();
            $awesomeGuy->setName($memberData['name']);
            $awesomeGuy->setEmail($memberData['email']);
            $awesomeGuy->setTwitter($memberData['twitter']);
            $awesomeGuy->setGithub($memberData['github']);
            copy(getcwd().'/web/i/team/' . $memberData['photo'], $imagesDestinationDir . DIRECTORY_SEPARATOR . $memberData['photo']);
            $awesomeGuy->setPhoto($memberData['photo']);

            $manager->persist($awesomeGuy);
            $manager->flush();

        }
    }

    public function getOrder()
    {
        return 2; // the order in which fixtures will be loaded
    }
}
