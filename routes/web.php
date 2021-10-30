<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('forgot-password');

Route::get('/index', function () {
    return view('index');
})->name('index');

Route::get('/clientes/index', function () {
    return view('clientes.index');
})->name('clientes.index');

Route::get('/laboratoristas/index', function () {
    return view('laboratoristas.index');
})->name('laboratoristas.index');

Route::get('/analisis/index', function () {
    return view('analisis.index');
})->name('analisis.index');

Route::get('/solicitudInterna/index', function () {
    return view('solicitudInterna.index');
})->name('solicitudInterna.index');
