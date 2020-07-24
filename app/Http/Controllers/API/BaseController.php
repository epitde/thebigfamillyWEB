<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Response;
use App\Http\Controllers\Controller as Controller;

class BaseController extends Controller
{
    CONST HTTP_OK = Response::HTTP_OK;
    CONST HTTP_CREATED = Response::HTTP_CREATED;
    CONST HTTP_UNAUTHORIZED = Response::HTTP_UNAUTHORIZED;
    /**
     * success response method.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendResponse($data  = NULL, $message = NULL, $code = 200)
    {
        $response = $data;

        if ($message) {
            $response['message'] = $message;
        }

        return response()->json($response, $code);
    }


    /**
     * return error response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendError($error, $code = 404) // , $errorMessages = []
    {
        $response = [
            // 'success' => false,
            'message' => $error
        ];

        return response()->json($response, $code);
    }

    public function get_http_response( string $status = null, $data = null, $response ){

        return response()->json([

            'status' => $status,
            'data' => $data,

        ], $response);
    }
}
