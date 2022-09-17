<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['auth:sanctum']], function () {

    //crud routes
    Route::resource('people', PersonController::class);
    Route::resource('employes', EmployeController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('bills', BillController::class);
    
    //
    Route::post('/logout', [AuthController::class, 'logout']);

    //search routes
    Route::get('/people/search/{first_name}', [PersonController::class, 'search']);
    Route::get('/employes/search/{services}', [EmployeController::class, 'search']);
    Route::get('/customers/search/{company}', [CustomerController::class, 'search']);
    Route::get('/services/search/{name}', [ServiceController::class, 'search']);
    Route::get('/projects/search/{infos}', [ProjectController::class, 'search']);
    Route::get('/bills/search/{payment}', [BillController::class, 'search']);
   
});


Route::controller(AuthController::class)->group(function(){

    Route::post('/register','register');
    Route::post('/login', 'login');
    
});







