<?php

use Illuminate\Support\Facades\Route;

Route::get('/halo', function () {
    return view('welcome');
});
