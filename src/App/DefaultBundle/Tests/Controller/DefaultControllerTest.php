<?php

namespace App\DefaultBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{

    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertTrue($client->getResponse()->isSuccessful());
        $this->assertRegExp('/Что мы умеем/', $client->getResponse()->getContent());
        $this->assertRegExp('/Наши клиенты/', $client->getResponse()->getContent());
        $this->assertRegExp('/Наше портфолио/', $client->getResponse()->getContent());
        $this->assertRegExp('/Как с нами связаться/', $client->getResponse()->getContent());
        $this->assertRegExp('/Совсем забыли, у нас еще есть блог!/', $client->getResponse()->getContent());
        $this->assertRegExp('/@evercodelab/', $client->getResponse()->getContent());

        $this->assertEquals(1, $crawler->filter('.b-blog-info')->count());
    }

    public function testEnIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/en');

        $this->assertTrue($client->getResponse()->isSuccessful());
        $this->assertRegExp('/What we can do/', $client->getResponse()->getContent());
        $this->assertRegExp('/Selected clients/', $client->getResponse()->getContent());
        $this->assertRegExp('/Our portfolio/', $client->getResponse()->getContent());
        $this->assertRegExp('/How to contact us/', $client->getResponse()->getContent());
        $this->assertRegExp('/Almost forgot, we also have a blog!/', $client->getResponse()->getContent());
        $this->assertRegExp('/@evercodelab/', $client->getResponse()->getContent());

        $this->assertEquals(1, $crawler->filter('.b-blog-info')->count());
    }

    public function testFeedbackForm()
    {
        $emailData = array(
            'feedback[name]' => 'Ahhhhmed',
            'feedback[contact]' => 'suicide hot-line',
            'feedback[content]' => 'Silence! I kill you!',
        );

        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $buttonCrawlerNode = $crawler->selectButton('Отправить сообщение');
        echo $buttonCrawlerNode->text();
        $form = $buttonCrawlerNode->form($emailData);
        $client->submit($form);

        $this->assertTrue(
            $client->getResponse()->isRedirect('/')
        );

        $profile = $client->getProfile();
        $collector = $profile->getCollector('swiftmailer');
        $messages = $collector->getMessages();
        $message = reset($messages);

        $this->assertArrayHasKey('hello@evercodelab.com', $message->getTo());
        $this->assertContains($emailData['feedback[name]'], $message->getBody());
        $this->assertContains($emailData['feedback[contact]'], $message->getBody());
        $this->assertContains($emailData['feedback[content]'], $message->getBody());
    }

    public function testNotFound()
    {
        $client = static::createClient(array('debug' => false));

        $crawler = $client->request('GET', '/404');

        $this->assertTrue($client->getResponse()->isNotFound());
        $this->assertTrue($crawler->filter('img')->attr('alt') == '404 bird');
    }
}
