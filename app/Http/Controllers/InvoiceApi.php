<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;

class InvoiceApi extends Controller
{
    public function getData() 
    {
        //$invoices = load(['sender', 'receiver', 'paymethod', 'products']);
        $invoices = Invoice::all();
        return response()->json($invoices);
    }
}
