<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;

Route::get('/', [StaffController::class, 'index'])->name('home');
Route::post('/add-department', [StaffController::class, 'addDepartment']);
Route::post('/add-designation', [StaffController::class, 'addDesignation']);
Route::post('/add-staff', [StaffController::class, 'addStaff']);
Route::get('/search-staff/{term?}', [StaffController::class, 'search']);