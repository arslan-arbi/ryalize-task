<?php
use Slim\App;
use App\Requests\RequestHandler;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandlerInterface;

return function (App $app)
{
  $app->getContainer()->get('settings');
  $app->addRoutingMiddleware();
  $app->add(
      new \Tuupola\Middleware\JwtAuthentication([
          "ignore"=>["/api/auth/login","/api/auth/register"],
          "path" => "/api",
          "secret" => $_ENV['JWT_SECRET_KEY'],         
          "error"=>function($response,$arguments)
          {
              $data["success"] = false;
              $data["response"]=$arguments["message"];
              $data["status_code"]= "401";

              return $response->withHeader("Content-type","application/json")
                  ->getBody()->write(json_encode($data,JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT ));
          },          
      ])
  );

  $app->add(function (Request $request, RequestHandlerInterface $handler) {
    RequestHandler::setParams($request);
    return $handler->handle($request);
  });
  $app->addErrorMiddleware(true,true,true);
};