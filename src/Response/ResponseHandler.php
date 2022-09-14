<?php

declare(strict_types=1);

namespace  App\Response;

use Psr\Http\Message\ResponseInterface as Response;

/**
 * [ResponseHandler]
 */
class ResponseHandler
{
    const HTTP_OK = 200;
    const HTTP_CREATED = 201;
    const HTTP_BAD_REQUEST = 400;
    const HTTP_UNAUTHORIZED = 401;
    const HTTP_FORBIDDEN = 403;
    const HTTP_NOT_FOUND = 404;
    const HTTP_INTERNAL_SERVER_ERROR = 500;

    /**
     * @param Response $response
     * @param mixed $responseMessage
     * 
     * @return Response
     */
    public function sendResponse(Response $response, mixed $responseMessage): Response
    {
        $response->getBody()->write(
            json_encode([
                "success" => true,
                "response" => $responseMessage
            ])
        );

        return $response->withHeader("Content-Type", "application/json")
            ->withStatus(self::HTTP_OK);
    }

    /**
     * @param Response $response
     * @param mixed $error
     * @param  $code
     * 
     * @return Response
     */
    public function sendError(Response $response, mixed $error, $code = self::HTTP_NOT_FOUND): Response
    {
        $response->getBody()->write(
            json_encode([
                "success" => false,
                'errors' => $error,
            ])
        );

        return $response->withHeader("Content-Type", "application/json")
            ->withStatus($code);
    }
}
