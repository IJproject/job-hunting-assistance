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

    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/info/{user}', [UserController::class, 'show'])->name('user.show');
    Route::put('/user/info/{user}', [UserController::class, 'update'])->name('user.update');
    
    Route::get('/user/applicant_company/{applicant_company}', [UserController::class, 'applicant_company_show'])->name('user.applicant_company.show');
    Route::put('/user/applicant_company/{applicant_company}', [UserController::class, 'applicant_company_update'])->name('user.applicant_company.update');
    Route::delete('/user/applicant_company/delete', [UserController::class, 'applicant_company_destroy'])->name('user.applicant_company.destroy');

    Route::post('/user/applicant_company/selection', [UserController::class, 'selection_store'])->name('user.applicant_company.selection.store');
    Route::delete('/user/applicant_company/selection/delete', [UserController::class, 'selection_destroy'])->name('user.applicant_company.selection.destroy');

    Route::post('/user/applicant_company/qa', [UserController::class, 'company_qa_store'])->name('user.applicant_company.company_qa.store');
    Route::delete('/user/applicant_company/qa/delete', [UserController::class, 'company_qa_destroy'])->name('user.applicant_company.company_qa.destroy');

    Route::post('/user/user_qa', [UserController::class, 'user_qa_store'])->name('user.user_qa.store');
    Route::delete('/user/user_qa/delete', [UserController::class, 'user_qa_destroy'])->name('user.user_qa.destroy');

    Route::get('/company', [CompanyController::class, 'index'])->name('company.index');
    Route::post('/company', [CompanyController::class, 'store'])->name('company.store');
});

require __DIR__.'/auth.php';