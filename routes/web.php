<?php

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


Route::get('/','FrontendController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware'=>'auth'],function(){
	 Route::prefix('users')->group(function(){
  Route::get('/view','UserController@view')->name('users.view');
  Route::get('/add','UserController@addUser')->name('users.add');
  Route::post('/store','UserController@store')->name('users.store');
  Route::get('/edit/{id}','UserController@edit')->name('users.edit');
  Route::post('/update/{id}','UserController@update')->name('users.update');
  Route::get('/delete/{id}','UserController@delete')->name('users.delete');

});

Route::prefix('profiles')->group(function(){
  Route::get('/view','ProfileController@view')->name('profiles.view');
  Route::get('/edit','ProfileController@edit')->name('profiles.edit');
  Route::post('/store','ProfileController@update')->name('profiles.update');
  

});

 Route::prefix('setups')->group(function(){
  Route::get('/view','StudentClassController@view')->name('setups.student.class.view');
  Route::get('/add','StudentClassController@add')->name('setups.student.class.add');
  Route::post('/store','StudentClassController@store')->name('setups.student.class.store');
  Route::get('/edit/{id}','StudentClassController@edit')->name('setups.student.class.edit');
  Route::post('/update/{id}','StudentClassController@update')->name('setups.student.class.update');
  Route::post('/delete/','StudentClassController@delete')->name('setups.student.class.delete');

  //student year
   Route::get('/student/year/view','StudentYearController@view')->name('setups.student.year.view');
  Route::get('/student/year/add','StudentYearController@add')->name('setups.student.year.add');
  Route::post('/student/year/store','StudentYearController@store')->name('setups.student.year.store');
  Route::get('/student/year/edit/{id}','StudentYearController@edit')->name('setups.student.year.edit');
  Route::post('/student/year/update/{id}','StudentYearController@update')->name('setups.student.year.update');
  Route::post('/student/year/delete/','StudentYearController@delete')->name('setups.student.year.delete');


});
 

  Route::prefix('customers')->group(function(){
  Route::get('/view','CustomerController@view')->name('customers.view');
  Route::get('/add','CustomerController@add')->name('customers.add');
  Route::post('/store','CustomerController@store')->name('customers.store');
  Route::get('/edit/{id}','CustomerController@edit')->name('customers.edit');
  Route::post('/update/{id}','CustomerController@update')->name('customers.update');
  Route::get('/delete/{id}','CustomerController@delete')->name('customers.delete');
  Route::get('/credit','CustomerController@creditCustomer')->name('customers.credit');
  Route::get('/credit/pdf','CustomerController@creditCustomerPdf')->name('customers.credit.pdf');
  Route::get('/invoice/edit/{invoice_id}','CustomerController@editInvoice')->name('customers.edit.invoice');
   Route::post('/invoice/update/{invoice_id}','CustomerController@updateInvoice')->name('customers.update.invoice');
   Route::get('/invoice/details/{invoice_id}','CustomerController@invoiceDetailsPdf')->name('customers.invoice.details.pdf');
  Route::get('/paid','CustomerController@paidCustomer')->name('customers.paid');
  Route::get('/paid/pdf','CustomerController@paidCustomerPdf')->name('customers.paid.pdf');
  Route::get('/wise/report','CustomerController@customerWiseReport')->name('customers.wise.report');
  Route::get('/wise/credit/report','CustomerController@customerWiseCredit')->name('customers.wise.credit.report');
  Route::get('/wise/paid/report','CustomerController@customerWisePaid')->name('customers.wise.paid.report');

});
 
  Route::prefix('categories')->group(function(){
  Route::get('/view','CategoryController@view')->name('categories.view');
  Route::get('/add','CategoryController@add')->name('categories.add');
  Route::post('/store','CategoryController@store')->name('categories.store');
  Route::get('/edit/{id}','CategoryController@edit')->name('categories.edit');
  Route::post('/update/{id}','CategoryController@update')->name('categories.update');
  Route::get('/delete/{id}','CategoryController@delete')->name('categories.delete');

});
  
  
  Route::get('/get-category','DefaultController@getCategory')->name('get-category');
  Route::get('/get-product','DefaultController@getProduct')->name('get-product');
   Route::get('/get-stock','DefaultController@getStock')->name('check-product-stock');

  Route::prefix('invoice')->group(function(){
  Route::get('/view','InvoiceController@view')->name('invoice.view');
  Route::get('/add','InvoiceController@add')->name('invoice.add');
  Route::post('/store','InvoiceController@store')->name('invoice.store');
  Route::get('/pending','InvoiceController@pending')->name('invoice.pending');
  Route::get('/approve/{id}','InvoiceController@approve')->name('invoice.approve');
  Route::get('/delete/{id}','InvoiceController@delete')->name('invoice.delete');
  Route::post('/approve/store/{id}','InvoiceController@approvalStore')->name('approve.store');
  Route::get('/print/list','InvoiceController@printInvoiceList')->name('invoice.print.list');
  Route::get('/print/{id}','InvoiceController@printInvoice')->name('invoice.print');
  Route::get('/daily/report','InvoiceController@invoiceReport')->name('invoice.daily.report');
  Route::get('/daily/report/pdf','InvoiceController@invoiceReportPdf')->name('daily.invoice.pdf');
 

});

 


});



