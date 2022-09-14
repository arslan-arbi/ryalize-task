<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Response\ResponseHandler;
use App\Repositories\TransactionRepository;
use App\Validation\Validator;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Respect\Validation\Validator as v;

/**
 * [TransactionController]
 */
class TransactionController
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
     * @var TransactionRepository
     */
    protected TransactionRepository $transactionRespository;

    public function __construct()
    {
        $this->responseHandler = new ResponseHandler();
        $this->validator = new Validator();
        $this->transactionRespository = new TransactionRepository();
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param int $id
     * 
     * @return Response
     */
    public function getTransections(Request $request, Response $response): Response
    {
        $this->validator->validate($request->getQueryParams(), [
            "startdate" => v::notEmpty()->date(),
            "enddate" => v::notEmpty()->date(),
            "limit" => v::notEmpty()->number(),
            "offset" => v::notEmpty()->number(),
        ]);

        if ($this->validator->failed()) {
            $responseMessage = $this->validator->errors;
            return $this->responseHandler->sendError($response, $responseMessage, ResponseHandler::HTTP_BAD_REQUEST);
        }

        $params = $request->getQueryParams();
        $transactions = $this->transactionRespository->getTransectionsByDateRange($params["startdate"], $params["enddate"], (int) $params["limit"], (int) $params["offset"]);
        if (!$transactions) {
            return $this->responseHandler->sendError($response, "Uable to get transections");
        }

        return $this->responseHandler->sendResponse($response, $transactions);
    }
}
