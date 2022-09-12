<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function testPost()
    {
        return response()->json(
            [
                'test' => true
            ]
        );
    }

    public function testGet()
    {
        return view('welcome');
    }
}
