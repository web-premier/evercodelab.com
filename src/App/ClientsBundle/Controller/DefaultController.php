<?php

namespace App\ClientsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('AppClientsBundle:Default:index.html.twig', array('name' => $name));
    }
}
