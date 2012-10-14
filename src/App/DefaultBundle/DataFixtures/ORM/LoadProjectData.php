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
            'description' => '
                    Российский портал информационных технологий, оптики и фотоники разработан по заказу ИТМО.
                    Наш первый проект на Symfony2 + Doctrine2.
                    Основной функционал разработан за очень сжатые сроки.
                    Подробности <a href="http://blog.evercodelab.com/itop/">в блоге</a>.
                    ',
        ),
        array(
            'name' =>'Manaflask',
            'link' => 'http://manaflask.com/en/',
            'description' => '
                    Manaflask – популярный игровой портал, предоставляющий материалы от топовых мировых игроков на английском и немецком языках.
                    Мы поддерживали старую версию сайта, написанную на PHP. В данный момент при нашем участии создается новая версия сайта на Ruby on Rails.
                    ',
        ),
        array(
            'name' =>'Noob-Club',
            'link' => 'http://www.noob-club.ru/',
            'description' => '
                    Noob-club.ru - фансайт, посвященный многопользовательским онлайн играм World of Warcraft, Diablo и Star Wars: The Old Republic.
                    Сайт написан на PHP c использованием Zend Framework. Оптимизирован под большие нагрузки.
                    ',
        ),
        array(
            'name' =>'Игра «Морской Бой»',
            'link' => 'http://bqbs.ru/',
            'description' => '
                    Движок для уникального и увлекательного квеста в городских условиях от <a href="http://best-quest.ru/">Best Quest</a> на основе всем знакомой с детства игры.
                    Проект реализован на Ruby on Rails.
                    Дизайн нарисовал <a href="http://formazon.com/">Фарид Рафиков</a>.
                    Подробности <a href="http://blog.evercodelab.com/battleship/">в блоге</a>.
                    ',
        ),
        array(
            'name' =>'Saraswati.Pro',
            'link' => 'http://saraswati.pro/',
            'description' => '
                    Издательство Сарасвати (Saraswati) нашло свое второе рождение в Таиланде, городе Чиангмай 20 января 2010 года и выпускает книги не только в традиционном формате, но также в виде цифровых публикаций и интерактивных приложения для iOS и Android.
                    Наш первый проект на Ruby on Rails.
                    Дизайн нарисовал <a href="http://formazon.com/">Фарид Рафиков</a>.
                    ',
        ),
        array(
            'name' =>'Mahamandala',
            'link' => 'http://mahamandala.com/',
            'description' => '
                    Проект был разработан на Zend Framework + Doctrine первых версий. Сейчас портируется на Ruby on Rails.
                    ',
        ),
        array(
            'name' =>'DropNotify',
            'link' => 'http://dropnotify.evercodelab.com/',
            'description' => '
                    Мини-сервис, составляющий красивый дайджест из изменений в ваших файлах и папках Dropbox за день и присылающий его на email.
                    Разработан за пару дней для внутренних нужд. Работает на Google App Engine (Python).
                    Подробности <a href="http://blog.evercodelab.com/dropnotify/">в блоге</a>.
                    ',
        ),
        array(
            'name' =>'The Book of Knowledge',
            'link' => 'http://thebookofknowledge.evercodelab.com/',
            'description' => '
                    Наша постоянно пополняемая база знаний.
                    Спектр тем ограничен рамками нашего любопытства.
                    Находится в открытом доступе.
                    Работает на <a href="https://github.com/mojombo/jekyll">Jekyll</a> и <a href="http://pages.github.com/">github:pages</a>.
                    "When in doubt, consult the Book of Knowledge"
                    ',
        ),
        array(
            'name' =>'PHP Study Guide',
            'link' => 'http://php-guide.evercodelab.com/',
            'description' => '
                    Изначально — краткое руководство для подготовки к <a href="http://www.zend.com/en/services/certification/php-5-certification/">сертификации ZCE PHP5.3</a>.
                    Немного переработано в более общее руководство для изучающих PHP.
                    Находится в открытом доступе.
                    Работает на <a href="https://github.com/mojombo/jekyll">Jekyll</a> и <a href="http://pages.github.com/">github:pages</a>.
                    ',
        ),
        array(
            'name' =>'EvercodeFaqBundle',
            'link' => 'https://github.com/EvercodeLab/FaqBundle',
            'description' => '
                    Простой бандл для фреймворка Symfony2 для быстрой интеграции FAQ в проекты.
                    Находится в открытом доступе.
                    Вопросов не задает, но потенциально на них отвечает.
                    Снижает нагрузку на support в разы.
                    ',
        ),
        array(
            'name' =>'EvercodeBannerBundle',
            'link' => 'https://github.com/EvercodeLab/BannerBundle',
            'description' => '
                    Бандл для фреймворка Symfony2 для работы с баннерами.
                    Находится в открытом доступе.
                    Некоторые говорят, повышает конверсию на проектах, где используется.
                    Умеет не только показывать баннеры, но и считать (яичницу не готовит).
                    ',
        ),
        array(
            'name' =>'EvercodePageBundle',
            'link' => 'https://github.com/EvercodeLab/EvercodePageBundle',
            'description' => '
                    Очень простой экспериментальный бандл для фреймворка Symfony2, добавляющий в проекты функционал работы с информационными страницами.
                    Находится в открытом доступе.
                    Повышает уровень образованности посетителей сайтов на 146%.
                    Улучшает навыки письменной речи.
                    ',
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
