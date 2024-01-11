<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Route::get('/about-us', [HomeController::class,'aboutUs']); // :: this is the scope resolution operater ithu vanthu intha class la iruku nu solurathuku

// Below the code send the parameter

// Route::get('/user/{id}' , function($id){
//     return "User id is " . $id;
// });

/* Now we have to navigate to the another page  using redirect method */

Route::get('/article/tech/musk-buys-twitter' ,function(){
    return "Elon musk buys twitter in 2023";
})->name('article');

// Below the code for group the routing
Route::group(["prefix" => "admin"],function(){

    Route::get('/user/{id}' , function($id){
        return "User id is " . $id;
    });

    Route::get('/Setting',function(){
        return 'Settings';
    });

});

/**
 * Below the code for Employee routes
 * @author meganathan
 */

Route::get('/employees',[EmployeeController::class,'index'])->name('employee.index');

Route::get('/employees/create',[EmployeeController::class,'create'])->name('employee.create'); // This route nagivate to the create page ||  that . means slash

Route::post('/employees/store',[EmployeeController::class,'store'])->name('employee.store'); // This line routing is routing for employee store in controller

Route::get('/employees/{employee}',[EmployeeController::class,'show'])->name('employee.show'); // {} vanthu id diff ah change akum so

Route::get('/employees/{employee}/edit',[EmployeeController::class,'edit'])->name('employee.edit');

Route::put('/employees/{employee}',[EmployeeController::class,'update'])->name('employee.update');


