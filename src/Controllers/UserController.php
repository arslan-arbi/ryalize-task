<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Response\ResponseHandler;
use App\Repositories\UserRepository;
use App\Validation\Validator;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

/**
 * [AuthController]
 */
class UserController
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
     * @var UserRespository
     */
    protected UserRepository $userRespository;

    public function __construct()
    {
        $this->responseHandler = new ResponseHandler();
        $this->validator = new Validator();
        $this->userRespository = new UserRepository();
    }



    /**
     * @param Request $request
     * @param Response $response
     * @param int $id
     * 
     * @return Response
     */
    public function get(Request $request, Response $response, int $id): Response
    {
        $user = $this->userRespository->getUserById($id);
        if (!$user) {
            return $this->responseHandler->sendError($response, "No user exists with id = " . $id);
        }

        return $this->responseHandler->sendResponse($response, $user);
    }


    /**
     * @param Request $request
     * @param Response $response
     * @param int $id
     * 
     * @return Response
     */
    public function update(Request $request, Response $response, int $id): Response
    {

        $this->validator->validateAllNotEmpty($request);

        if ($this->validator->failed()) {
            $responseMessage = $this->validator->errors;
            return $this->responseHandler->sendError($response, $responseMessage, ResponseHandler::HTTP_BAD_REQUEST);
        }

        if (!$this->userRespository->updateUser($id, $request->getParsedBody())) {
            return $this->responseHandler->sendError($response, "Unable to update", ResponseHandler::HTTP_BAD_REQUEST);
        }

        return $this->responseHandler->sendResponse($response, "User information updated successfully");
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param int $id
     * 
     * @return Response
     */
    public function delete(Request $request, Response $response, int $id): Response
    {
        $user = $this->userRespository->deleteUser($id);
        if (!$user) {
            return $this->responseHandler->sendError($response, "No user exists with id = " . $id);
        }

        return $this->responseHandler->sendResponse($response, "User deleted successfully");
    }
}
