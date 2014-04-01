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
            'name' =>'Игорь Адров',
            'photo' => 'igor.jpeg',
            'email' => 'igor@evercodelab.com',
            'twitter' => 'nuclear0',
            'github' => 'nucleartux',
        ],
        [
            'name' =>'Сергей Лунев',
            'photo' => 'sergey.jpeg',
            'email' => 'sergey@evercodelab.com',
            'twitter' => 'lunev_sergey',
            'github' => 'sergeylunev',
        ],
        [
            'name' =>'Петр Сергеев',
            'photo' => 'petr.jpeg',
            'email' => 'petr@evercodelab.com',
            'twitter' => 'i_feya',
            'github' => 'toothfairy',
        ],
        [
            'name' =>'Рома Лапин',
            'photo' => 'roma.jpeg',
            'email' => 'roma@evercodelab.com',
            'twitter' => 'memphys',
            'github' => 'memphys',
        ],
        [
            'name' =>'Илья Гордиенко',
            'photo' => 'ilya.jpeg',
            'email' => 'ilya@evercodelab.com',
            'twitter' => 'ilya_troy',
            'github' => 'Troytft',
        ],
        [
            'name' =>'Николай Малинин',
            'photo' => 'kolya.jpeg',
            'email' => 'nikolay@evercodelab.com',
            'twitter' => '',
            'github' => 'Neyaz',
        ],
        [
            'name' =>'Никита Мовшин',
            'photo' => 'nikita.jpeg',
            'email' => 'nikita@evercodelab.com',
            'twitter' => 'MovshinNikita',
            'github' => 'movshin',
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
