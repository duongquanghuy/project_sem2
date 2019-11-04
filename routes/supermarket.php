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

	Route::group(['prefix' => '/employees'], function(){

		Route::get('viewEmps', 'employeesController@viewEmployees')->name('viewEmployees');
	});


	