<?php

namespace App\PagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/pages/{alias}", name="pages_index")
     */
    public function indexAction($alias)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $page = $em->getRepository('AppPagesBundle:Page')->findOneByAlias($alias);
        if (empty($page))
        {
            throw $this->createNotFoundException('The Page does not exist');
        }
        else {
            $name = $page->getName();
            $date = $page->getCreatedAt();
        }

        return $this->render('AppPagesBundle:Default:index.html.twig', array('name' => $name, 'date' => $date));
    }
}
