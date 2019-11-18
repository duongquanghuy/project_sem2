<?php
	
	Route::group(['prefix' => '/customers'] , function(){

		Route::get('/viewCus' , 'customersController@addCustomer')->name('addCustomers');
		Route::post('/viesPostCus' , 'customersController@viewPostPhones')->name('viewPostPhone');
		

		//display customer

		Route::get('/indexCus' , 'customersController@displayCustomer')->name('displayCus');
		Route::get('/indexCusSearch' , 'customersController@viewSearchPhoneNum')->name('viewSearchPhoneNum');

		//seaech customer
		Route::get('/cusSearch' , 'customersController@viewSearchCustomer')->name('viewSearchCustomer');
		//edit
		Route::post('/cusEditCusID' , 'customersController@vieweditCustomerID')->name('vieweditCustomerID');
		Route::get('/cusUpdataCus' , 'customersController@viewAddCustomer')->name('vieweditCustomer');


	});
	// nhan vien
	Route::group(['prefix' => '/employees'], function(){

		Route::get('/viewEmps', 'employeesController@viewEmployees')->name('viewEmployees');
	});
	// don hang

	Route::group(['prefix' => '/orders'], function(){

		Route::get('/viewOrder', 'orderContronller@viewAddOrders')->name('viewAddOrders');

		// them don hang
		Route::get('/addProduct', 'orderContronller@viewAddProduct')->name('viewAddProduct');

		Route::post('/checkPhone', 'orderContronller@viewOrderPostPhone')->name('viewOrderPostPhone');
		// gui du lieu don hang len sever
		Route::post('/OrderPost', 'orderContronller@viewOrderPostProduct')->name('viewOrderPostProduct');

		Route::get('/printOrder', 'orderContronller@printOrderID')->name('printOrderID');
		////////////////////////////DisPlay , them , sua , xoa////////////


		Route::get('/viewIndexOrder', 'orderContronller@displayOrder')->name('displayOrder');

		Route::get('/serachDay', 'orderContronller@searchDaytime')->name('searchDaytime');

		Route::get('/edit', 'orderContronller@editOrderID')->name('editOrderID');
		// them tung san pham
		Route::post('/editAddProduct', 'orderContronller@addProductOreder')->name('addProductOreder');
		//sua so luong san pham da co
		Route::post('/editQuantity', 'orderContronller@addProductQuantityOreders')->name('addProductQuantityOreder');
		Route::post('/editQuantityButton', 'orderContronller@addProductQuantityOrederButton')->name('addProductQuantityOrederButton');


		
		
	});

	