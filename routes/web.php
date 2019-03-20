<?php

Auth::routes();

Route::get('/', 'PublicController@index')->name('public.index');

Route::get('/property', 'PublicController@property_all')->name('property.index');

Route::get('/property/{property}', 'PublicController@property_single')->name('property.single');

Route::get('/about-us', 'PublicController@about_us')->name('public.about');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/login', [
    'uses'  =>  'Superadmin\Auth\LoginController@showLoginForm',
    'as'    =>  'superadmin.login'
]);

Route::post('/admin/login', [
    'uses'  =>  'Superadmin\Auth\LoginController@login',
    'as'    =>  'superadmin.login'
]);

Route::get('/admin/register', [
    'uses'  =>  'Superadmin\Auth\RegisterController@showRegisterForm',
    'as'    =>  'superadmin.register'
]);

Route::post('/admin/register', [
    'uses'  =>  'Superadmin\Auth\RegisterController@register',
    'as'    =>  'superadmin.register'
]);

Route::group(['prefix'=>'admin', 'middleware'=>'auth:superadmin'], function(){

    Route::get('/dashboard', 'Superadmin\SuperAdminController@index')->name('superadmin.dashboard');

    Route::resource('category', 'CategoryController');

    Route::resource('seller', 'Superadmin\SellerController');

    Route::resource('buyer', 'Superadmin\BuyerController');

    Route::resource('member', 'Superadmin\MemberController');

    Route::get('room', 'Superadmin\RoomController@index')->name('superadmin.room.index');

    Route::get('room/{room}', 'Superadmin\RoomController@show')->name('superadmin.room.show');

    Route::get('room/{room}/edit', 'Superadmin\RoomController@edit')->name('superadmin.room.edit');

    Route::post('room/{room}/edit', 'Superadmin\RoomController@update')->name('superadmin.room.update');

    Route::post('room/{room}', 'Superadmin\RoomController@destroy')->name('superadmin.room.destroy');

    Route::get('/profile', 'Superadmin\ProfileController@show')->name('superadmin.profile');

    Route::get('/profile/edit', 'Superadmin\ProfileController@edit')->name('superadmin.edit');

    Route::post('/profile/edit', 'Superadmin\ProfileController@update')->name('superadmin.update');
});

Route::group(['prefix'=>'buyer', 'middleware'=>['auth', 'checkBuyer']], function(){
    Route::get('/dashboard', [
        'uses'  =>  'Buyer\BuyerController@dashboard',
        'as'    =>  'buyer'
    ]);

    Route::get('/profile', 'Buyer\BuyerController@show')->name('buyer.profile');

    Route::get('/profile/edit', 'Buyer\BuyerController@edit')->name('buyer.edit');

    Route::post('/profile/edit', 'Buyer\BuyerController@update')->name('buyer.update');
});

Route::group(['prefix'=>'seller', 'middleware'=>['auth', 'checkSeller']], function(){
    Route::get('/dashboard', [
        'uses'  =>  'Seller\SellerController@dashboard',
        'as'    =>  'seller'
    ]);

    Route::get('/profile', 'Seller\SellerController@show')->name('seller.profile');

    Route::get('/profile/edit', 'Seller\SellerController@edit')->name('seller.edit');

    Route::post('/profile/edit', 'Seller\SellerController@update')->name('seller.update');

    Route::resource('room', 'RoomController');
});
