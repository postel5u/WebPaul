<?php
// Application middleware

// e.g: $app->add(new \Slim\Csrf\Guard);

$app->add(function ($request, $response, $next) {
    $this->view->offsetSet('flash', $this->flash);
    return $next($request, $response);
});

$app->add(function($request, $response, $next){
    if(!(starts_with($request->getUri()->getPath(),'/ajax'))){
        $this->view->render($response,'header.twig');

        $response = $next($request,$response);
        $this->view->render($response,'footer.twig');
        return $response;
    }else{

        $response = $next($request,$response);
        return $response;

    }
});