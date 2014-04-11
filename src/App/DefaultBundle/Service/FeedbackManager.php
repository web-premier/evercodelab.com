<?php
namespace App\DefaultBundle\Service;

class FeedbackManager
{
    protected $mailer;
    protected $mailTo;
    protected $templating;

    public function __construct($mailer, $mailTo, $templating)
    {
        $this->mailer = $mailer;
        $this->mailTo = $mailTo;
        $this->templating = $templating;
    }

    public function send($data)
    {
        $message = \Swift_Message::newInstance()
                ->setSubject('Новый вопрос на сайте')
                ->setFrom($data['contact'])
                ->setTo($this->mailTo)
                ->setBody(
                    $this->renderView(
                        'AppDefaultBundle:Default:feedback_email.txt.twig',
                        $data
                    )
                )
            ;

        return $this->mailer->send($message);
    }

    /**
     * Returns a rendered view.
     *
     * @param string $view       The view name
     * @param array  $parameters An array of parameters to pass to the view
     *
     * @return string The rendered view
     */
    public function renderView($view, array $parameters = array())
    {
        return $this->templating->render($view, $parameters);
    }
}
