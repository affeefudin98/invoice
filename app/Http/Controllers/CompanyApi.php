<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyApi extends Controller
{
    //
    public function getData() 
    {
        $companies = Company::all();
        return response()->json($companies);
    }
}
