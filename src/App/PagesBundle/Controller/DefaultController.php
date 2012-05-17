<?php

namespace App\PagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($Alias)
    {
        $page = $this->getDoctrine()
            ->getRepository('PagesBundle:Page')
            ->findAlias($Alias);
        if (empty($page))
            throw $this->createNotFoundException('The Page does not exist');
        else {
            $name = $page->getName();
            $date = $page->getCreatedate();
        }
        return $this->render('PagesBundle:Default:index.html.twig', array('name' => $name, 'date' => $date));
    }
}
