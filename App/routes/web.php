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

Router::get('/change-password', 'App\Controllers\Auth\ChangePasswordController@showChangePasswordForm');
Router::post('/change-password', 'App\Controllers\Auth\ChangePasswordController@changePassword');

Router::get('/profile', 'App\Controllers\UserController@showProfile');

Router::get('/profile/edit', 'App\Controllers\UserController@showUpdateProfile');
Router::post('/profile/edit', 'App\Controllers\UserController@updateProfile');

Router::error(function () {
    echo '404 :: Page Not Found';
});