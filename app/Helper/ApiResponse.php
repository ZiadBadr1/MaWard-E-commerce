<?php

namespace App\Helper;

class ApiResponse
{
    static function sendResponse($code = 200 , $msg = null,$data = null): \Illuminate\Http\JsonResponse
    {
        $response = [
          'status' => $code,
          'msg' => $msg,
          'data' => $data,
        ];
        return response()->json($response,$code);
    }
}