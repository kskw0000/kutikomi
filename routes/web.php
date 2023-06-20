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

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
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

// Route::get('answer', [AnswerController::class, 'answer'])->middleware(['auth', 'is_verify_email'])->name('answer');
// Route::get('answer/{ID}', [AnswerController::class, 'answer'])->middleware(['auth', 'is_verify_email'])->name('answer.id');

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