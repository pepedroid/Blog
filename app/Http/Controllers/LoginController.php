<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginController extends Controller
{
    public function auth(Request $request){
       return response()->json($request);
    }
}// class
