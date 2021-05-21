<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function success($message, $data)
    {
        return request()->json([
            'status_code' => 2000,
            'message' => $message,
            'data' => $data,
        ]);
    }

    public function fail($message, $data)
    {
        return request()->json([
            'status_code' => 4000,
            'message' => $message,
            'data' => $data,
        ]);
    }
}
