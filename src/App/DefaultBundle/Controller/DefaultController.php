<?php

namespace App\DefaultBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

use App\DefaultBundle\Form\Type\FeedbackType;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="index")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $form = $this->createForm(new FeedbackType());
        if ($request->isMethod('POST')) {
            $form->bind($request);

            // data is an array with "name", "email", and "message" keys
            $data = $form->getData();
            $message = \Swift_Message::newInstance()
                ->setSubject('Hello Evercode!')
                ->setFrom('everbird@evercodelab.com')
                ->setTo('hello@evercodelab.com')
                ->setBody($this->renderView('AppDefaultBundle:Default:email.txt.twig', $data))
            ;
            $this->get('mailer')->send($message);

            return $this->redirect($this->generateUrl('index'));
        }

        $em = $this->getDoctrine()->getManager();
        $clients = $em->getRepository('AppDefaultBundle:Client')->findAll();
        $projects = $em->getRepository('AppDefaultBundle:Portfolio')->findAll();

        $feed = $this->get('fkr_simple_pie.rss');
        $feed->set_feed_url('http://blog.evercodelab.com/atom.xml');
        $feed->init();
        $posts = array_slice($feed->get_items(), 0, 5);
        $latestPosts = array();
        foreach ($posts as $post) {
            $latestPosts[] = array(
                'title' => $post->get_title(),
                'link' => $post->get_permalink(),
                'text' => $post->get_description(),
                'date' => $post->get_date('j F, Y'),
            );
        }

        preg_match_all('/(<p>.*?<\/p>)/im', $latestPosts[0]['text'], $matches);
        $latestPosts[0]['text'] = implode('', array_slice($matches[1], 0, 3));

        return array(
            'clients' => $clients,
            'projects' => $projects,
            'latestPosts' => $latestPosts,
            'form' => $form->createView(),
        );
    }

}
