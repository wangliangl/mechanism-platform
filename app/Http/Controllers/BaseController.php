<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as LumenController;

class BaseController extends LumenController
{
    public function failed(string $msg = 'failed', array $data = [], int $code = 400)
    {
        return $this->success($data, $msg, $code);
    }

    public function success(array $data = [], string $msg = 'success', int $code = 0)
    {
        $responseData = [
            'code' => (Int)$code,
            'msg'  => (String)$msg,
            'data' => (Object)$data
        ];

        return response()->json($responseData)
            ->withHeaders([
                'Content-Type' => 'application/json;charset=UTF-8'
            ]);
    }

    protected function throwValidationException(Request $request, $validator)
    {
        $response = [
            'code' => 20000,
            'msg'  => $validator->errors()->first(),
            'data' => []
        ];

        throw new ValidationException($validator, $response);
    }
}
