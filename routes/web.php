<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TaarufController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel');

Route::get('/pelatihan', [PelatihanController::class, 'index'])->name('pelatihan');

Route::get('/chat', [ChatController::class, 'index'])->name('chat');

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

Route::get('/biodata', [BiodataController::class,'index'])->name('biodata');
Route::post('/biodata', [BiodataController::class,'storeProfile'])->name('profile.post');
Route::put('/biodata', [BiodataController::class, 'updateProfile'])->name('profile.update');

Route::get('/biodata/self-app', [BiodataController::class, 'indexSelfApp'])->name('biodata.selfapp');
Route::post('/biodata/self-app', [BiodataController::class, 'storeSelfApp'])->name('selfapp.post');
Route::put('/biodata/self-app', [BiodataController::class, 'updateSelfApp'])->name('selfapp.update');

Route::get('/biodata/physical-app', [BiodataController::class, 'indexPhysicalApp'])->name('biodata.physicalapp');
Route::post('/biodata/physical-app', [BiodataController::class, 'storePhysicalApp'])->name('physicalapp.post');
Route::put('/biodata/physical-app', [BiodataController::class, 'updatePhysicalApp'])->name('physicalapp.update');

Route::get('/login',[SessionController::class,'index'])->name('sesi');
Route::post('/login',[SessionController::class,'login'])->name('login');
Route::get('/logout',[SessionController::class,'logout'])->name('logout');
Route::get('/register',[SessionController::class,'register'])->name('register');
Route::post('/create',[SessionController::class,'create'])->name('create');

Route::get('/search', function () {
    return view('user.matching.search');
});

Route::get('/ustadz', function () {
    return view('ustadz.dashboard');
})->name('dashboard');

Route::get('/artikel-ustadz', function () {
    return view('ustadz.artikel');
})->name('artikel-ustadz');

Route::get('/notif-ustadz', function () {
    return view('ustadz.notif');
});