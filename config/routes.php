<?php

use Slim\App;

return function (App $app)
{

    $app->get('/docs', function ($request, $response) {
        $view = Twig::fromRequest($request);
        return $view->render($response, 'docs.html');
    });
    
    $app->group("/api", function($app)
    {    
        $app->get("/user/{id}",[\App\Controllers\UserController::class,'get']);
        $app->post("/user/{id}",[\App\Controllers\UserController::class,'update']);
        $app->delete('/user/{id}',[\App\Controllers\UserController::class,'delete']);

        $app->get("/transactions",[\App\Controllers\TransactionController::class,'getTransections']);

        // authentication apis
        $app->group("/auth", function($app)
        {
            $app->post("/login",[\App\Controllers\AuthController::class,"Login"]);
            $app->post("/register",[\App\Controllers\AuthController::class,"Register"]);
        });
    });
};