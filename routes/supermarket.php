<?php
	
	Route::group(['prefix' => '/customers'] , function(){

		Route::get('/viewCus' , 'customersController@addCustomer')->name('addCustomers');
		Route::post('/viesPostCus' , 'customersController@viewPostPhones')->name('viewPostPhone');
		Route::get('/viesaddcus' , 'customersController@viewAddCustomer')->name('viewPostCus');

		//display customer

		Route::get('/indexCus' , 'customersController@displayCustomer')->name('displayCus');
		Route::get('/indexCusSearch' , 'customersController@viewSearchPhoneNum')->name('viewSearchPhoneNum');



	});


	