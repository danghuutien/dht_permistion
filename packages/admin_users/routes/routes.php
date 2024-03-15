<?php
App::booted(function() {
	$namespace = 'Package\AdminUser\Http\Controllers';
	
	Route::namespace($namespace)->name('admin.')->middleware(['web'])->group(function () {
        Route::get('/login', 'AuthController@login')->name('login');
    });
});