<?php

namespace App\DefaultBundle\DataFixtures\ORM;

use App\DefaultBundle\Entity\ClientSlider;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadSliderData extends AbstractFixture implements OrderedFixtureInterface
{
    /** @var array */
    private $data = [
        [
            'name' => 'Best4Car',
            'description' => "<ul><li>Разработка на Symfony2</li><li>Работа с унаследованным кодом</li><li>Оптимизация</li><li>Рефакторинг</li><li>Консалтинг</li><li>Поддержка</li></ul>",
            'link' => 'http://best4car.ru'
        ],
        [
            'name' => 'Игра «Морской бой»',
            'description' => '<ul> <li>Разработка на Ruby on Rails</li> <li>Оптимизация под мобильные устройства</li> <li>Консалтинг</li> <li>Поддержка</li> <li>Сопровождение игр</li> </ul>',
            'link' => 'http://bqbs.ru'
        ],
        [
            'name' => 'Postcard With Love',
            'description' => '<ul> <li>Разработка на Ruby on Rails</li> <li>Фильтры и подготовка изображений к печати</li> <li>Поддержка</li> <li>Ми-ми-ми</li> </ul>',
            'link' => 'http://postcardwithlove.ru/'
        ],
        [
            'name' => 'Russian Wake Awards 2013',
            'description' => '<ul> <li>Первая Всероссийская Вейк Премия 2013</li> <li>Разработка на Symfony2</li> <li>Простая CMS на базе SonataAdminBundle</li> <li>Система голосования</li> <li>Разработка в кратчайшие сроки</li> </ul>',
            'link' => 'http://wakeawards.ru/'
        ],
        [
            'name' => 'Manaflask',
            'description' => '<ul> <li>Разработка на Ruby on Rails</li> <li>Международная команда (Германия,
            Финляндия)</li> <li>Поддержка</li> </ul>',
            'link' => "http://manaflask.com/"
        ],
        [
            'name' => 'Popt',
            'description' => '<ul> <li>Разработка на Symfony2</li> <li>Рефакторинг и применеие best practices</li>
            <li>Разработка API для мобильных приложений</li> <li>Разработка веб-части сервиса</li> <li>Международная команда (США, Украина)</li> </ul>',
            'link' => "https://itunes.apple.com/in/app/popt/id759205934?mt=8"
        ]
    ];

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->data as $element) {
            $clientSlide = new ClientSlider();

            $clientSlide->setName($element['name']);
            $clientSlide->setDescription($element['description']);
            $clientSlide->setLink($element['link']);

            $manager->persist($clientSlide);
        }

        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 3;
    }
}
