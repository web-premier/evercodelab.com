<?php

namespace App\DefaultBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use App\DefaultBundle\Entity\Portfolio;

class LoadProjectData extends AbstractFixture implements OrderedFixtureInterface
{

    protected $projects = array(
        array(
            'name' => 'Stashify.me',
            'link' => 'http://stashify.me/',
            'description' => '
                    Наш скромный, но подающий большие надежды собственный проект.
                    Говорят, это самый простой способ сделать бэкап вашей онлайн активности и синхронизировать данные с вашим аккаунтом в Dropbox.
                    Обладает утонченным дизайном (спасибо <a href="http://formazon.com/">Фарид</a>!).
                    Находится в поисках своего предназначения и растет вместе с нами.
                    ',
            'en' => array(
                'name' => 'Stashify.me',
                'description' => '
                        Our small yet promissing project.
                        They say it\'s the easiest way to backup your online social data and sync it with your Dropbox account.
                        Have refined design (thanks <a href="http://formazon.com/">Farid</a>!).
                        Searches it\'s destiny and develops with us.
                        ',
            ),
        ),
        array(
            'name' => 'PostcardWithLove.ru',
            'link' => 'http://postcardwithlove.ru/',
            'description' => '
                    На этом небольшом замечательном сайте можно отправить настоящую почтовую открытку в несколько кликов.
                    Со своими фотографиями или готовыми картинками — как вам хочется.
                    Сайт работает на Ruby on Rails.
                    <a href="http://lalalambada.livejournal.com/357836.html">Подробности в блоге основательницы проекта Ольги Нарижной.</a>
                    ',
            'en' => array(
                'name' => 'PostcardWithLove.ru',
                'description' => '
                        With this simple yet wonderful service you can send real postacard just withing few clicks.
                        Using your own photos or prepared pictures, just as you wish.
                        Site is working on Ruby on Rails.
                        For more information check <a href="http://lalalambada.livejournal.com/357836.html">the blog post from the founder Olga Narizhnaya</a>.
                        ',
            ),
        ),
        array(
            'name' => 'Manaflask',
            'link' => 'http://manaflask.com/en/',
            'description' => '
                    Manaflask – популярный игровой портал, предоставляющий материалы от топовых мировых игроков на английском и немецком языках.
                    Мы поддерживали старую версию сайта, написанную на PHP. 
                    А весной 2013-го участвовали в разработке и 
                    <a href="http://blog.evercodelab.com/manaflask-release/">запуске новой версии Manaflask на Ruby on Rails</a>.
                    ',
            'en' => array(
                'name' => 'Manaflask',
                'description' => '
                        Manaflask is an Internet Gaming Portal dedicated to bringing premium content presented in both English and German created by top teams and individuals.
                        We were involved in support of old version of the site written in PHP. 
                        And in the spring of 2013 we helped to develop and 
                        <a href="http://blog.evercodelab.com/manaflask-release/">launch the new version of portal on Ruby on Rails</a>.
                        ',
            ),
        ),
        array(
            'name' => 'ITOP',
            'link' => 'http://itop-portal.net/',
            'description' => '
                    Российский портал информационных технологий, оптики и фотоники разработан по заказу ИТМО.
                    Наш первый проект на Symfony2 + Doctrine2.
                    Основной функционал разработан за очень сжатые сроки.
                    Подробности <a href="http://blog.evercodelab.com/itop/">в блоге</a>.
                    ',
            'en' => array(
                'name' => 'ITOP',
                'description' => '
                        Russian portal of IT, optics and photonics made for ITMO.
                        Our first project on Symfony2 + Doctrine2 stack.
                        Basic functionality was developed in very short period of time.
                        For more information see <a href="http://blog.evercodelab.com/itop/">detailed blog entry</a>.
                        ',
            ),
        ),
        array(
            'name' => 'Noob-Club',
            'link' => 'http://www.noob-club.ru/',
            'description' => '
                    Noob-club.ru - фансайт, посвященный многопользовательским онлайн играм World of Warcraft, Diablo и Star Wars: The Old Republic.
                    Сайт написан на PHP c использованием Zend Framework. Оптимизирован под большие нагрузки.
                    ',
            'en' => array(
                'name' => 'Noob-Club',
                'description' => '
                        Noob-club.ru is a fansite dedicated to MMO games like World of Warcraft, Diablo and Star Wars: The Old Republic.
                        Site is written on PHP with Zend Framework and optimized for constant highload.
                        ',
            ),
        ),
        array(
            'name' => 'Игра «Морской Бой»',
            'link' => 'http://bqbs.ru/',
            'description' => '
                    Движок для уникального и увлекательного квеста в городских условиях от <a href="http://best-quest.ru/">Best Quest</a> на основе всем знакомой с детства игры.
                    Проект реализован на Ruby on Rails.
                    Дизайн нарисовал <a href="http://formazon.com/">Фарид Рафиков</a>.
                    Подробности <a href="http://blog.evercodelab.com/battleship/">в блоге</a>.
                    ',
            'en' => array(
                'name' => 'Best Quest "Battleship"',
                'description' => '
                        Engine for unique and fascinating real-life city quest by <a href="http://best-quest.ru/">Best Quest</a> based on widely known game.
                        Built on Ruby on Rails.<br />
                        Designed by <a href="http://formazon.com/">Formazon</a>.
                        For more information see <a href="http://blog.evercodelab.com/battleship/">detailed blog entry</a>.
                        ',
            ),
        ),
        array(
            'name' => 'Saraswati.Pro',
            'link' => 'http://saraswati.pro/',
            'description' => '
                    Издательство Сарасвати (Saraswati) нашло свое второе рождение в Таиланде, городе Чиангмай 20 января 2010 года и выпускает книги не только в традиционном формате, но также в виде цифровых публикаций и интерактивных приложения для iOS и Android.
                    Наш первый проект на Ruby on Rails.
                    Дизайн нарисовал <a href="http://formazon.com/">Фарид Рафиков</a>.
                    ',
            'en' => array(
                'name' => 'Saraswati.Pro',
                'description' => '
                        Digital publishing house "Saraswati" was reborn in Thailand, Chiang Mai on 20th of January, 2010 and constantly releases books not only in traditional paper format but also in digital versions and interactive applications for iOs and Adroid.
                        Our first project on Ruby on Rails.<br />
                        Designed by <a href="http://formazon.com/">Formazon</a>.
                        ',
            ),
        ),
        array(
            'name' => 'Mahamandala',
            'link' => 'http://mahamandala.com/',
            'description' => '
                    Медиа хранилище с широким списком социальных функций.
                    Первая версия проекта разработана на Zend Framework 1 + Doctrine 1. 
                    Позже сайт был портирован на Ruby on Rails.
                    ',
            'en' => array(
                'name' => 'Mahamandala',
                'description' => '
                        Media storage with wide list of social functionality.
                        Originally was developed with first versions Zend Framework and Doctrine. 
                        Later site was ported to Ruby on Rails.
                        ',
            ),
        ),
        array(
            'name' => 'DropNotify',
            'link' => 'http://dropnotify.evercodelab.com/',
            'description' => '
                    Мини-сервис, составляющий красивый дайджест из изменений в ваших файлах и папках Dropbox за день и присылающий его на email.
                    Разработан за пару дней для внутренних нужд. Работает на Google App Engine (Python).
                    Подробности <a href="http://blog.evercodelab.com/dropnotify/">в блоге</a>.
                    Код находится в открытом доступе.
                    ',
            'en' => array(
                'name' => 'DropNotify',
                'description' => '
                        Mini-service which takes the feed of changes in your Dropbox files and folders, composes beutiful digest and sends it to your email everyday.
                        Was developed in couple of days for inner needs. Works on Google App Engine (Python).
                        For more information see <a href="http://blog.evercodelab.com/dropnotify/">detailed blog entry</a>.
                        The source code is open.
                        ',
            ),
        ),
        array(
            'name' => 'Издательство Европейского Университета',
            'link' => 'http://eupress.ru/',
            'description' => '
                    В интернет-магазине Издательства Европейского Университета можно найти редкие, уникальные и интересные книги.
                    По просьбе ЕУСПб мы уже не первый год занимаемся поддержкой и развитием сайта.
                    Сайт работает на Zend Framework 1.
                    ',
            'en' => array(
                'name' => 'The EUSP Press’ internet store',
                'description' => '
                        In the EUSP Press’ internet store you can find interesting, rare and unique books.
                        We are supporting the site for more than a year already.
                        Site works on PHP with Zend Framework 1.
                        ',
            ),
        ),
        array(
            'name' => 'EverpartyBird',
            'link' => 'http://everpartybird.herokuapp.com/countdown/10',
            'description' => '
                    Небольшое, но очень бесполезное, при этом уникальное по своей психоделичности приложение-эксперимент.
                    Сделано с использованием микрофреймворка Cuba и SVG графики.
                    Стало неизменным атрибутом наших Evercode Talks.
                    Код доступен на <a href="https://github.com/JazzJackrabbit/everpartybird">github</a>.
                    ',
            'en' => array(
                'name' => 'EverpartyBird',
                'description' => '
                        Small but very useless and at the same time unique in it\'s psychedelia app experiment.
                        Built with Cuba microframework and some SVG graphics at the front.
                        Became the essential of our Evercode Talks.
                        Code is available on <a href="https://github.com/JazzJackrabbit/everpartybird">github</a>.
                        ',
            ),
        ),
        array(
            'name' => 'The Book of Knowledge',
            'link' => 'http://thebookofknowledge.evercodelab.com/',
            'description' => '
                    Наша постоянно пополняемая база знаний.
                    Спектр тем ограничен рамками нашего любопытства.
                    Находится в открытом доступе.
                    Работает на <a href="https://github.com/mojombo/jekyll">Jekyll</a> и <a href="http://pages.github.com/">github:pages</a>.
                    "When in doubt, consult the Book of Knowledge"
                    ',
            'en' => array(
                'name' => 'The Book of Knowledge',
                'description' => '
                        Our constantly updated knowledge base.
                        Variety of themes described is limited only by our curiosity.
                        Available for everyone to see, share, comment and even contribute.
                        Works on <a href="https://github.com/mojombo/jekyll">Jekyll</a> and <a href="http://pages.github.com/">github:pages</a>.
                        "When in doubt, consult the Book of Knowledge"
                        ',
            ),
        ),
        array(
            'name' => 'EvercodeFaqBundle',
            'link' => 'https://github.com/EvercodeLab/FaqBundle',
            'description' => '
                    Простой бандл для фреймворка Symfony2 для быстрой интеграции FAQ в проекты.
                    Находится в открытом доступе.
                    Вопросов не задает, но потенциально на них отвечает.
                    Снижает нагрузку на support в разы.
                    ',
            'en' => array(
                'name' => 'EvercodeFaqBundle',
                'description' => '
                        Simple Symfony2 Bundle for easy integrating FAQ functionality.
                        Available for everyone to see, share, comment and even contribute.
                        Doesn\'t ask question but potentially answers on them.
                        Reduces working load on your support team.
                        ',
            ),
        ),
        array(
            'name' => 'EvercodeBannerBundle',
            'link' => 'https://github.com/EvercodeLab/BannerBundle',
            'description' => '
                    Бандл для фреймворка Symfony2 для работы с баннерами.
                    Находится в открытом доступе.
                    Некоторые говорят, повышает конверсию на проектах, где используется.
                    Умеет не только показывать баннеры, но и считать (яичницу не готовит).
                    ',
            'en' => array(
                'name' => 'EvercodeBannerBundle',
                'description' => '
                        Symfony2 bundle for working with banner on your site.
                        Available for everyone to see, share, comment and even contribute.
                        Some say it increases conversion of your advertisement.
                        Not only shows banners but also can count... from one to ten.
                        ',
            ),
        ),
        array(
            'name' => 'EvercodePageBundle',
            'link' => 'https://github.com/EvercodeLab/EvercodePageBundle',
            'description' => '
                    Очень простой экспериментальный бандл для фреймворка Symfony2, добавляющий в проекты функционал работы с информационными страницами.
                    Находится в открытом доступе.
                    Повышает уровень образованности посетителей сайтов на 146%.
                    Улучшает навыки письменной речи.
                    ',
            'en' => array(
                'name' => 'EvercodePageBundle',
                'description' => '
                        Dead simple experimental Symfony2 Bundle for easy management of your projects\' information pages.
                        Available for everyone to see, share, comment and even contribute.
                        Increases your visitors intellectual faculties by 146%.
                        Significantly improves writing skills.
                        ',
            ),
        ),
        array(
            'name' => 'Система принятия и обработки объявлений',
            'link' => null,
            'description' => '
                    Программа предназначена для принятия и обработки объявлений для публикации в газете и на сайте.
                    Возможности: гибкое управления объявлениями, поиск, генерация отчетов, подсчет стоимости, 
                    внутренняя система счетов, импорт объявлений с сайта, 
                    предпросмотр, рассылка SMS сообщений на телефоны подателей. 
                    Подробности не разглашаются по соглашению с заказчиком.
                    ',
            'en' => array(
                'name' => 'System for receiving and processing of advertisement',
                'description' => '
                        The system is designed to accept and process ads for newspaper and site.
                        Features: ads management, search, reports generation, price calculation,
                        internal accounts system, import from site, preview, SMS notifications.
                        More details are private dew to client\'s request.
                        ',
            ),
        ),
        array(
            'name' => 'Система афилиатного маркетинга Qprofit',
            'link' => null,
            'description' => '
                    Qprofit задумывался как сервис, объединяющий продавцов товаров и владельцев торговых площадок.
                    Нами был разработан прототип проекта на Symfony2.
                    К сожалению, заказчик принял решение не продолжать разработку и развитие проекта.
                    ',
            'en' => array(
                'name' => 'Affiliate marketing system Qprofit',
                'description' => '
                        Qprofit was intended to be a place where salespeople and trading places owners meet.
                        We developed a prototype of the service using Symfony2 framework.
                        Unfortunately owners decided not to continue development and elaboration of the project.
                        ',
            ),
        ),
        array(
            'name' => 'Система генерации отчетов по продвижению сайтов',
            'link' => null,
            'description' => '
                    Для крупной питерской веб-студии мы разработали внутренний инструмент автоматизации для отдела продвижения.
                    Система собирает данные из LiveInternet, Google Analytics, Google.Webmaster, Yandex.Webmaster. 
                    Далее генерирует необходимые графики и таблицы данных. И затем выгружает в docx с учетом фирменных стилей фирмы.
                    Проект реализован на Symfony2.
                    ',
            'en' => array(
                'name' => 'Report generation system for website promotion departement',
                'description' => '
                        For big web-studio from St. Petersburg we developed the instrument to automate work of website promotion departement.
                        System gathers information from Google Analytics, LiveInternet, Google.Webmaster, Yandex. Webmaster.
                        Then it generates necessary data tables and graphs and generates docx file according to corporate identity.
                        ',
            ),
        ),
        array(
            'name' => 'PHP Study Guide',
            'link' => 'http://php-guide.evercodelab.com/',
            'description' => '
                    Изначально — краткое руководство для подготовки к <a href="http://www.zend.com/en/services/certification/php-5-certification/">сертификации ZCE PHP5.3</a>.
                    Немного переработано в более общее руководство для изучающих PHP.
                    Находится в открытом доступе.
                    Работает на <a href="https://github.com/mojombo/jekyll">Jekyll</a> и <a href="http://pages.github.com/">github:pages</a>.
                    ',
            'en' => array(
                'name' => 'PHP Study Guide',
                'description' => '
                        Originally was a small project that provides step by step guide on information needed to pass <a href="http://www.zend.com/en/services/certification/php-5-certification/">PHP5.3 ZCE certification</a>.
                        For now it is a good place to start your experience with PHP5.3.
                        Available for everyone to see, share, comment and even contribute.
                        Works on <a href="https://github.com/mojombo/jekyll">Jekyll</a> and <a href="http://pages.github.com/">github:pages</a>.
                        ',
            ),
        ),
    );

    public function load(ObjectManager $manager)
    {
        $repository = $manager->getRepository('\\Gedmo\\Translatable\\Entity\\Translation');

        foreach ($this->projects as $data) {
            $project = new Portfolio();
            $project->setName($data['name']);
            $project->setLink($data['link']);
            $project->setDescription(trim($data['description']));

            $repository
                ->translate($project, 'name', 'en', $data['en']['name'])
                ->translate($project, 'description', 'en', trim($data['en']['description']));

            $manager->persist($project);
            $manager->flush();
        }
    }

    public function getOrder()
    {
        return 3; // the order in which fixtures will be loaded
    }
}
