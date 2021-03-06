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
            'name' => 'Escar-web',
            'link' => '',
            'image' => 'escar.png',
            'case_link' => 'http://blog.evercodelab.com/escar-web/',
            'description' => '
                    Веб-версия программы Эскар — системы накопления, хранения, мониторинга и предоставления информации о радиационных параметрах помещений и оборудования АЭС.
                    Во многом уникальный для нас проект. Реализован как single-page app с помощью backbone.js, require.js и svg.js. На бэкенде Silex для API.
                    ',
            'en' => array(
                'name' => 'Escar-web',
                'description' => '
                        Web version of Escar – system for storing, monitoring and demonstrating data about radioactive parameters of objects and equipment on Nuclear power-station.
                        Developed as a single-page app with backbone.js, require.js and svg.js. Silex is used for backend API.
                        ',
            ),
        ),
        array(
            'name' => 'Love2shop',
            'link' => '',
            'image' => 'love2shop.png',
            'case_link' => '',
            'description' => '
                    Для проекта love2shop мы разработали API для мобильного приложения, административную панель для управления огромным количеством товаров, автоматизировали парсинг и обработку.
                    Указанные части проекта реализованы на Symfony2. Парсер переписан на Ruby с использованием очередей.
                    ',
            'en' => array(
                'name' => 'Love2shop',
                'description' => '
                        For love2shop we developed backend API for their mobile app, admin panel for managing products, automated parsing and processing.
                        These parts were developed on Symfony2. Parser was rewritten with Ruby and queues.
                        ',
            ),
        ),
        array(
            'name' => 'Система тестирования «Балл.орг»',
            'link' => '',
            'image' => 'ball-org.png',
            'case_link' => '',
            'description' => '
                    Система предоставляет возможность российским школам проводить тестирования для своих учеников с целью предварительной подготовки к ЕГЭ.
                    Проект реализован на Symfony2 и имеет уникальные интерфейсы для управления данными и проверки результатов.
                    ',
            'en' => array(
                'name' => 'Testing system «Балл.орг»',
                'description' => '
                        System provides opportunity for Russian schools to set tests for their students in order to prepare for Centralized Testing.
                        Project is developed using Symfony2 with custom interfaces for managing data and checking the results.
                        ',
            ),
        ),
        array(
            'name' => 'OnDoc',
            'link' => 'https://ondoc.me/',
            'image' => 'ondoc.png',
            'case_link' => '',
            'description' => '
                    OnDoc — система персонального здравоохранения. 
                    Предоставляет возможность регулярного мониторинга показателей собственного организма, а также хранения данных по обследованиям и прочей медицинской информации.
                    Проект реализован на Symfony2. Помимо пользовательской части и админ панели имеет закрытый API для мобильных приложений.
                    ',
            'en' => array(
                'name' => 'OnDoc',
                'description' => '
                        OnDoc is the system of personal healthcare.
                        Project allows to regularly store and check information about your body and also data from medical surveys.
                        Built with Symfony2. Besides client and admin interfaces has closed API for mobile applications.
                        ',
            ),
        ),
        array(
            'name' => 'TDCloud',
            'link' => 'http://tdcloud.ru/',
            'image' => 'tdcloud.png',
            'case_link' => 'http://blog.evercodelab.com/tdcloud/',
            'description' => '
                    Сервис облачной теледиспетчеризации TDCloud позволяет получать и обрабатывать данные с измерительных устройств через web-интерфейс без вложений в инфраструктуру.
                    Веб-часть сервиса работает на Ruby on Rails и PostgreSQL, но внутри скрыто еще много всего интересного
                    ',
            'en' => array(
                'name' => 'TDCloud',
                'description' => '
                        TDCloud gives clients an opportunity to get, check and process data from different measuring devices through the web with no extra spendings on infrastructure.
                        Web-part works on Ruby on Rails and PostgreSQL. But there is a lot more inside.
                        ',
            ),
        ),
        array(
            'name' => 'Picademy',
            'link' => 'http://picademy.ru/',
            'image' => 'picademy.png',
            'case_link' => 'http://blog.evercodelab.com/picademy-ru/',
            'description' => '
                    Онлайн-фотошкола Picademy предоставляет целый набор разнообразных курсов для фотографов разного уровня. 
                    Пользователи могут изучать видео-уроки, проходить тестирования и получать обратную связь от преподавателей на свои домашние задания.
                    Проект реализован на Ruby on Rails.
                    ',
            'en' => array(
                'name' => 'Picademy',
                'description' => '
                        Online photoschool Picademy provide various courses for photographers of all levels.
                        Users can watch videos, check their knowledge with tests and communicate with on-site experts.
                        Project is developed on Ruby on Rails.
                        ',
            ),
        ),
        array(
            'name' => 'Shamrock Pub',
            'link' => 'http://shamrock-bar.ru/',
            'image' => 'shamrock.png',
            'case_link' => '',
            'description' => '
                    Для уютного московского паба Shamrock мы разработали простой, но функциональный сайт.
                    Дизайн от Дениса Foster\'а. За кулисами движок на Symfony2, админка на SonataAdminBundle для управления всем контентом.
                    ',
            'en' => array(
                'name' => 'Shamrock Pub',
                'description' => '
                        For a comfortable Moscow pub Shamrock we developed simple yet functional site.
                        Design is done by Denis Foster. Engine is built on Symfony2 and SonataAdminBundle for managing all the content.
                        ',
            ),
        ),
        array(
            'name' => 'Russian Wake Awards',
            'link' => 'http://wakeawards.ru/',
            'image' => 'wakeawards.png',
            'case_link' => '',
            'description' => '
                    Наши экстремальные друзья в 2013 году провели Первую Всероссийскую Вейк Премию.
                    Специально для этого события совместно с дизайнером Денисом Foster\'ом мы сделали им в кратчайшие сроки сайт события с голосованием и информацией по событию, райдерам, местам и фотографам.
                    Проект разработан на Symfony2 и SonataAdminBundle в качестве админки.
                    ',
            'en' => array(
                'name' => 'Russian Wake Awards',
                'description' => '
                        Our extreme friends held Russian Wake Awards 2013 event this year.
                        Specially for them we and Denis Foster as a designer developed the site with voting and information about event itself, riders, spots and photographers.
                        Project is developed with Symfony2 and SonataAdminBundle for admin interface.
                        ',
            ),
        ),
        array(
            'name' => 'Best4car',
            'link' => 'http://best4car.ru/',
            'image' => 'best4car.jpg',
            'case_link' => 'http://blog.evercodelab.com/best4car/',
            'description' => '
                    Проект достался нам в незаконченном виде летом 2013-го года.
                    Мы помогли основателям сервиса довести его до запуска и продолжаем работать вместе, развивая и улучшая функционал.
                    Сайт разработан на Symfony2.
                    ',
            'en' => array(
                'name' => 'Best4car',
                'description' => '
                        We got this project when it was only half ready in the summer of 2013.
                        In a couple of months we helped founders of the service to launch it and since then are working together making it even better and more functional.
                        Project is developed with Symfony2.
                        ',
            ),
        ),
        array(
            'name' => 'PostcardWithLove',
            'link' => 'http://postcardwithlove.ru/',
            'image' => 'cards.jpg',
            'case_link' => 'http://blog.evercodelab.com/post-cards/',
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
            'image' => 'mf.jpg',
            'case_link' => 'http://blog.evercodelab.com/manaflask-release/',
            'description' => '
                    Manaflask – популярный игровой портал, предоставляющий материалы от топовых мировых игроков на английском и немецком языках.
                    Мы поддерживали старую версию сайта, написанную на PHP.
                    А весной 2013-го участвовали в разработке и
                    ',
            'en' => array(
                'name' => 'Manaflask',
                'description' => '
                        Manaflask is an Internet Gaming Portal dedicated to bringing premium content presented in both English and German created by top teams and individuals.
                        We were involved in support of old version of the site written in PHP.
                        And in the spring of 2013 we helped to develop and
                        ',
            ),
        ),
        array(
            'name' => 'Stashify.me',
            'link' => 'http://stashify.me/',
            'image' => 'stashify.jpg',
            'case_link' => '',
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
            'name' => 'Noob-Club',
            'link' => 'http://www.noob-club.ru/',
            'image' => 'noob-club.jpg',
            'case_link' => '',
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
            'image' => 'bqbs.jpg',
            'case_link' => 'http://blog.evercodelab.com/battleship/',
            'description' => '
                    Движок для уникального и увлекательного квеста в городских условиях от <a href="http://best-quest.ru/">Best Quest</a> на основе всем знакомой с детства игры.
                    Проект реализован на Ruby on Rails.
                    Дизайн нарисовал <a href="http://formazon.com/">Фарид Рафиков</a>.
                    ',
            'en' => array(
                'name' => 'Best Quest "Battleship"',
                'description' => '
                        Engine for unique and fascinating real-life city quest by <a href="http://best-quest.ru/">Best Quest</a> based on widely known game.
                        Built on Ruby on Rails.<br />
                        Designed by <a href="http://formazon.com/">Formazon</a>.
                        ',
            ),
        ),
        array(
            'name' => 'Saraswati.Pro',
            'link' => 'http://saraswati.pro/',
            'image' => 'saraswati.jpg',
            'case_link' => '',
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
            'name' => 'EverpartyBird',
            'link' => 'http://everpartybird.herokuapp.com/countdown/10',
            'image' => 'everpartybird.jpg',
            'case_link' => '',
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
            'image' => 'tbok.jpg',
            'case_link' => '',
            'description' => '
                    Наша постоянно пополняемая база знаний.
                    Спектр тем ограничен рамками нашего любопытства.
                    Находится в открытом доступе.
                    Работает на <a href="http://jekyllrb.com/">Jekyll</a> и <a href="http://pages.github.com/">github:pages</a>.
                    "When in doubt, consult the Book of Knowledge"
                    ',
            'en' => array(
                'name' => 'The Book of Knowledge',
                'description' => '
                        Our constantly updated knowledge base.
                        Variety of themes described is limited only by our curiosity.
                        Available for everyone to see, share, comment and even contribute.
                        Works on <a href="http://jekyllrb.com/">Jekyll</a> and <a href="http://pages.github.com/">github:pages</a>.
                        "When in doubt, consult the Book of Knowledge"
                        ',
            ),
        ),
        array(
            'name' => 'Система генерации отчетов по продвижению сайтов',
            'link' => null,
            'image' => 'redreport.jpg',
            'case_link' => 'http://blog.evercodelab.com/kelnik-redreport/',
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
            'name' => 'Mahamandala',
            'link' => 'http://mahamandala.com/',
            'image' => 'mahamandala.jpg',
            'case_link' => '',
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
            'name' => 'Система принятия и обработки объявлений',
            'link' => null,
            'image' => 'webcity.png',
            'case_link' => '',
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
            'image' => 'qprofit.jpg',
            'case_link' => '',
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
            'name' => 'PHP Study Guide',
            'link' => 'http://php-guide.evercodelab.com/',
            'image' => 'php-guide.jpg',
            'case_link' => '',
            'description' => '
                    Изначально — краткое руководство для подготовки к <a href="http://www.zend.com/en/services/certification/php-5-certification/">сертификации ZCE PHP5.3</a>.
                    Немного переработано в более общее руководство для изучающих PHP.
                    Находится в открытом доступе.
                    Работает на <a href="http://jekyllrb.com/">Jekyll</a> и <a href="http://pages.github.com/">github:pages</a>.
                    ',
            'en' => array(
                'name' => 'PHP Study Guide',
                'description' => '
                        Originally was a small project that provides step by step guide on information needed to pass <a href="http://www.zend.com/en/services/certification/php-5-certification/">PHP5.3 ZCE certification</a>.
                        For now it is a good place to start your experience with PHP5.3.
                        Available for everyone to see, share, comment and even contribute.
                        Works on <a href="http://jekyllrb.com/">Jekyll</a> and <a href="http://pages.github.com/">github:pages</a>.
                        ',
            ),
        ),
        array(
            'name' => 'DropNotify',
            'link' => 'http://dropnotify.evercodelab.com/',
            'image' => 'dropnotify.png',
            'case_link' => 'http://blog.evercodelab.com/dropnotify/',
            'description' => '
                    Мини-сервис, составляющий красивый дайджест из изменений в ваших файлах и папках Dropbox за день и присылающий его на email.
                    Разработан за пару дней для внутренних нужд. Работает на Google App Engine (Python).
                    Код находится в открытом доступе.
                    ',
            'en' => array(
                'name' => 'DropNotify',
                'description' => '
                        Mini-service which takes the feed of changes in your Dropbox files and folders, composes beutiful digest and sends it to your email everyday.
                        Was developed in couple of days for inner needs. Works on Google App Engine (Python).
                        The source code is open.
                        ',
            ),
        ),
                array(
            'name' => 'Издательство Европейского Университета',
            'link' => 'http://eupress.ru/',
            'image' => 'eupress.jpg',
            'case_link' => '',
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
            'name' => 'ITOP',
            'link' => 'http://itop-portal.net/',
            'image' => 'itop.png',
            'case_link' => 'http://blog.evercodelab.com/itop/',
            'description' => '
                    Российский портал информационных технологий, оптики и фотоники разработан по заказу ИТМО.
                    Наш первый проект на Symfony2 + Doctrine2.
                    Основной функционал разработан за очень сжатые сроки.
                    ',
            'en' => array(
                'name' => 'ITOP',
                'description' => '
                        Russian portal of IT, optics and photonics made for ITMO.
                        Our first project on Symfony2 + Doctrine2 stack.
                        Basic functionality was developed in very short period of time.
                        ',
            ),
        ),
    );

    public function load(ObjectManager $manager)
    {
        $repository = $manager->getRepository('\\Gedmo\\Translatable\\Entity\\Translation');

        $imagesDestinationDir = getcwd().'/web/uploads/images/portfolio';
        $imagesSourceDir = getcwd().'/web/img/projects';
        if (! file_exists($imagesDestinationDir)) {
            mkdir($imagesDestinationDir, 0777, true);
        }

        foreach ($this->projects as $data) {
            $project = new Portfolio();
            $project->setName($data['name']);
            $project->setLink($data['link']);
            $project->setCaseLink($data['case_link']);
            $project->setDescription(trim($data['description']));

            $imageSource = $imagesSourceDir . DIRECTORY_SEPARATOR . $data['image'];

            if (! empty($data['image']) && file_exists($imageSource)) {
                copy($imageSource, $imagesDestinationDir . DIRECTORY_SEPARATOR . $data['image']);
                $project->setLogo($data['image']);
            }

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
