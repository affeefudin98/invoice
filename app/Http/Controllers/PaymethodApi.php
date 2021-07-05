<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paymethod;

class PaymethodApi extends Controller
{
    public function getData() 
    {
        $paymethods = Paymethod::all();
        return response()->json($paymethods);
    }
}
