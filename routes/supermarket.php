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

		
	});

	