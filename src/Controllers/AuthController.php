<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Response\ResponseHandler;
use App\Services\AuthService;
use App\Validation\Validator;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Respect\Validation\Validator as v;

/**
 * [AuthController]
 */
class AuthController
{

    /**
     * @var ResponseHandler
     */
    protected ResponseHandler $responseHandler;

    /**
     * @var Validator
     */
    protected Validator $validator;

    /**
     * @var AuthService
     */
    protected AuthService $authService;

    public function __construct()
    {
        $this->responseHandler = new ResponseHandler();
        $this->validator = new Validator();
        $this->authService = new AuthService();
    }


    /**
     * @param Request $request
     * @param Response $response
     * 
     * @return Response
     */
    public function Register(Request $request, Response $response): Response
    {
        $this->validator->validate($request->getParsedBody(), [
            "name" => v::notEmpty(),
            "email" => v::notEmpty()->email(),
            "password" => v::notEmpty(),
            "phone_number" => v::notEmpty(),
            "address" => v::notEmpty()
        ]);

        if ($this->validator->failed()) {
            $responseMessage = $this->validator->errors;
            return $this->responseHandler->sendError($response, $responseMessage, ResponseHandler::HTTP_BAD_REQUEST);
        }

        if (!$this->authService->register($request->getParsedBody())) {
            return $this->responseHandler->sendError($response, "Unable to Register", ResponseHandler::HTTP_BAD_REQUEST);
        }

        return $this->responseHandler->sendResponse($response, "User Registered Successfully");
    }

    /**
     * @param Request $request
     * @param Response $response
     * 
     * @return Response
     */
    public function Login(Request $request, Response $response): Response
    {

        $this->validator->validate($request->getParsedBody(), [
            "email" => v::notEmpty()->email(),
            "password" => v::notEmpty()
        ]);

        if ($this->validator->failed()) {
            $responseMessage = $this->validator->errors;
            return $this->responseHandler->sendError($response, $responseMessage, ResponseHandler::HTTP_BAD_REQUEST);
        }

        $result = $this->authService->login($request->getParsedBody());
        if (!$result) {
            return $this->responseHandler->sendError($response, "Invalid username or password", ResponseHandler::HTTP_BAD_REQUEST);
        }

        return $this->responseHandler->sendResponse($response, $result);
    }
}
