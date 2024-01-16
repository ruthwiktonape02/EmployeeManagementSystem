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
Route::post('/superUserRegister', [SuperUserController::class, 'store']);
Route::get('/', function () {
    return view('SuperUserLoginPage');
});
Route::get('/logout', [SuperUserController::class, 'logout']);
Route::post('/', [SuperUserController::class, 'check']);
Route::post('/store', [SuperUserController::class, 'store']);


Route::group(['middleware' => 'auth'], function () {
    Route::get('/employeeRegister', function () {
        return view('RegistrationPage');
    });
    Route::post('/create', [EmployeeManagerController::class, 'create']);
    Route::get('/create', [EmployeeManagerController::class, 'create']);
    Route::get('/update/{id}', [EmployeeManagerController::class, 'update']);
    Route::get('/delete/{id}', [EmployeeManagerController::class, 'delete']);
    Route::get('/read', [EmployeeManagerController::class, 'read']);
    Route::post('/read', [EmployeeManagerController::class, 'updateAtPosition']);
    Route::post('/updateAtPosition', [EmployeeManagerController::class, 'updateAtPosition']);
    Route::post('/RegistrationPage', [EmployeeManagerController::class, 'create']);
    Route::get('/RegistrationPage', [EmployeeManagerController::class, 'create']);
});
