<?php
namespace App\Controller;

use \Core\Controller;
use \Core\HTTPRequest;
use \App\Model\Entity\Message;
use \App\FormBuilder\MessageFormBuilder;
use \Core\FormHandler;

class HomeController extends Controller
{
    public function index(HTTPRequest $httpRequest)
    {
        if ($httpRequest->getMethod() == 'POST') {
            $message = new Message(
                [
                    'name' => $httpRequest->getPost('name'),
                    'email' => $httpRequest->getPost('email'),
                    'message' => $httpRequest->getPost('message')
                ]
            );
        } else {
            $message = new Message;
        }

        $formBuilder = new MessageFormBuilder($message);
        $formBuilder->build();

        $form = $formBuilder->getForm();

        $formHandler = new FormHandler($form, $message, $httpRequest);

        if ($formHandler->sendProcess()) {
            $this->app->getHttpResponse()->redirect('/');
        }

        $loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/../views');
        $twig = new \Twig\Environment($loader);

        $this->page = $twig->render(
            'home/index.html.twig',
            ['form' => $form->createView()]
        );
    }
}