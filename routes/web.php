<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{CompanyController,EmployeeController,Controller};
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::resource('/', CompanyController::class);
Route::GET('logout', [Controller::class, 'logout'])->name('logout');

Route::get('/company-list', [CompanyController::class, 'index'])->name('company-list');
Route::get('/create-company', [CompanyController::class, 'create'])->name('create-company');
Route::POST('/store-company', [CompanyController::class, 'store'])->name('store-company');
Route::get('/editCompany/{id}', [CompanyController::class, 'edit'])->name('editCompanyDetails');
Route::POST('/updateCompany', [CompanyController::class, 'update'])->name('updateCompany');
Route::get('/company-detail/{id}', [CompanyController::class, 'show'])->name('company-details');
Route::get('/delete/{id}', [CompanyController::class, 'destroy'])->name('deleteCompany');


//employee Routes

// Route::get('/employee-list', [EmployeeController::class, 'index'])->name('employee_list');
Route::POST('/store-employee', [EmployeeController::class, 'store'])->name('store-employee');

Route::get('/edit-employee/{id}', [EmployeeController::class, 'edit'])->name('edit-employee-details');
Route::POST('/update-employee', [EmployeeController::class, 'update'])->name('update-employee');

Route::get('/employee-detail/{id}', [EmployeeController::class, 'show'])->name('employee-details');
Route::get('/delete-employee/{id}', [EmployeeController::class, 'destroy'])->name('delete-employee');
?>