<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class learnController extends Controller
{
    public function index() 
    {
        return view('admin.learning');
    }
}
