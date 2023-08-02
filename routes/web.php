<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsabilityController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\ExtensionController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\FileController;
use App\Http\Middleware\CheckSessionTimeoutMiddleware;
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

Route::middleware([CheckSessionTimeoutMiddleware::class])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::resource('users',UserController::class);
    Route::resource('profiles',ProfileController::class);
    Route::resource('usabilities',UsabilityController::class);
    Route::resource('types',TypeController::class);
    Route::resource('extensions',ExtensionController::class);
    Route::resource('uploads',UploadController::class);
    Route::resource('files',FileController::class);
    // Otras rutas que deseas proteger con la verificación del tiempo de espera de la sesión

    // Rutas de autenticación
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    /*//Rutas dinámicas
    Route::get('/', function () {
        return view('home', ['currentPage' => 'home']);
    });
    Route::get('/user', function () {
        return view('home', ['currentPage' => 'user']);
    });
    Route::get('/profile', function () {
        return view('home', ['currentPage' => 'profile']);
    });*/
});

