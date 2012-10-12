<?php

namespace App\DefaultBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $clients = $em->getRepository('AppDefaultBundle:Client')->findAll();
        $projects = $em->getRepository('AppDefaultBundle:Portfolio')->findAll();

        $feed = $this->get('fkr_simple_pie.rss');
        $feed->set_feed_url('http://feeds.feedburner.com/EvercodeBlog');
        $feed->init();
        $posts = $feed->get_items();
        foreach ($posts as $post) {
            var_dump($post->get_title());
        }
        exit;

        return array(
            'clients' => $clients,
            'projects' => $projects,
            'posts' => $posts,
        );
    }

}
