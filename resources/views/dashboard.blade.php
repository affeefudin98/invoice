@extends('layouts.main')

@section('content')

<html lang="en">

    <body class="nav-fixed">

        <main>
            <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
                <div class="container">
                    <div class="page-header-content pt-4">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-auto mt-4">
                                <h1 class="page-header-title">
                                    <div class="page-header-icon"><i data-feather="activity"></i></div>
                                    Dashboard
                                </h1>
                                <div class="page-header-subtitle">Invoice Management System</div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Main page content-->
            <div class="container mt-n10">
                <div class="row">
                    <div class="col-xxl-4 col-xl-12 mb-4">
                        <div class="card h-100">
                            <div class="card-body h-100 d-flex flex-column justify-content-center py-5 py-xl-4">
                                <div class="row align-items-center">
                                    <div class="col-xl-8 col-xxl-12">
                                        <div class="text-center text-xl-left text-xxl-center px-4 mb-4 mb-xl-0 mb-xxl-4">
                                            <h1 class="text-primary">Welcome {{ Auth::user()->name }}</h1>
                                            <p class="text-gray-700 mb-0">Intership Task</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Example Colored Cards for Dashboard Demo-->
                <div class="row">
                    <div class="col-xxl-3 col-lg-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mr-3">
                                        <div class="text-white-75 small">Total Invoices</div>
                                        <div class="text-lg font-weight-bold">{{$totalInvoices}}</div>
                                    </div>
                                    <i class="feather-xl text-white-50" data-feather="calendar"></i>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                @auth
                                    @if (Auth::user()->isAdmin())
                                        <a class="small text-white stretched-link" href="{{ route('admin.invoices.index') }}">View</a>
                                    @elseif (Auth::user()->isClient())
                                        <a class="small text-white stretched-link" href="{{ route('client.invoices.index') }}">View</a>
                                    @endif
                                @endauth
                    
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-lg-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mr-3">
                                        <div class="text-white-75 small">Total Companies</div>
                                        <div class="text-lg font-weight-bold">{{ $totalCompanies }}</div>
                                    </div>
                                    <i class="feather-xl text-white-50" data-feather="dollar-sign"></i>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                @auth
                                    @if (Auth::user()->isAdmin())
                                        <a class="small text-white stretched-link" href="{{ route('admin.companies.index') }}">View</a>
                                    @elseif (Auth::user()->isClient())
                                        <a class="small text-white stretched-link" href="{{ route('client.companies.index') }}">View</a>
                                    @endif
                                @endauth
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-lg-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mr-3">
                                        <div class="text-white-75 small">Total Products</div>
                                        <div class="text-lg font-weight-bold">{{ $totalProducts }}</div>
                                    </div>
                                    <i class="feather-xl text-white-50" data-feather="check-square"></i>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                @auth
                                    @if (Auth::user()->isAdmin())
                                        <a class="small text-white stretched-link" href="{{ route('admin.products.index') }}">View</a>
                                    @elseif (Auth::user()->isClient())
                                        <a class="small text-white stretched-link" href="{{ route('client.products.index') }}">View</a>
                                    @endif
                                @endauth
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-lg-6">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mr-3">
                                        <div class="text-white-75 small">Total Payment Methods</div>
                                        <div class="text-lg font-weight-bold">{{ $totalPaymethods }}</div>
                                    </div>
                                    <i class="feather-xl text-white-50" data-feather="message-circle"></i>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                @auth
                                    @if (Auth::user()->isAdmin())
                                        <a class="small text-white stretched-link" href="{{ route('admin.paymethods.index') }}">View</a>
                                    @elseif (Auth::user()->isClient())
                                        <a class="small text-white stretched-link" href="{{ route('client.paymethods.index') }}">View</a>
                                    @endif
                                @endauth
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    
    </body>
</html>
@endsection