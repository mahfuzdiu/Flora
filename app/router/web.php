<?php

use app\core\Route;

Route::get('/','HomeController@welcome');
Route::get('/buyers','BuyerController@getBuyers');
Route::post('/submit-data','BuyerController@store');