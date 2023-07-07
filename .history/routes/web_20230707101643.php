<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DetailViewController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\AnswerController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/get-cities-by-prefecture-id', [AuthController::class, 'getCitiesByPrefectureID']);

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('register', [AuthController::class, 'registration'])->name('register');
Route::post('post-registrater', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('confirm', [AuthController::class, 'postConfirm'])->name('post.confirm');
Route::get('complete', [AuthController::class, 'postComplete'])->name('post.complete');

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

// the remaining route definitions...

Route::get('answer', [AnswerController::class, 'answer'])->middleware(['auth', 'is_verify_email'])->name('answer');
Route::get('answer/{id}', [AnswerController::class, 'showschoolById'])->middleware(['auth', 'is_verify_email'])->name('get.answer');

Route::post('/store', 'AnswerController@store');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
  // Admin routes here
  Route::get('/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');

  Route::prefix('profile')->name('profile.')->middleware('auth')->group(function(){
    Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'getProfile'])->name('detail');
    Route::post('/update', [App\Http\Controllers\Admin\HomeController::class, 'updateProfile'])->name('update');
    Route::post('/change-password', [App\Http\Controllers\Admin\HomeController::class, 'changePassword'])->name('change-password');
  });

  // Roles
  Route::resource('roles', App\Http\Controllers\Admin\RolesController::class);

  // Permissions
  Route::resource('permissions', App\Http\Controllers\Admin\PermissionsController::class);

  // the remaining admin route definitions...
});
