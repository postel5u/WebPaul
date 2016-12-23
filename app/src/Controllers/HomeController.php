<?php

namespace App\Controllers;

use Psr\Log\LoggerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class HomeController
{
    private $view;
    private $logger;
	private $user;

    public function __construct($view, LoggerInterface $logger, $user)
    {
        $this->view = $view;
        $this->logger = $logger;
        $this->model = $user;
    }

    public function dispatch(Request $request, Response $response, $args)
    {
        $this->logger->info("Home page action dispatched");
		
        $this->view->render($response, 'homepage.twig');
		
        return $response;
    }

    public function signup(Request $request, Response $response, $args)
    {
        return $this->view->render($response, 'signup.twig');
    }

    public function signin(Request $request, Response $response, $args)
    {
        return $this->view->render($response, 'signin.twig');
    }

    public function show(Request $request, Response $response, $args)
    {
        return $this->view->render($response, 'show.twig');
    }
}
