<?php

use app\core\Route;

Route::get('/','HomeController@welcome');
Route::get('/submit','HomeController@submitForm');