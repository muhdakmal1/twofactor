<?php

Route::get('/ekad/{user}', 'Ekad\cps_main@view'); 
Route::post('insert_wishes', 'Ekad\cps_wishes@insert_wishes')->name('insert_wishes');
Route::post('recipient_wishes/{user_id}', 'Ekad\cps_wishes@recipient_wishes')->name('recipient_wishes');

Route::redirect('/', '/login');
Route::redirect('/home', '/admin');
Auth::routes(['register' => false]);
Route::get('verify/resend', 'Auth\TwoFactorController@resend')->name('verify.resend');
Route::resource('verify', 'Auth\TwoFactorController')->only(['index', 'store']);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'twofactor']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Kads
    Route::delete('kads/destroy', 'KadsController@massDestroy')->name('kads.massDestroy');
    Route::get('/kads','KadsController@index')->name('kads.index');
    Route::get('/kads/create','KadsController@create')->name('kads.create');
    Route::post('/kads/create','KadsController@store')->name('kads.store');
    Route::get('/kads/edit/{id}','KadsController@edit')->name('kads.edit');
    Route::post('/kads/edit/{id}','KadsController@update')->name('kads.update');
    // Route::resource('kads', 'KadsController');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');
});

Route::get('directive', function () {
      
    $body = '';
  
    if(request()->filled('body')){
        $body = request()->body;        
    }
  
    return view('directive', compact('body'));
});