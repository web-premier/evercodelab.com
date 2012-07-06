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
        $em = $this->getDoctrine()->getEntityManager();
        $pages = $em->getRepository('EvercodePageBundle:Page')->findAll();
        $clients = $em->getRepository('AppDefaultBundle:Client')->findAll();
        $portfolios = $em->getRepository('AppDefaultBundle:Portfolio')->findAll();
        return array(
            'pages' => $pages,
            'clients' => $clients,
            'portfolios' => $portfolios,
        );
    }

}
