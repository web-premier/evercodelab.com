<?php

namespace App\ClientsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class DefaultController extends Controller
{
    /**
     * @Route("/clients/{name}", name="clients_index")
     */    
    public function indexAction($name)
    {
        return $this->render('AppClientsBundle:Default:index.html.twig', array('name' => $name));
    }
}
