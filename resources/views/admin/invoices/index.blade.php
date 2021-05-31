@extends('layouts.main')

@section('content')
<html lang="en">

    <body class="nav-fixed">

        <main>
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif

            <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
                <div class="container">
                    <div class="page-header-content pt-4">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-auto mt-4">
                                <h1 class="page-header-title">
                                    <div class="page-header-icon"><i data-feather="activity"></i></div>
                                    Invoices
                                </h1>
                                <div class="page-header-subtitle">List of invoices generated</div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Main page content-->
            <div class="container mt-n10">
                <!-- Example DataTable for Dashboard Demo-->
                <div class="card mb-4">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href="{{ route('admin.invoices.create') }}" class="btn btn-success mb-3">Create New Invoice</a>

                        <div class="datatable">
                            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>FROM</th>
                                        <th>TO</th>
                                        <th>PRODUCT</th>
                                        <th>PAYMETHOD</th>
                                        <th>NOTE</th>
                                        <th>TERM</th>
                                        <th>DATE CREATED</th>
                                        <th>DUE DATE</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($invoices as $invoice)
                                    <tr>
                                        <td>{{ $invoice->id }}</td>
                                        <td>{{ $invoice->sender->name }}</td>
                                        <td>{{ $invoice->receiver->name}}</td>
                                        <td>
                                            @foreach ($invoice->products as $product)
                                            <i data-feather="check"></i>{{ $product->name }} <br>
                                            @endforeach
                                        </td> 
                                        <td>{{ $invoice->paymethod->bank_name }}</td>
                                        <td>{{ $invoice->note }}</td>
                                        <td>{{ $invoice->term }}</td>
                                        <td>{{ $invoice->date_created }}</td>
                                        <td>{{ $invoice->due_date }}</td>
                                        <td>
                                            <a href="{{ route('admin.invoice.view', $invoice->id) }}" class="btn btn-primary btn-sm float-end">View</a><br>
                                            <a href="{{ route('admin.invoice.edit', $invoice->id) }}" class="btn btn-warning btn-sm float-end">Edit</a><br>
                                            <a href="{{ route('admin.invoice.destroy', $invoice->id) }}" class="btn btn-danger btn-sm float-end">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- {{ $invoices->links()  }} --}}
                        </div>
                        <a class="btn btn-primary" href="{{ route('admin.invoices.pdf') }}">Export to PDF</a>
                    </div>
                </div>
            </div>
        </main>
    
    </body>
</html>
@endsection