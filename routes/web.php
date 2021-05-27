<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

//--------------------------------------------ADMIN-------------------------------------------------------------

Route::middleware(['auth', 'can:admin-views'])->group(function(){

    Route::get('/admin/dashboard', 'Admin\DashboardController@index')->name('admin.dashboard.index');
    Route::get('/admin/profile', 'Admin\AccountController@profile')->name('admin.accounts.profile');
    Route::post('/admin/profile/{user}/update', 'Admin\AccountController@profileUpdate')->name('admin.accounts.profileUpdate');
    Route::post('/admin/profile/pictureUpload', 'Admin\AccountController@upload')->name('admin.accounts.upload');
    Route::get('/admin/password', 'Admin\AccountController@password')->name('admin.accounts.password');
    Route::post('/admin/password-update', 'Admin\AccountController@passwordUpdate')->name('admin.accounts.passwordUpdate');

    //companies
    Route::get('/admin/companies', 'Admin\CompanyController@index')->name('admin.companies.index');
    Route::get('/admin/add-company', 'Admin\CompanyController@create')->name('admin.companies.create');
    Route::post('/admin/store-company', 'Admin\CompanyController@store')->name('admin.companies.store');
    Route::get('/admin/pdf-company', 'Admin\CompanyController@pdfview')->name('admin.companies.pdf');
    Route::get('/admin/companies/{companies}/edit', 'Admin\CompanyController@edit')->name('admin.companies.edit');
    Route::post('/admin/companies/{companies}/update-company', 'Admin\CompanyController@update')->name('admin.companies.update');
    Route::get('/admin/companies/{company}/delete', 'Admin\CompanyController@destroy')->name('admin.companies.destroy');

    //products
    Route::get('/admin/products', 'Admin\ProductController@index')->name('admin.products.index');
    Route::get('/admin/add-product', 'Admin\ProductController@create')->name('admin.products.create');
    Route::post('/admin/store-product', 'Admin\ProductController@store')->name('admin.products.store');
    Route::get('/admin/pdf-product', 'Admin\ProductController@pdfview')->name('admin.products.pdf');
    Route::get('/admin/products/{products}/edit', 'Admin\ProductController@edit')->name('admin.products.edit');
    Route::post('/admin/products/{products}/update-product', 'Admin\ProductController@update')->name('admin.products.update');
    Route::get('/admin/products/{product}/delete', 'Admin\ProductController@destroy')->name('admin.product.destroy');

    //paymethods
    Route::get('/admin/paymethods', 'Admin\PaymethodController@index')->name('admin.paymethods.index');
    Route::get('/admin/add-paymethod', 'Admin\PaymethodController@create')->name('admin.paymethods.create');
    Route::post('/admin/store-paymethod', 'Admin\PaymethodController@store')->name('admin.paymethods.store');
    Route::get('/admin/pdf-paymethod', 'Admin\PaymethodController@pdfview')->name('admin.paymethods.pdf');
    Route::get('/admin/paymethods/{paymethods}/edit', 'Admin\PaymethodController@edit')->name('admin.paymethods.edit');
    Route::post('/admin/paymethods/{paymethods}/update-paymethod', 'Admin\PaymethodController@update')->name('admin.paymethods.update');
    Route::get('/admin/paymethods/{paymethod}/delete', 'Admin\PaymethodController@destroy')->name('admin.paymethod.destroy');

    //invoices
    Route::get('/admin/invoices', 'Admin\InvoiceController@index')->name('admin.invoices.index');
    Route::get('/admin/add-invoice', 'Admin\InvoiceController@create')->name('admin.invoices.create');
    Route::post('/admin/store-invoice', 'Admin\InvoiceController@store')->name('admin.invoices.store');
    Route::get('/admin/pdf-invoice', 'Admin\InvoiceController@pdfview')->name('admin.invoices.pdf');
    Route::get('/admin/invoices/{invoice}', 'Admin\InvoiceController@view')->name('admin.invoice.view');
    Route::get('/admin/invoices/{invoice}/edit', 'Admin\InvoiceController@edit')->name('admin.invoice.edit');
    Route::post('/admin/invoices/{invoices}/update-invoice', 'Admin\InvoiceController@update')->name('admin.invoices.update');
    Route::get('/admin/invoices/{invoice}/delete', 'Admin\InvoiceController@destroy')->name('admin.invoice.destroy');

    Route::get('/admin/invoices/{invoice}/download', 'Admin\InvoiceController@download')->name('admin.invoice.download');
});




