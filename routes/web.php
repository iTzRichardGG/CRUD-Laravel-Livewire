<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('autenticacion');
});



Route::get('/home', function () {
    return view('home');
});

