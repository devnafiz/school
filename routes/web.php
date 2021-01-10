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
  //student group
   Route::get('/student/group/view','StudentGroupController@view')->name('setups.student.group.view');
  Route::get('/student/group/add','StudentGroupController@add')->name('setups.student.group.add');
  Route::post('/student/group/store','StudentGroupController@store')->name('setups.student.group.store');
  Route::get('/student/group/edit/{id}','StudentGroupController@edit')->name('setups.student.group.edit');
  Route::post('/student/group/update/{id}','StudentGroupController@update')->name('setups.student.group.update');
  Route::post('/student/group/delete/','StudentGroupController@delete')->name('setups.student.group.delete');

  //student shift

   Route::get('/student/shift/view','StudentShiftController@view')->name('setups.student.shift.view');
  Route::get('/student/shift/add','StudentShiftController@add')->name('setups.student.shift.add');
  Route::post('/student/shift/store','StudentShiftController@store')->name('setups.student.shift.store');
  Route::get('/student/shift/edit/{id}','StudentShiftController@edit')->name('setups.student.shift.edit');
  Route::post('/student/shift/update/{id}','StudentShiftController@update')->name('setups.student.shift.update');
  Route::post('/student/shift/delete/','StudentShiftController@delete')->name('setups.student.shift.delete');

  //student shift

   Route::get('/student/fee/category/view','FeeCategoryController@view')->name('setups.fee.category.view');
  Route::get('/student/fee/category/add','FeeCategoryController@add')->name('setups.fee.category.add');
  Route::post('/student/fee/category/store','FeeCategoryController@store')->name('setups.fee.category.store');
  Route::get('/student/fee/category/edit/{id}','FeeCategoryController@edit')->name('setups.fee.category.edit');
  Route::post('/student/fee/category/update/{id}','FeeCategoryController@update')->name('setups.fee.category.update');
  Route::post('/student/fee/category/delete/','FeeCategoryController@delete')->name('setups.fee.category.delete');
  //fee Amount

   Route::get('/student/fee/amount/view','FeeAmountController@view')->name('setups.fee.amount.view');
  Route::get('/student/fee/amount/add','FeeAmountController@add')->name('setups.fee.amount.add');
  Route::post('/student/fee/amount/store','FeeAmountController@store')->name('setups.fee.amount.store');
  Route::get('/student/fee/amount/edit/{fee_category_id}','FeeAmountController@edit')->name('setups.fee.amount.edit');
  Route::post('/student/fee/amount/update/{fee_category_id}','FeeAmountController@update')->name('setups.fee.amount.update');
  Route::get('/student/fee/amount/details/{fee_category_id}','FeeAmountController@details')->name('setups.fee.amount.details');
  Route::post('/student/fee/amount/delete/','FeeAmountController@delete')->name('setups.fee.amount.delete');


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



