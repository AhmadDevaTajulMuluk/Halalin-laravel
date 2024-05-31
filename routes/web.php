<?php

use App\Http\Controllers\BiodataController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('user.dashboard');
})->name('dashboard'); 

Route::get('/artikel', function () {
    return view('user.artikel.artikel');
})->name('artikel');

Route::get('/artikel-content', function () {
    return view('user.artikel.content');
});

Route::get('/chat', function () {
    return view('user.chat');
})->name('chat');

Route::get('/pelatihan', function () {
    return view('user.pelatihan');
})->name('pelatihan');

Route::get('/biodata', [BiodataController::class,'index'])->name('biodata');
Route::post('/biodata', [BiodataController::class,'store'])->name('biodata.post');
Route::get('/biodata/{id}/edit', [BiodataController::class, 'edit'])->name('biodata.edit');
Route::put('/biodata/{id}', [BiodataController::class, 'update'])->name('biodata.update');


Route::get('/login',[SessionController::class,'index'])->name('sesi');
Route::post('/login',[SessionController::class,'login'])->name('login');
Route::get('/logout',[SessionController::class,'logout'])->name('logout');
Route::get('/register',[SessionController::class,'register'])->name('register');
Route::post('/create',[SessionController::class,'create'])->name('create');

Route::get('/search', function () {
    return view('user.matching.search');
});