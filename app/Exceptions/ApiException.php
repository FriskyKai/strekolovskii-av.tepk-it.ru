<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class ApiException extends HttpResponseException
{
    public function __construct($code, $message, $errors = [])
    {
        $data = [
            'message' => $message,
        ];

        if (count($errors) > 0) {
            $data['errors'] = $errors;
        }

        parent::__construct(response()->json($data)->setStatusCode($code));
    }
}
