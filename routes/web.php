<?php
//use App\Http\Controllers\Website\departmentController as WebsitedepartmentController;
use App\Http\Controllers\Auth\AccountController;
use App\Http\Controllers\Website\MainController;
use Illuminate\Support\Facades\Route;
Route::get('/', [MainController::class, 'index'])->name('index');






Route::controller(AccountController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::get('/logout', 'logout')->name('logout');
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'handleregister')->name('handleregister');
    Route::post('/login', 'handlelogin')->name('handlelogin');
});



