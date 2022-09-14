<?php

declare(strict_types=1);

namespace  App\Validation;

use Respect\Validation\Exceptions\NestedValidationException;
use Psr\Http\Message\RequestInterface as Request;
use Respect\Validation\Validator as v;

/**
 * [Validator]
 */
class Validator
{

    /**
     * @var array
     */
    public array $errors = [];


    /**
     * @param Request $request
     * @param array $rules
     * 
     * @return Validator
     */
    public function validate(array $payload, array $rules): Validator
    {
        foreach ($rules as $field => $value) {
            try {
                $value->setName(ucfirst($field))->assert(isset($payload[$field]) ? $payload[$field] : null);
            } catch (NestedValidationException $ex) {
                $this->errors[$field] = $ex->getMessages();
            }
        }

        return $this;
    }


    public function validateAllNotEmpty(Request $request): Validator
    {
        $payload = $request->getParsedBody();

        foreach ($payload as $field => $value) {
            try {
                if(trim($value) == "") {
                    v::notEmpty()->setName(ucfirst($field))->assert(null);
                }
            } catch (NestedValidationException $ex) {
                $this->errors[$field] = $ex->getMessages();
            }
        }

        return $this;
    }


    /**
     * @return bool
     */
    public function failed(): bool
    {
        return !empty($this->errors);
    }
}
