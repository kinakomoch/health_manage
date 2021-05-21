<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    public function index()
    {
        try {
            // todo
        } catch (\Exception $e) {
            return $this->fail($e->getMessage(), []);
        }
        return $this->success('test', ['test' => 'abc']);
    }
}
