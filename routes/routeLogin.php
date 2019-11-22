<?php

Route::group(['prefix' => '/admin' , 'middleware' => 'adminLogin'], function () {
		Route::get('/test', function(){
			return view('test');
		})->name('test');

		//product
		Route::get('/product-manage', 'controllerProductManage@showAll')->name('product-manage');
		Route::get('/product-manage/edit', 'controllerProductManage@editProduct')->name('edit-product');
		Route::post('/product-manage/add', 'controllerProductManage@addProduct')->name('add-product');
		Route::post('/product-manage/search', 'controllerProductManage@searchProduct')->name('search-product');
		Route::post('/product-manage/delete', 'controllerProductManage@deleteProduct')->name('delete-product');

		//employee
		Route::get('/employee-manage', 'controllerEmployeeManage@showAll')->name('employee-manage');
		Route::get('/employee-manage/edit', 'controllerEmployeeManage@editEmployee')->name('edit-employee');
		Route::post('/employee-manage/update', 'controllerEmployeeManage@updateEmployee')->name('update-employee');
		Route::post('/employee-manage/delete', 'controllerEmployeeManage@deleteEmployee')->name('delete-employee');


		//sale
		Route::get('/sales-statistic', 'controllerSalesStatistic@showAll')->name('sales-manage');
		Route::post('/sales-statistic/search', 'controllerSalesStatistic@searchSales')->name('search-sales');

		//customer
		Route::get('/customers/indexCus' , 'customersController@displayCustomer')->name('displayCus');
		Route::post('/customers/viesPostCus' , 'customersController@viewPostPhones')->name('viewPostPhone');
		Route::get('/customers/indexCusSearch' , 'customersController@viewSearchPhoneNum')->name('viewSearchPhoneNum');
		Route::get('/customers/cusSearch' , 'customersController@viewSearchCustomer')->name('viewSearchCustomer');
		Route::post('/customers/cusEditCusID' , 'customersController@vieweditCustomerID')->name('vieweditCustomerID');
		Route::get('/customers/cusUpdataCus' , 'customersController@viewAddCustomer')->name('vieweditCustomer');

		//order
		Route::get('/orders/viewOrder', 'orderContronller@viewAddOrders')->name('viewAddOrders');
		Route::get('/orders/addProduct', 'orderContronller@viewAddProduct')->name('viewAddProduct');
		Route::post('/orders/checkPhone', 'orderContronller@viewOrderPostPhone')->name('viewOrderPostPhone');
		Route::post('/orders/OrderPost', 'orderContronller@viewOrderPostProduct')->name('viewOrderPostProduct');
		Route::get('/orders/printOrder', 'orderContronller@printOrderID')->name('printOrderID');
		Route::get('/orders/printOrderIndex', 'orderContronller@printOrderIdIndex')->name('printOrderIdIndex');
		Route::get('/orders/viewIndexOrder', 'orderContronller@displayOrder')->name('displayOrder');
		Route::get('/orders/serachDay', 'orderContronller@searchDaytime')->name('searchDaytime');
		Route::get('/orders/edit', 'orderContronller@editOrderID')->name('editOrderID');
		Route::post('/orders/editAddProduct', 'orderContronller@addProductOreder')->name('addProductOreder');
		Route::post('/orders/editQuantity', 'orderContronller@addProductQuantityOreders')->name('addProductQuantityOreder');
		Route::post('/orders/deleteOrder', 'orderContronller@deleteOrderID')->name('deleteOrderID');
		Route::post('/orders/deleteProduct', 'orderContronller@deleteProductInOrder')->name('deleteProductInOrder');

		//sale company
		Route::get('/sale-of-company', 'controllerSaleOfCompany@saleOfCompany')->name('sale-of-company');
		Route::get('/sale-total-company', 'controllerSaleOfCompany@saleTotalCompany')->name('sale-total-company');
		Route::get('/sale-by-time', 'controllerSaleOfCompany@saleByTime')->name('sale-by-time');


		//logout and register
		Route::get('/logout' , 'controllerLogin@handlerLogout')->name('handler-logout');
		Route::get('/register', function(){
			return view('registerForm');
		});
		Route::post('/register', 'controllerRegister@handlerRegister')->name('handler-register');
	});


	Route::get('/admin/login', function(){
			return view('loginForm');});
	Route::post('/admin/login', 'controllerLogin@handlerLogin')->name('handler-login');