//--------------------------------------------CLIENT------------------------------------------------------------

Route::middleware(['auth', 'can:client-views'])->group(function(){

    Route::get('/client/dashboard', 'Client\DashboardController@index')->name('client.dashboard.index');
    Route::get('/client/profile', 'Client\AccountController@profile')->name('client.accounts.profile');
    Route::post('/client/profile/{user}/update', 'Client\AccountController@profileUpdate')->name('client.accounts.profileUpdate');
    Route::post('/client/profile/pictureUpload', 'Client\AccountController@upload')->name('client.accounts.upload');
    Route::get('/client/password', 'Client\AccountController@password')->name('client.accounts.password');
    Route::post('/client/password-update', 'Client\AccountController@passwordUpdate')->name('client.accounts.passwordUpdate');

    //companies
    Route::get('/client/companies', 'Client\CompanyController@index')->name('client.companies.index');
    Route::get('/client/add-company', 'Client\CompanyController@create')->name('client.companies.create');
    Route::post('/client/store-company', 'Client\CompanyController@store')->name('client.companies.store');
    Route::get('/client/pdf-company', 'Client\CompanyController@pdfview')->name('client.companies.pdf');
    Route::get('/client/companies/{companies}/edit', 'Client\CompanyController@edit')->name('client.companies.edit');
    Route::post('/client/companies/{companies}/update-company', 'Client\CompanyController@update')->name('client.companies.update');
    Route::get('/client/companies/{company}/delete', 'Client\CompanyController@destroy')->name('client.companies.destroy');

    //products
    Route::get('/client/products', 'Client\ProductController@index')->name('client.products.index');
    Route::get('/client/add-product', 'Client\ProductController@create')->name('client.products.create');
    Route::post('/client/store-product', 'Client\ProductController@store')->name('client.products.store');
    Route::get('/client/pdf-product', 'Client\ProductController@pdfview')->name('client.products.pdf');
    Route::get('/client/products/{products}/edit', 'Client\ProductController@edit')->name('client.products.edit');
    Route::post('/client/products/{products}/update-product', 'Client\ProductController@update')->name('client.products.update');
    Route::get('/client/products/{product}/delete', 'Client\ProductController@destroy')->name('client.product.destroy');

    //paymethods
    Route::get('/client/paymethods', 'Client\PaymethodController@index')->name('client.paymethods.index');
    Route::get('/client/add-paymethod', 'Client\PaymethodController@create')->name('client.paymethods.create');
    Route::post('/client/store-paymethod', 'Client\PaymethodController@store')->name('client.paymethods.store');
    Route::get('/client/pdf-paymethod', 'Client\PaymethodController@pdfview')->name('client.paymethods.pdf');
    Route::get('/client/paymethods/{paymethods}/edit', 'Client\PaymethodController@edit')->name('client.paymethods.edit');
    Route::post('/client/paymethods/{paymethods}/update-paymethod', 'Client\PaymethodController@update')->name('client.paymethods.update');
    Route::get('/client/paymethods/{paymethod}/delete', 'Client\PaymethodController@destroy')->name('client.paymethod.destroy');

    //invoices
    Route::get('/client/invoices', 'Client\InvoiceController@index')->name('client.invoices.index');
    Route::get('/client/add-invoice', 'Client\InvoiceController@create')->name('client.invoices.create');
    Route::post('/client/store-invoice', 'Client\InvoiceController@store')->name('client.invoices.store');
    Route::get('/client/pdf-invoice', 'Client\InvoiceController@pdfview')->name('client.invoices.pdf');
    Route::get('/client/invoices/{invoice}', 'Client\InvoiceController@view')->name('client.invoice.view');
    Route::get('/client/invoices/{invoice}/edit', 'Client\InvoiceController@edit')->name('client.invoice.edit');
    Route::post('/client/invoices/{invoices}/update-invoice', 'Client\InvoiceController@update')->name('client.invoices.update');
    Route::get('/client/invoices/{invoice}/delete', 'Client\InvoiceController@destroy')->name('client.invoice.destroy');

    //error
    Route::get('/client/invoices/{invoice}/download', 'Client\InvoiceController@download')->name('client.invoice.download');

});


//pdf test
Route::get('/pdf/preview', 'PdfController@index')->name('pdf.preview');
Route::get('/pdf/generate', 'PdfController@create')->name('pdf.generate');