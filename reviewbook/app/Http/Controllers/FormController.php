<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function register()
    { 
        return view('register');
    }

    public function signup(request $request)
    { 
        $FirstName = $request->input("FirstName");
        $LastName = $request->input("LastName");

        return view("welcome", ['FirstName' => $FirstName, "LastName" => $LastName]);
    }
}