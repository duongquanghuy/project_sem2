<?php

Route::group(['prefix' => '/admin' /*, 'middleware' => 'adminLogin'*/], function () {
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


		Route::get('/logout' , 'controllerLogin@handlerLogout')->name('handler-logout');
		Route::get('/register', function(){
			return view('registerForm');
		});
		Route::post('/register', 'controllerRegister@handlerRegister')->name('handler-register');
	});  


	Route::get('/admin/login', function(){
			return view('loginForm');});
	Route::post('/admin/login', 'controllerLogin@handlerLogin')->name('handler-login');