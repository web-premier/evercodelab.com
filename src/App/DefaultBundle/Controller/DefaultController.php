<?php

namespace App\DefaultBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/{_locale}", name="index", requirements={"_locale" = "ru|en"}, defaults={"_locale"="ru"})
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $clients = $em->getRepository('AppDefaultBundle:Client')->findAll();
        $projects = $em->getRepository('AppDefaultBundle:Portfolio')->findAll();
        $team = $em->getRepository('AppDefaultBundle:Team')->findAll();

        $response = $this->render('AppDefaultBundle:Default:index.html.twig', [
                'clients' => $clients,
                'projects' => $projects,
                'team' => $team,
            ]
        );
        $response->setSharedMaxAge(7*24*60*60);

        return $response;
    }

    /**
     * @Route(name="blog")
     * @Template()
     */
    public function blogAction()
    {
        $latestPosts = $this->get('evercode.blog')->getLatestPosts(5);

        $response = $this->render('AppDefaultBundle:Default:blog.html.twig', [
                'latestPosts' => $latestPosts
            ]
        );
        $response->setSharedMaxAge(3*24*60*60);

        return $response;
    }

}
