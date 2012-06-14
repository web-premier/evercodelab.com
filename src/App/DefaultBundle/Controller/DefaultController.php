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
        $pages = $em->getRepository('AppDefaultBundle:Page')->findAll();
        $clients = $em->getRepository('AppDefaultBundle:Client')->findAll();
        $portfolios = $em->getRepository('AppDefaultBundle:Portfolio')->findAll();
        return array(
            'pages' => $pages,
            'clients' => $clients,
            'portfolios' => $portfolios,
        );
    }

    /**
     * @Route("/pages/{alias}", name="pages_index")
     */
    public function pageAction($alias)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $page = $em->getRepository('AppDefaultBundle:Page')->findOneByAlias($alias);
        if (empty($page))
        {
            throw $this->createNotFoundException('The Page does not exist');
        }
        else {
            $name = $page->getName();
            $date = $page->getCreatedAt();
        }

        return $this->render('AppDefaultBundle:Default:page.html.twig', array('name' => $name, 'date' => $date));
    }
}
