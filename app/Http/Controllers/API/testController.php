<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class testController extends Controller
{
    public function test(){
        return response()->json([
            'msg' => 'hello world',
        ], 400);
    }
}
