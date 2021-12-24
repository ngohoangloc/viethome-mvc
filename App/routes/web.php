<?php

use App\Router;


Router::get('/', 'App\Controllers\HomeController@index');
Router::get('/home', 'App\Controllers\HomeController@index');

Router::get('/login', 'App\Controllers\Auth\LoginController@showLoginForm');
Router::post('/login', 'App\Controllers\Auth\LoginController@login');

Router::get('/register', 'App\Controllers\Auth\RegisterController@showRegisterForm');
Router::post('/register', 'App\Controllers\Auth\RegisterController@register');

Router::get('/logout', 'App\Controllers\Auth\LoginController@logout');
Router::post('/logout', 'App\Controllers\Auth\LoginController@logout');

Router::get('/about', 'App\Controllers\AboutController@index');

Router::get('/contact', 'App\Controllers\ContactController@index');

Router::get('/shop', 'App\Controllers\Shop\ShopController@index');

Router::get('/change-password', 'App\Controllers\Auth\ChangePasswordController@showChangePasswordForm');
Router::post('/change-password', 'App\Controllers\Auth\ChangePasswordController@changePassword');

Router::get('/profile', 'App\Controllers\UserController@showProfile');

Router::get('/profile/edit', 'App\Controllers\UserController@showUpdateProfile');
Router::post('/profile/edit', 'App\Controllers\UserController@updateProfile');


Router::get('/admin/product', 'App\Controllers\Admin\ProductController@product');

Router::post('/admin/product/delete', 'App\Controllers\Admin\ProductController@deleteProduct');

Router::get('/admin/product/add', 'App\Controllers\Admin\ProductController@showInsertProduct');
Router::post('/admin/product/add', 'App\Controllers\Admin\ProductController@insertProduct');

Router::get('/admin/product/edit', 'App\Controllers\Admin\ProductController@showEditForm');
Router::post('/admin/product/edit', 'App\Controllers\Admin\ProductController@updateProduct');

Router::get('/admin/product/search', 'App\Controllers\Admin\ProductController@searchProduct');

Router::error("\App\Controllers\ErrorController@notFoundError");