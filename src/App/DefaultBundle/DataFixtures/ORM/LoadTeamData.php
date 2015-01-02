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
            'zend' => 'http://www.zend.com/en/yellow-pages/ZEND026206',
            'en' => [
                'name' => 'Sergey Lunyov'
            ]
        ],
        [
            'name' =>'Николай Малинин',
            'photo' => 'kolya.jpeg',
            'email' => 'nikolay@evercodelab.com',
            'twitter' => '',
            'github' => 'Neyaz',
            'zend' => 'http://www.zend.com/en/yellow-pages/ZEND025233',
            'en' => [
                'name' => 'Nikolay Malinin'
            ]

        ],
        [
            'name' =>'Михаил Голодяев',
            'photo' => 'misha.jpeg',
            'email' => 'misha@evercodelab.com',
            'twitter' => '',
            'github' => 'golodyaevm',
            'zend' => 'http://www.zend.com/en/yellow-pages/ZEND026245',
            'en' => [
                'name' => 'Mihail Golodyaev'
            ]
        ],
        [
            'name' =>'Дмитрий Константинов',
            'photo' => 'dima.jpeg',
            'email' => 'dima@evercodelab.com',
            'twitter' => '',
            'github' => 'KoD2012',
            'zend' => '',
            'en' => [
                'name' => 'Dmitrij Konstantinov'
            ]
        ],
        [
            'name' =>'Никита Мовшин',
            'photo' => 'nikita.jpeg',
            'email' => 'nikita@evercodelab.com',
            'twitter' => 'MovshinNikita',
            'github' => 'movshin',
            'zend' => '',
            'en' => [
                'name' => 'Nikita Movshin'
            ]
        ],
        [
            'name' =>'Рома Лапин',
            'photo' => 'roma.jpeg',
            'email' => 'roma@evercodelab.com',
            'twitter' => 'memphys',
            'github' => 'memphys',
            'zend' => 'http://www.zend.com/en/yellow-pages/ZEND014246',
            'en' => [
                'name' => 'Roma Lapin'
            ]
        ],
    ];

    public function load(ObjectManager $manager)
    {
        $translator = $manager->getRepository('GedmoTranslatable:Translation');

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
            $awesomeGuy->setZend($memberData['zend']);
            copy(getcwd().'/web/i/team/' . $memberData['photo'], $imagesDestinationDir . DIRECTORY_SEPARATOR . $memberData['photo']);
            $awesomeGuy->setPhoto($memberData['photo']);

            $translator->translate($awesomeGuy, 'name', 'en', $memberData['en']['name']);

            $manager->persist($awesomeGuy);
            $manager->flush();

        }
    }

    public function getOrder()
    {
        return 2; // the order in which fixtures will be loaded
    }
}
