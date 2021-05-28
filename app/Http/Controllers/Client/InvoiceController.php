<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Company;
use App\Models\Product;
use App\Models\Paymethod;
use PDF;
use Auth;

class InvoiceController extends Controller
{
    public function index()
    {
        return view('client.invoices.index')->with('invoices', auth()->user()->invoices);
    }


    public function create()
    {
        return view('client.invoices.create')
        ->with('companies', auth()->user()->companies)
        ->with('products', auth()->user()->products)
        ->with('paymethods', auth()->user()->paymethods);
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate(request(), [
            'date_created' => 'required',
            'due_date'=>'required',
            'sender_id'=>'required',
            'receiver_id'=>'required',
            'term'=>'required',
            'paymethod_id'=>'required'
        ]);

        $invoices = auth()->user()->invoices()->create([
            'date_created'=>$request->date_created,
            'due_date'=>$request->due_date,
            'sender_id'=>$request->sender_id,
            'receiver_id'=>$request->receiver_id,
            'note'=>$request->note,
            'term'=>$request->term,
            'paymethod_id'=>$request->paymethod_id
        ]);

        foreach ($request->products_name as $key => $productName)
        {
            $invoices->products()->attach($productName, ['amount'=>$request->products[$key]]);
        }   

        //$invoices->products()->sync($request->products);

        session()->flash('success', 'Invoice created successfully.');

        return redirect('/client/invoices');
        
    }

    public function edit(Invoice $invoice)
    {
        return view('client.invoices.edit') 
        ->with('invoice', $invoice)
        ->with('companies', auth()->user()->companies)
        ->with('products', auth()->user()->products)
        ->with('paymethods', auth()->user()->paymethods);
    }

    public function update(Request $request, Invoice $invoices)
    {
        $this->validate(request(), [
            'date_created' => 'required',
            'due_date'=>'required',
            'sender_id'=>'required',
            'receiver_id'=>'required',
            'term'=>'required',
            'paymethod_id'=>'required'
        ]);

        $data=$request->all();

        $invoices->date_created = $data['date_created'];
        $invoices->due_date = $data['due_date'];
        $invoices->sender_id = $data['sender_id'];
        $invoices->receiver_id = $data['receiver_id'];
        $invoices->note = $data['note'];
        $invoices->term = $data['term'];
        $invoices->paymethod_id = $data['paymethod_id'];

        $invoices->products()->sync( $request->products );

        $invoices->update($data);


        session()->flash('success', 'Invoice updated successfully.');

        return redirect('/client/invoices');

    }
    Public function view(Invoice $invoice)
     {
         return view('client.invoices.view')
         ->with('invoice', $invoice)
         ->with('companies', auth()->user()->companies)
         ->with('products', auth()->user()->products)
         ->with('paymethods', auth()->user()->paymethods);
    }

     public function download(Request $request, Invoice $invoice)
     {
         //load path 
         $pdf = PDF::loadView('client.invoices.download',compact('invoice')); 
         //return view('invoices.view', compact('invoice'));
         //name of download file 
         return $pdf->download('Invoice{invoice}.pdf');
         //return $pdf->stream();

         // For send by email, I use :
         // $file = PDF::loadView('invoices', $data)->stream(); $message->attachData($file, $filename, [ 'mime' => 'application/pdf', ]); 
    }

    public function destroy(Invoice $invoice)
    {
        $invoice -> delete();

        session()->flash('success', 'Invoice deleted successfully.');

        return redirect('/client/invoices');
    }

    public function pdfview(Request $request)
    {
        $invoices = Auth::user()->invoices; 

        //Chalet::where('user_id',auth()->id())->get());
       
        //load path 
        $pdf = PDF::loadView('client.invoices.pdf',compact('invoices')); 
        //name of download file 
        return $pdf->download('ListInvoices.pdf');
        //return $pdf->stream();

        // For send by email, I use :
        // $file = PDF::loadView('invoices', $data)->stream(); $message->attachData($file, $filename, [ 'mime' => 'application/pdf', ]); 
    }

}
