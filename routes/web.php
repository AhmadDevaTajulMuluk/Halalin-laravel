<?php

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

Route::get('/biodata', function () {
    return view('user.biodata');
});

Route::get('/login', function () {
    return view('user.login');
});

Route::get('/register', function () {
    return view('user.register');
});

Route::get('/search', function () {
    return view('user.matching.search');
});