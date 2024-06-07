<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return to_route('login');
    //return view('welcome');
});

//etudiant
Route::resource('etudiant',\App\Http\Controllers\EtudiantController::class)
    /*->middleware([ 'auth'])*/;
Route::get('/etudiantexcel',[\App\Http\Controllers\EtudiantController::class,'downloadExcel'])->name("etudiantexcel");
Route::get('/search',[\App\Http\Controllers\EtudiantController::class,'search'])->name("search");
Route::post('/import',[\App\Http\Controllers\FileController::class,'import'])->name("import");

//classe
Route::resource('classe',\App\Http\Controllers\ClasseController::class)->middleware([ 'auth']);

//note
Route::resource('note',\App\Http\Controllers\NoteController::class)->middleware([ 'auth']);

//Auth
Route::get('/login',[\App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::delete('/logout',[\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
Route::post('/login',[\App\Http\Controllers\AuthController::class, 'dologin']);
