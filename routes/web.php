<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeManagerController;
use App\Http\Controllers\SuperUserController;

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

Route::get('/superUserRegister', function () {
    return view('SuperUserRegistrationPage');
});
Route::get('/superUserLogin', function () {
    return view('SuperUserLoginPage');
});
Route::get('/', function () {
    return view('RegistrationPage');
});
Route::post('/create', [EmployeeManagerController::class, 'create']);
Route::post('/store', [SuperUserController::class, 'store']);
Route::post('/check', [SuperUserController::class, 'check']);
Route::get('/update/{id}', [EmployeeManagerController::class, 'update']);
Route::get('/delete/{id}', [EmployeeManagerController::class, 'delete']);
Route::get('/read', [EmployeeManagerController::class, 'read']);
Route::post('/updateAtPosition/{id}', [EmployeeManagerController::class, 'updateAtPosition']);
