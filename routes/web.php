<?php

use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TaarufController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\KuisController;
use App\Http\Controllers\UstadzController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ChatUstadzController;
use App\Http\Controllers\RequestTaarufController;
use App\Http\Controllers\UserController as ControllersUserController;
use App\Http\Middleware\AuthenticateAdmin;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', [DashboardController::class, 'index'])->name('index');

Route::get('/sedang-taaruf', [TaarufController::class, 'index'])->name('chat');


Route::get('/artikel-content', function () {
    return view('user.artikel.content');
});

// Route::get('/chat', function () {
//     return view('user.chat');
// })->name('chat');

// Route::get('/pelatihan', function () {
//     return view('user.pelatihan');
// })->name('pelatihan');

Route::get('/login', [SessionController::class, 'index'])->name('sesi');
Route::post('/login', [SessionController::class, 'login'])->name('login');
Route::get('/logout', [SessionController::class, 'logout'])->name('logout');
Route::get('/register', [SessionController::class, 'register'])->name('register');
Route::post('/create', [SessionController::class, 'create'])->name('create');

Route::get('/admin/register', [adminController::class, 'register'])->name('admin.register');
Route::post('/admin/register', [adminController::class, 'register_action'])->name('register.action');


// Route::get('/admin/register', [adminController::class, 'register'])->name('register');
// Route::post('/admin/register', [adminController::class, 'register_action'])->name('register.action');
Route::get('/admin/login', [adminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [adminController::class, 'login_action'])->name('login.action');

Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/dashboard-admin', [AdminController::class, 'dashboard'])->name('admin.dashboard-admin');
    Route::get('/admin/logout', [adminController::class, 'logout'])->name('admin.logout');
    Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
    Route::get('/admin/edit/{admin_id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::post('/admin/update/{admin_id}', [AdminController::class, 'update'])->name('admin.update');
    Route::post('/admin/delete/{admin_id}', [AdminController::class, 'destroy'])->name('admin.destroy');

    Route::get('/admin/articles', [AdminArticleController::class, 'index'])->name('admin.articles.index');
    Route::get('/admin/articles/create', [AdminArticleController::class, 'create'])->name('admin.articles.create');
    Route::post('/admin/articles', [AdminArticleController::class, 'store'])->name('admin.articles.store');
    Route::get('/admin/articles/{article}/edit', [AdminArticleController::class, 'edit'])->name('admin.articles.edit');
    Route::put('/admin/articles/{article}', [AdminArticleController::class, 'update'])->name('admin.articles.update');
    Route::delete('/admin/articles/{article}', [AdminArticleController::class, 'destroy'])->name('admin.articles.destroy');

    Route::get('/admin/ustadz', [AdminController::class, 'showUstadz'])->name('admin.ustadz');
    Route::get('/admin/ustadz/create', [AdminController::class, 'createUstadz'])->name('admin.ustadz.create');
    Route::post('/admin/ustadz/store', [AdminController::class, 'storeUstadz'])->name('admin.ustadz.store');
    Route::get('/admin/ustadz/{ustadz_id}/edit', [AdminController::class, 'editUstadz'])->name('admin.ustadz.edit');
    Route::put('/admin/ustadz/{ustadz_id}', [AdminController::class, 'updateUstadz'])->name('admin.ustadz.update');
    Route::post('/admin/ustadz/{ustadz_id}', [AdminController::class, 'destroyUstadz'])->name('admin.ustadz.destroy');

    Route::get('/admin/users', [ControllersUserController::class, 'index'])->name('admin.users.index');
    Route::delete('/admin/users/{user_id}', [ControllersUserController::class, 'destroy'])->name('admin.users.destroy');
});

