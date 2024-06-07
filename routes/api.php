<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::resource('etudiant',\App\Http\Controllers\EtudiantController::class);

use App\Http\Controllers\EtudiantController;

// Route to list all etudiants
Route::get('etudiant/index', [EtudiantController::class, 'index']);

// Route to show the form for creating a new etudiant
Route::get('etudiant/create', [EtudiantController::class, 'create']);

// Route to store a newly created etudiant
Route::post('etudiant/store', [EtudiantController::class, 'store']);

// // Route to update a specific etudiant
Route::put('etudiant/update/{id}', [EtudiantController::class, 'update']);

// Route to display a specific etudiant
Route::get('etudiant/show/{id}', [EtudiantController::class, 'show']);

// Route to show the form for editing a specific etudiant
Route::get('etudiant/edit/{id}', [EtudiantController::class, 'edit']);

// Route to delete a specific etudiant
Route::delete('etudiant/destroy/{id}', [EtudiantController::class, 'destroy']);



Route::post('/register', [\App\Http\Controllers\UserController::class, 'register']);
Route::post('/login', [\App\Http\Controllers\UserController::class, 'login']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
