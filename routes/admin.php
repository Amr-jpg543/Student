<?php

use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\StudentController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth','IsAdmin'])->group(function(){
// الصفحة الرئيسية للوحة التحكم
Route::get('/', [HomeController::class, 'index'])->name('index');

// Routes الخاصة بالطلاب
Route::prefix('students')->name('students.')->controller(StudentController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/{id}', 'show')->name('show')->whereNumber('id');
    Route::get('/edit/{id}', 'edit')->name('edit')->whereNumber('id');
    Route::put('/update/{id}', 'update')->name('update')->whereNumber('id');
    Route::get('/delete/{id}', 'delete')->name('delete')->whereNumber('id');
    Route::delete('/{id}', 'destroy')->name('destroy')->whereNumber('id');
});

// Routes الخاصة بالأقسام
Route::prefix('departments')->name('departments.')->controller(DepartmentController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::get('/edit/{id}', 'edit')->name('edit')->whereNumber('id');
    Route::put('/update/{id}', 'update')->name('update')->whereNumber('id');
    Route::post('/', 'store')->name('store');
    Route::delete('/{id}', 'destroy')->name('destroy')->whereNumber('id');
});
});