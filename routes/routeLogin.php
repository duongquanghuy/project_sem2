<?php

Route::group(['prefix' => '/admin', 'middleware' => 'adminLogin'], function () {
		Route::get('/test', function(){
			return view('test');
		})->name('test');
		
		Route::get('/logout' , 'controllerLogin@handlerLogout')->name('handler-logout');
		Route::get('/register', function(){
			return view('registerForm');
		});
		Route::post('/register', 'controllerRegister@handlerRegister')->name('handler-register');
	});  


	Route::get('/admin/login', function(){
			return view('loginForm');});
	Route::post('/admin/login', 'controllerLogin@handlerLogin')->name('handler-login');