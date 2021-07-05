@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <div class="card">
                    <div class="card-header">
                        Edit Invoice
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        
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


                        <form action="{{ route('admin.invoices.update', $invoice) }}" method="POST">
                            @csrf
                            
                            <div class="card-header p-4 p-md-5 border-bottom-0 bg-gradient-primary-to-secondary text-white-50">
                                <div class="row justify-content-between align-items-center">  
                                    <div class="col-5 col-lg-auto text-center text-lg-left">
                                        <!-- Invoice details-->
                                        <div class="h3 text-white">Invoice {{$invoice->id}}</div>
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
                                                <th scope="col">Item/Service & Amount</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Invoice item 1-->
                                            <tr class="border-bottom">
                                                <td>
                                                    <div class="font-weight-bold">
                                                        <table>     
                                                            @foreach($invoice->products as $key=>$product)
                                                            <tr>
                                                                <td><input value="{{ $product->id ?? null }}" {{ $product->name ? 'checked' : null }} data-id="{{ $product->id }}" type="checkbox" class="product-enable" name="products_name[{{ $product->id }}]"></td>
                                                                <td>{{ $product->name }}</td>
                                                                <td><input value="{{ $product->pivot->amount  ?? null }}" {{ $product->name ? null : 'disabled' }} data-id="{{ $product->id }}" name="products[{{ $product->id }}]" type="text" class="product-amount form-control" placeholder="Amount"></td>
                                                                
                                                            </tr>
                                                            @endforeach
                                                        </table>

                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- Invoice tax column-->
                                            <tr>
                                                <td class="text-left pb-0" colspan="3"><div class="text-uppercase small font-weight-700 text-muted">Tax (%):</div>
                                                    <select name="tax" id="tax" class="form-control"  required>`
                                                        <option value="{{ $invoice->tax }}"> {{ $invoice->tax * 100}}% </option>
                                                        <option value="0">0%</option>
                                                        <option value="0.01">1%</option>
                                                        <option value="0.02">2%</option>
                                                        <option value="0.03">3%</option>
                                                        <option value="0.04">4%</option>
                                                        <option value="0.05">5%</option>
                                                        <option value="0.06">6%</option>
                                                        <option value="0.07">7%</option>
                                                        <option value="0.08">8%</option>
                                                        <option value="0.09">9%</option>
                                                        <option value="0.1">10%</option>
                                                    </select>
                                                </td>
                                                {{-- <td class="text-ri pb-0"><div class="h5 mb-0 font-weight-700">RM 0</div></td> --}}
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
                                        <div class="h6 mb-1">
                                            <select name="receiver_id" id="receiver_id" class="form-control">
                                                <option value="{{ $invoice->receiver->id }}"> {{ $invoice->receiver->name }} </option>
                                                @foreach ($companies as $company)
                                                    <option value="{{ $company->id }}"> {{ $company->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                                        <!-- Invoice - sent from info-->
                                        <div class="small text-muted text-uppercase font-weight-700 mb-2">From</div>
                                        <div class="h6 mb-0">
                                            <select name="sender_id" id="sender_id" class="form-control">
                                                <option value="{{ $invoice->sender->id }}"> {{ $invoice->sender->name }} </option>
                                                @foreach ($companies as $company)
                                                    <option value="{{ $company->id }}"> {{ $company->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <!-- Invoice - additional notes-->
                                        <div class="small text-muted text-uppercase font-weight-700 mb-2">Note</div>
                                        <div class="small mb-0">
                                            <textarea name="note" id="note" cols="30" rows="5" class="form-control">{{$invoice->note}}</textarea>
                                        </div>
                                    </div>
                                </div>
            
                                <div class="row">
                                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                                        <!-- Invoice - sent from info-->
                                        <div class="small text-muted text-uppercase font-weight-700 mb-2">Payment Method</div>
                                        <div class="h6 mb-0">
                                            <select name="paymethod_id" id="paymethod_id" class="form-control">
                                                <option value="{{ $invoice->paymethod->id }}"> {{ $invoice->paymethod->bank_name }} </option>
                                                @foreach ($paymethods as $paymethod)
                                                    <option value="{{ $paymethod->id }}"> {{ $paymethod->bank_name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                                       
                                    </div>
                                    <div class="col-lg-6">
                                        <!-- Invoice - term-->
                                        <div class="small text-muted text-uppercase font-weight-700 mb-2">Term</div>
                                        <div class="small mb-0">
                                            <textarea name="term" id="term" cols="30" rows="5" class="form-control">{{$invoice->term}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-success">Update Invoice</button>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 

@section('scripts')
    @parent
    <script>
        $('document').ready(function () {
            $('.product-enable').on('click', function () {
                let id = $(this).attr('data-id')
                let enabled = $(this).is(":checked")
                $('.product-amount[data-id="' + id + '"]').attr('disabled', !enabled)
                $('.product-amount[data-id="' + id + '"]').val(null)
            })
        });
    </script>
@endsection


