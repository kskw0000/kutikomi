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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/get-cities-by-prefecture-id', [AuthController::class, 'getCitiesByPrefectureID']);

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('register', [AuthController::class, 'registration'])->name('register');
Route::post('post-registrater', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('confirm', [AuthController::class, 'postConfirm'])->name('post.confirm');
Route::get('complete', [AuthController::class, 'postComplete'])->name('post.complete');

Route::get('password_forget', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::get('send_password_email_complete', [ForgotPasswordController::class, 'showSendEmail'])->name('show.send.email');

Route::post('send_password_email', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::get('get-prefecture-region',[HomeController::class, 'getPrefectureRegions'])->name('get.prefecture.name');
Route::get('get-facility',[HomeController::class, 'getFacilities'])->name('get.facility.name');
Route::get('get-qualification',[HomeController::class, 'getQualifications'])->name('get.qualification');

Route::get('/facility', [DetailViewController::class, 'showByFacility'])->name('get.by.facilictyIds'); 
Route::get('/byprefecture', [DetailViewController::class, 'getByPrefectures'])->name('get.by.prefecture'); 

Route::get('/nurseries', [DetailViewController::class, 'showNurseries'])->name('get.nurseries'); 
Route::get('/nurseries/{id}', [DetailViewController::class, 'showNurseryById'])->name('get.by.nurseryid'); 

Route::post('/toggle_followed_nursery', [MypageController::class, 'followNursery'])->name('post.follow.nursery');
Route::post('/toggle_liked_evaluation', [MypageController::class, 'likeReview'])->name('post.like.review');

Route::get('/company', [CompanyController::class, 'showCompanies'])->name('get.companies'); 
Route::get('/company/{id}', [CompanyController::class, 'showCompanyById'])->name('get.by.companyid'); 


Route::get('dashboard', [AuthController::class, 'dashboard'])->middleware(['auth', 'is_verify_email']); 
Route::get('account/verify/{token}', [AuthController::class, 'verifyAccount'])->name('user.verify'); 

Route::get('/terms', [HomeController::class, 'getTerms'])->name('terms');
Route::get('/sitemap', [HomeController::class, 'getSitemap'])->name('sitemap');
Route::get('/policy', [HomeController::class, 'getPolicy'])->name('policy');
Route::get('/score', [HomeController::class, 'getScore'])->name('score');
Route::get('/guide', [HomeController::class, 'getGuide'])->name('guide');

Route::get('/help', [HomeController::class, 'getHelp'])->name('help');
Route::get('/help/contact1', [HomeController::class, 'getHelpContact1'])->name('help.contact1');
Route::get('/help/contact2', [HomeController::class, 'getHelpContact2'])->name('help.contact2');
Route::post('/help/confirm', [HomeController::class, 'postHelpContact'])->name('post.help');

Route::get('/mypage', [MypageController::class, 'index'])->middleware(['auth', 'is_verify_email'])->name('mypage');
Route::get('/mypage/following', [MypageController::class, 'getFollowing'])->middleware(['auth', 'is_verify_email'])->name('mypage.following');
Route::get('/mypage/like', [MypageController::class, 'getLike'])->middleware(['auth', 'is_verify_email'])->name('mypage.like');
Route::get('/mypage/draft', [MypageController::class, 'getDraft'])->middleware(['auth', 'is_verify_email'])->name('mypage.draft');
Route::get('/mypage/review', [MypageController::class, 'getReview'])->middleware(['auth', 'is_verify_email'])->name('mypage.review');
Route::get('/mypage/quiet', [MypageController::class, 'getQuiet'])->middleware(['auth', 'is_verify_email'])->name('mypage.quiet');

Route::get('/mypage/user', [MypageController::class, 'getUser'])->middleware(['auth', 'is_verify_email'])->name('mypage.user');
Route::get('/mypage/user/email', [MypageController::class, 'getUseremail'])->middleware(['auth', 'is_verify_email'])->name('mypage.user.email');
Route::get('/mypage/password', [MypageController::class, 'getUserpassword'])->middleware(['auth', 'is_verify_email'])->name('mypage.user.password'); 
Route::get('/mypage/complete', [MypageController::class, 'completePassword'])->middleware(['auth', 'is_verify_email'])->name('mypage.password.complete'); 
Route::put('/change-password', [AuthController::class, 'changePassword'])->middleware(['auth', 'is_verify_email'])->name('change.password'); 
Route::post('/mypage/user/update_email_setting', [AuthController::class, 'changeEmailSettings'])->middleware(['auth', 'is_verify_email'])->name('update.email.setting'); 

Route::get('/mypage/quiet/survey', [MypageController::class, 'getSurvey'])->middleware(['auth', 'is_verify_email'])->name('get.survey'); 
Route::post('/mypage/quiet/store', [MypageController::class, 'removeUser'])->middleware(['auth', 'is_verify_email'])->name('remove.user');

// Route::get('/citydata', [HomeController::class], 'getCityData')->name('get.city.data');
Route::post('/nursery/submitnew', [HomeController::class, 'addNewNursery'])->middleware(['auth', 'is_verify_email'])->name('add.nursery');


Route::get('answer', [AnswerController::class, 'answer'])->middleware(['auth', 'is_verify_email'])->name('answer');
Route::get('answer/{id}', [AnswerController::class, 'showschoolById'])->middleware(['auth', 'is_verify_email'])->name('get.answer');
// Route::post('store', [AnswerController::class, 'store'])->name('store');

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

  // Users 
  Route::middleware('auth')->prefix('users')->name('users.')->group(function(){
      Route::get('/', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('index');
      Route::get('/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('create');
      Route::post('/store', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('store');
      Route::get('/edit/{user}', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('edit');
      Route::put('/update/{user}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('update');
      Route::delete('/delete/{user}', [App\Http\Controllers\Admin\UserController::class, 'delete'])->name('destroy');
      Route::get('/update/status/{user_id}/{status}', [App\Http\Controllers\Admin\UserController::class, 'updateStatus'])->name('status');

      
      Route::get('/import-users', [App\Http\Controllers\Admin\UserController::class, 'importUsers'])->name('import');
      Route::post('/upload-users', [App\Http\Controllers\Admin\UserController::class, 'uploadUsers'])->name('upload');

      Route::get('export/', [App\Http\Controllers\Admin\UserController::class, 'export'])->name('export');

  });

  Route::middleware('auth')->prefix('review')->name('review.')->group(function(){
      Route::get('/', [App\Http\Controllers\Admin\ReviewController::class, 'index'])->name('index');
      Route::get('/create', [App\Http\Controllers\Admin\ReviewController::class, 'create'])->name('create');
      // Route::post('/store', [ReviewController::class, 'store'])->name('store');
      Route::get('/edit/{review}', [App\Http\Controllers\Admin\ReviewController::class, 'edit'])->name('edit');
      // Route::put('/update/{user}', [ReviewController::class, 'update'])->name('update');
      Route::delete('/delete/{review}', [App\Http\Controllers\Admin\ReviewController::class, 'delete'])->name('destroy');
      Route::get('/update/status/{review_id}/{status}', [App\Http\Controllers\Admin\ReviewController::class, 'updateStatus'])->name('status');    
  });

  Route::middleware('auth')->prefix('company')->name('company.')->group(function(){
      Route::get('/', [App\Http\Controllers\Admin\CompanyController::class, 'index'])->name('index');
      Route::get('/create', [App\Http\Controllers\Admin\CompanyController::class, 'create'])->name('create');
      Route::post('/store', [App\Http\Controllers\Admin\CompanyController::class, 'store'])->name('store');
      Route::get('/edit/{company}', [App\Http\Controllers\Admin\CompanyController::class, 'edit'])->name('edit');
      Route::put('/update/{company}', [App\Http\Controllers\Admin\CompanyController::class, 'update'])->name('update');
      Route::delete('/delete/{company}', [App\Http\Controllers\Admin\CompanyController::class, 'delete'])->name('destroy');
  });

  Route::middleware('auth')->prefix('nursery')->name('nursery.')->group(function(){
    Route::get('/', [App\Http\Controllers\Admin\NurseryController::class, 'index'])->name('index');
    Route::get('/create', [App\Http\Controllers\Admin\NurseryController::class, 'create'])->name('create');
    Route::post('/store', [App\Http\Controllers\Admin\NurseryController::class, 'store'])->name('store');
    Route::get('/edit/{nursery}', [App\Http\Controllers\Admin\NurseryController::class, 'edit'])->name('edit');
    Route::put('/update/{nursery}', [App\Http\Controllers\Admin\NurseryController::class, 'update'])->name('update');
    Route::delete('/delete/{nursery}', [App\Http\Controllers\Admin\NurseryController::class, 'delete'])->name('destroy');
});  
});

Route::post('cities', [App\Http\Controllers\Admin\CompanyController::class, 'getCities'])->name('get.cities');