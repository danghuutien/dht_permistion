<?php
App::booted(function() {
	$namespace = 'Package\AdminUser\Http\Controllers';
	
	Route::namespace($namespace)->name('admin.')->prefix(config('app.admin_dir'))->middleware(['web'])->group(function () {
        Route::get('/login', 'AuthController@login')->name('login');
        Route::post('/login', 'AuthController@setLogin')->name('setLogin');
        Route::get('/logout', 'AuthController@logout')->name('logout');
    });
});