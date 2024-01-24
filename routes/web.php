<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;

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
    return Auth::check() ? redirect('/user') : redirect('/login');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // User関連のページ
    Route::post('/user/user_company/selection', [UserController::class, 'user_company_selection_store'])->name('selection.store');
    Route::delete('/user/user_company/selection/{user_company_selection}', [UserController::class, 'user_company_selection_destroy'])->name('selection.destroy');

    Route::post('/user/user_company/user_company_qa', [UserController::class, 'user_company_qa_store'])->name('company_qa.store');
    Route::delete('/user/user_company/user_company_qa/{user_company_qa}', [UserController::class, 'user_company_qa_destroy'])->name('company_qa.destroy');
    
    Route::get('/user/user_company/{user_company}', [UserController::class, 'user_company_show'])->name('user_company.show');
    Route::put('/user/user_company/{user_company}', [UserController::class, 'user_company_update'])->name('user_company.update');
    Route::delete('/user/user_company/{user_company}', [UserController::class, 'user_company_destroy'])->name('user_company.destroy');

    Route::post('/user/user_qa', [UserController::class, 'user_qa_store'])->name('user_qa.store');
    Route::delete('/user/user_qa/{user_qa}', [UserController::class, 'user_qa_destroy'])->name('user_qa.destroy');
    
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/{user}', [UserController::class, 'show'])->name('user.show');
    Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update');
    
    // Blog関連のページ
});

require __DIR__.'/auth.php';