Route::middleware(['auth'])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // });
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel');
    Route::get('/artikel-content/{id}', [ArtikelController::class, 'show'])->name('artikel.show');
    Route::get('/artikel/search', [ArtikelController::class, 'search'])->name('artikel.search');
    Route::get('/biodata', [BiodataController::class, 'index'])->name('biodata');
    Route::post('/biodata', [BiodataController::class, 'storeProfile'])->name('profile.post');
    Route::put('/biodata', [BiodataController::class, 'updateProfile'])->name('profile.update');

    Route::get('/pelatihan/bab/{id}', [PelatihanController::class, 'show'])->name('pelatihan.show');

    Route::get('/biodata/self-app', [BiodataController::class, 'indexSelfApp'])->name('biodata.selfapp');
    Route::post('/biodata/self-app', [BiodataController::class, 'storeSelfApp'])->name('selfapp.post');
    Route::put('/biodata/self-app', [BiodataController::class, 'updateSelfApp'])->name('selfapp.update');

    Route::get('/biodata/physical-app', [BiodataController::class, 'indexPhysicalApp'])->name('biodata.physicalapp');
    Route::post('/biodata/physical-app', [BiodataController::class, 'storePhysicalApp'])->name('physicalapp.post');
    Route::put('/biodata/physical-app', [BiodataController::class, 'updatePhysicalApp'])->name('physicalapp.update');

    Route::get('/biodata/family-app', [BiodataController::class, 'indexFamilyApp'])->name('biodata.familyapp');
    Route::post('/biodata/family-app', [BiodataController::class, 'storeFamilyApp'])->name('familyapp.post');
    Route::put('/biodata/family-app', [BiodataController::class, 'updateFamilyApp'])->name('familyapp.update');

    Route::get('/biodata/education', [BiodataController::class, 'indexEducation'])->name('biodata.education');
    Route::post('/biodata/education', [BiodataController::class, 'storeEducation'])->name('education.post');
    Route::put('/biodata/education', [BiodataController::class, 'updateEducation'])->name('education.update');

    Route::get('/biodata/religionstat', [BiodataController::class, 'indexReligion'])->name('biodata.religion');
    Route::post('/biodata/religionstat', [BiodataController::class, 'storeReligion'])->name('religion.post');
    Route::put('/biodata/religionstat', [BiodataController::class, 'updateReligion'])->name('religion.update');

    Route::get('/search', [SearchController::class, 'index'])->name('search');
    Route::post('/search/partner', [SearchController::class, 'searchPartner'])->name('search.partner');
    Route::get('/search/partner/showProfile/{username}', [BiodataController::class, 'show'])->name('profile.show');

    Route::post('/request-taaruf/{id}', [RequestTaarufController::class, 'sendRequest'])->name('request_taaruf.send');
    Route::put('/request-taaruf/approve', [RequestTaarufController::class, 'approve'])->name('request_taaruf.approve');


    Route::get('/chat', [ChatController::class, 'index'])->name('chat')->middleware('auth');

    Route::get('/kuis', [KuisController::class, 'index']);
    Route::post('/kuis', [KuisController::class, 'store'])->name('kuis.store');

    Route::get('/hasil-kuis', function () {
        return view('user.hasil');
    });
});

// Route::get('/search', function () {
//     return view('user.matching.search');
// });

// Route::get('/ustadz', function () {
//     return view('ustadz.dashboard');
// })->name('dashboard');

Route::get('/ustadz/login', [UstadzController::class, 'showLoginForm'])->name('ustadz.login');
Route::post('/ustadz/login', [UstadzController::class, 'login'])->name('ustadz.login.submit');

Route::prefix('ustadz')->group(function () {
    Route::get('/dashboard', [UstadzController::class, 'dashboard'])->name('ustadz.dashboard')->middleware('auth:ustadz');
    Route::get('/artikel', [UstadzController::class, 'artikel'])->name('ustadz.artikel')->middleware('auth:ustadz');
    Route::get('/chat', [ChatUstadzController::class, 'index'])->name('ustadz.chat')->middleware('auth:ustadz');
    Route::put('/request-taaruf/dampingi', [RequestTaarufController::class, 'dampingi'])->name('request_taaruf.dampingi');
    Route::post('/logout', [UstadzController::class, 'logout'])->name('ustadz.logout');

    Route::get('/notif-ustadz', function () {
        return view('ustadz.notif');
    });
});
