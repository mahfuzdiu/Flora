<?php

use app\core\Route;

Route::get('/','HomeController@welcome');
Route::get('/home','HomeController@home');
Route::get('/login','LoginController@login');
Route::get('/admin','AdminController@admin');