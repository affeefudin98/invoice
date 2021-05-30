@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <div class="card">
                    <div class="card-body">
                        
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="list-group">
                                    @foreach ($errors->all() as $error)
                                        <li class="list-group-item text-danger">
                                            {{ $error }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                         @endif

 
                            <div class="card-header p-4 p-md-5 border-bottom-0 bg-gradient-primary-to-secondary text-white-50">
                                <div class="row justify-content-between align-items-center">  
                                    <div class="col-5 col-lg-auto text-center text-lg-left">
                                        <!-- Invoice details-->
                                        <div class="h3 text-white">Invoice #{{$invoice->id}} </div>
                                        Date Created:
                                        <input type="date" class="form-control" id="date_created" name="date_created" value="{{ $invoice->date_created }}"/>
                                    </div>
                                    <div class="col-5 col-lg-auto text-center text-lg-left">
                                        <br>Due Date:<input type="date" class="form-control" id="due_date" name="due_date" value="{{ $invoice->due_date }}">
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="card-body p-4 p-md-5">
                                <!-- Invoice table-->
                                <div class="table-responsive">
                                    <table class="table table-borderless mb-0">
                                        <thead class="border-bottom">
                                            <tr class="small text-uppercase text-muted">
                                                <th scope="col">Item/Service</th>
                                                <th class="text-left" scope="col">Description</th>
                                                <th class="text-right" scope="col">Amount</th>
                                                <th class="text-right" scope="col">Price (RM)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Invoice item 1-->
                                            <tr class="border-bottom">
                                                <td>
                                                    <div class="font-weight-bold">
                                                       
                                                        {{-- <select name="product_id" id="product_id" class="form-control">
                                                            <option value="{{ $invoice->products->id }}"> {{ $invoice->products->name }} </option>
                                                        </select> --}}

                                                        @foreach ($invoice->products as $product)
                                
                                                        <div class="pull-left" class="custom-control custom-checkbox ml-4">
                                                            {{-- <input class="custom-control-input" name="products[]" id="{{ $product->id }}" value="{{ $product->id }}" type="checkbox" checked>
                                                            <label class="custom-control-label" for="{{ $product->id }}">{{ $product->name }}</label> --}}
                                                            <i data-feather="check-square" class="mr-3"></i>{{ $product->name }}
                                                        </div>
                                                        @endforeach

                                                    </div>
                                                </td>
                      
                                                <td class="text-left font-weight-bold">
                                                    @foreach ($invoice->products as $product)         
                                                        <div class="pull-left" class="custom-control custom-checkbox ml-4">
                                                            {{ $product->description }}
                                                        </div>
                                                        @endforeach
                                                </td>
                                                <td class="text-right font-weight-bold">
                                                    @foreach ($invoice->products as $key=>$product)
                                                        {{ $product->pivot->amount }} <br>
                                                    @endforeach
                                                </td>
                                                <td class="text-right font-weight-bold">
                                                    @php
                                                        $subtotal = 0;
                                                    @endphp
                                                    @foreach ($invoice->products as $key=>$product)         
                                                        <div class="pull-left" class="custom-control custom-checkbox ml-4">
                                                            @php
                                                                $amount_price = $product->pivot->amount *  $product->price;
                                                                $subtotal =  $subtotal + $amount_price;
                                                            @endphp
                                                            {{ $amount_price }}

                                                        </div>
                                                    @endforeach
                                                </td>
                                            </tr>
                                            
                                            <!-- Invoice subtotal-->
                                            <tr>
                                                <td class="text-right pb-0" colspan="3"><div class="text-uppercase small font-weight-700 text-muted">Subtotal:</div></td>
                                                <td class="text-right pb-0">
                                                    <div class="h5 mb-0 font-weight-700"> {{ $subtotal }} </div>
                                                </td>
                                            </tr>
                                            <!-- Invoice tax column-->
                                            <tr>
                                                <td class="text-right pb-0" colspan="3"><div class="text-uppercase small font-weight-700 text-muted">Tax:</div></td>
                                                <td class="text-right pb-0">
                                                    <div class="h5 mb-0 font-weight-700">
                                                        @php
                                                            $tax_subtotal = 0;
                                                        @endphp

                                                        {{ $tax_subtotal = $subtotal * $invoice->tax }}
                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- Invoice total-->
                                            <tr>
                                                <td class="text-right pb-0" colspan="3"><div class="text-uppercase small font-weight-700 text-muted">Total Amount Due:</div></td>
                                                <td class="text-right pb-0">
                                                    <div class="h5 mb-0 font-weight-700 text-green" id="total" name="total">
                                                        @php
                                                            $total = 0;
                                                        @endphp

                                                        {{ $total = $subtotal + $tax_subtotal }}
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                           
                            <div class="card-footer p-4 p-lg-5 border-top-0">
                                <div class="row">
                                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                                        <!-- Invoice - sent to info-->
                                        <div class="small text-muted text-uppercase font-weight-700 mb-2">To</div>
                                        <div class="h6 mb-1">{{ $invoice->receiver->name }}</div>
                                        <div class="small">{{ $invoice->receiver->address }}</div>
                                        <div class="small">{{ $invoice->receiver->contact }}</div>
                                        <div class="small">{{ $invoice->receiver->email }}</div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                                        <!-- Invoice - sent from info-->
                                        <div class="small text-muted text-uppercase font-weight-700 mb-2">From</div>
                                        <div class="h6 mb-1">{{ $invoice->sender->name }}</div>
                                        <div class="small">{{ $invoice->sender->address }}</div>
                                        <div class="small">{{ $invoice->sender->contact }}</div>
                                        <div class="small">{{ $invoice->sender->email }}</div>
                                    </div>
                                    <div class="col-lg-6">
                                        <!-- Invoice - additional notes-->
                                        <div class="small text-muted text-uppercase font-weight-700 mb-2">Note</div>
                                        <div class="small mb-0">{{$invoice->note}}</div>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                                        <!-- Invoice - sent to info-->
                                        <div class="small text-muted text-uppercase font-weight-700 mb-2">Payment Method</div>
                                        <div class="h6 mb-1">{{$invoice->paymethod->bank_name}} - {{ $invoice->paymethod->bank_no }}</div>                                 
                                    </div>
                                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                                       
                                    </div>
                                    <div class="col-lg-6">
                                        <!-- Invoice - additional notes-->
                                        <div class="small text-muted text-uppercase font-weight-700 mb-2">Term</div>
                                        <div class="small mb-0">{{$invoice->term}}</div>
                                    </div>
                                </div>
                            </div>
                            <a class="btn btn-primary" href="{{ route('admin.invoice.download', $invoice) }}">Download Invoice</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 


