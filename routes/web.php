<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// This is for sample route
Route::get('/sample-test', function () {
    return config('app.env');
});


/* Below the code for create the sample route 
*/

Route::get('/about-us', function(){
    return "hello dinesh";
});

// Below the code send the parameter

Route::get('/user/{id}' , function($id){
    return "User id is " . $id;
});