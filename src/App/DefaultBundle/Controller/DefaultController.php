<?php

namespace App\DefaultBundle\Controller;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use App\DefaultBundle\Form\Type\FeedbackType;

class DefaultController extends Controller
{
    /**
     * @Route("/{_locale}", name="index", requirements={"_locale" = "ru|en"}, defaults={"_locale"="ru"})
     * @Method({"GET", "POST"})
     * @Template()
     * @param Request $request
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function indexAction(Request $request)
    {
        /** @var ObjectManager $em */
        $em = $this->getDoctrine()->getManager();

        $clients = $em->getRepository('AppDefaultBundle:Client')->findAll();
        $team = $em->getRepository('AppDefaultBundle:Team')->findAll();
        $slides = $em->getRepository('AppDefaultBundle:ClientSlider')->findAll();
        $feedbackForm = $this->createForm(new FeedbackType());

        $feedbackForm->handleRequest($request);

        if ($feedbackForm->isSubmitted() && $feedbackForm->isValid()) {
            $this->get('feedback.manager')->send($feedbackForm->getData());
            $this->get('session')->getFlashBag()->add(
                'notice',
                'Ваше сообщение отправлено!'
            );

            return $this->redirect($this->generateUrl('index') . '#feedback');
        }

        return [
            'clients' => $clients,
            'team' => $team,
            'feedbackForm' => $feedbackForm->createView(),
            'slides' => $slides
        ];
    }

    /**
     * @Route(name="blog")
     * @Method("GET")
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

    /**
     * @Route("/{_locale}/symfony", name="symfony", requirements={"_locale" = "ru|en"}, defaults={"_locale"="ru"})
     * @Method("GET")
     * @Template()
     */
    public function symfonyAction()
    {
        return [];
    }

    /**
     * @Route("/{_locale}/ruby-on-rails", name="ror", requirements={"_locale" = "ru|en"}, defaults={"_locale"="ru"})
     * @Method("GET")
     * @Template()
     */
    public function rorAction()
    {
        return [];
    }

    /**
     * @Route("/{_locale}/ios", name="ios", requirements={"_locale" = "ru|en"}, defaults={"_locale"="ru"})
     * @Method("GET")
     * @Template()
     */
    public function iosAction()
    {
        return [];
    }

    /**
     * @Route("/{_locale}/portfolio", name="portfolio", requirements={"_locale" = "ru|en"}, defaults={"_locale"="ru"})
     * @Method("GET")
     * @Template()
     */
    public function portfolioAction()
    {
        $em = $this->getDoctrine()->getManager();
        $projects = $em->getRepository('AppDefaultBundle:Portfolio')->findAll();

        return [
            'projects' => $projects,
        ];
    }

}
