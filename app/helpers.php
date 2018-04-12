<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * It will create the response based on passing parameter
 * @param type $status
 * @param type $msg
 * @param type $data
 * @return type
 * @author Ashok Chitroda <ashok.chitroda@gmail.com>
 */
function createResponse($status, $msg, $data = []) {
    $arr = [];
    $arr["code"] = (int) $status;
    $arr["message"] = $msg;
    if (!empty($data)) {
        $arr["Data"] = $data;
    }
    return response()->json($arr);
}

/**
 * It will return created object response 
 * @param type $data
 * @return type
 * @author Ashok Chitroda <ashok.chitroda@gmail.com>
 */
function createdResponse($data = null, $response = []) {
    $response = response()->json($response, 201);

    if (!empty($data)) {
        $response->header('OBJECT-ID', $data->id)
                ->header('Location', $data->_links['show']);
    }

    return $response;
}

/**
 * It will return get object response 
 * @param type $data
 * @return type
 * @author Ashok Chitroda <ashok.chitroda@gmail.com>
 */
function showResponse($data) {
    return response()->json($data, 200);
}

/**
 * It will return list of object response 
 * @param type $data
 * @return type
 * @author Ashok Chitroda <ashok.chitroda@gmail.com>
 */
function listResponse($data) {
    return response()->json($data, 200);
}

/**
 * It will return edit object response 
 * @param type $data
 * @return type
 * @author Ashok Chitroda <ashok.chitroda@gmail.com>
 */
function editResponse($data) {
    $response = '';
    return response()->json($response, 204)
                    ->header('Location', $data->_links['show']);
}

/**
 * It will return delete object response 
 * @param type $data
 * @return type
 * @author Ashok Chitroda <ashok.chitroda@gmail.com>
 */
function deletedResponse() {
    $response = '';
    return response()->json($response, 204);
}

/**
 * It will return client error response 
 * @param type $data
 * @return type
 * @author Ashok Chitroda <ashok.chitroda@gmail.com>
 */
function clientErrorResponse($data = []) {
    $response = empty($data) ? 'Unprocessable entity' : $data;

    return response()->json($response, 422);
}

/**
 * It will return object not found response 
 * @param type $data
 * @return type
 * @author Ashok Chitroda <ashok.chitroda@gmail.com>
 */
function notFoundResponse($data = []) {
    $response = [
        'error' =>
        [
            'code' => 404,
            'message' => empty($data) ? 'Resource Not Found' : $data
        ]
    ];
    return response()->json($response, 404);
}

/**
 * It will return unauthorized response 
 * @param type $data
 * @return type
 * @author Ashok Chitroda <ashok.chitroda@gmail.com>
 */
function unauthorizedResponse($data = []) {

    $response = [
        'error' =>
        [
            'code' => 401,
            'message' => empty($data) ? 'Unauthorized User' : $data
        ]
    ];

    return response()->json($response, 401);
}

/**
 * It will return access denied response 
 * @param type $data
 * @return type
 * @author Ashok Chitroda <ashok.chitroda@gmail.com>
 */
function accessDeniedResponse($data = []) {
    $response = [
        'error' =>
        [
            'code' => 403,
            'message' => empty($data) ? 'Access Denied' : $data
        ]
    ];
    return response()->json($response, 403);
}

/**
 * It will return an error response
 * @param type $data
 * @return type
 * @author Ashok Chitroda <ashok.chitroda@gmail.com>
 */
function InternalServerErrorResponse($e = null, $message = 'Internal Server Error') {
    if ($e) {
        Log::error('Error : ' . $e->getMessage());
    }
    $response = [
        'code' => 500,
        'message' => $message
    ];
    return response()->json($response, 500);
}

/**
 * It will return a success response
 * @param type $data
 * @return type
 * @author Annas Atchia <atchia.annas@gmail.com>
 */
function successResponse($code, $message, $data = null) {
    $response = [
        'code' => $code,
        'data' => !empty($data) ? $data : new stdClass(),
        'message' => $message,
    ];
    return response()->json($response, $code);
}