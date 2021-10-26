<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Auth\ForgotPassword;
use App\Http\Livewire\Auth\ResetPassword;
use App\Http\Livewire\Auth\SignUp;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Logout;

use App\Http\Livewire\Dashboard;


use App\Http\Livewire\LaravelExamples\UserProfile;
use App\Http\Livewire\LaravelExamples\UserManagement;
use App\Http\Livewire\LaravelExamples\FormEditor;
use Illuminate\Http\Request;

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

Route::get('/', Login::class)->name('login');

Route::get('/sign-up', SignUp::class)->name('sign-up');
Route::post('/sign-up',[SignUp::class, 'register']);
Route::get('/login', Login::class)->name("login");
Route::post('/login', [Login::class, 'login']);

Route::get('/login/forgot-password', ForgotPassword::class)->name('forgot-password');
 
Route::get('/reset-password/{id}',ResetPassword::class)->name('reset-password')->middleware('signed');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/census-dashboard', UserManagement::class)->name('census-dashboard');
    Route::get('/content-edit/{id}', FormEditor::class)->name('content-edit');
    Route::post('/form-save', [FormEditor::class,'update']);
    
    Route::get('/logout', [Logout::class, 'logout'])->name("logout");
    
});

