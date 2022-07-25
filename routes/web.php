<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServerController;
use App\Http\Controllers\UserController;

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

// Show all servers
Route::get('/', [ServerController::class, 'index']);

// Show Form To Claim Server
Route::get('/servers/{id}/claim', [ServerController::class, 'claim'])->middleware('auth');

// Unclaim a Server
Route::get('/servers/{id}/unclaim', [ServerController::class, 'unclaim'])->middleware('auth');

// Confirm Claim Of a Server
Route::post('/servers/confirmClaim', [ServerController::class, 'confirmClaim'])->middleware('auth');

// List Servers To Manage
Route::get('/servers/manage', [ServerController::class, 'manage'])->middleware('admin');

// Delete Server
Route::delete('/servers/{id}', [ServerController::class, 'destroy'])->middleware('admin');

// Show Server Create Form
Route::get('/servers/create', [ServerController::class, 'create'])->middleware('admin');

// Create Server
Route::post('/servers', [ServerController::class, 'store'])->middleware('admin');

// Show Server Edit Form
Route::get('/servers/{id}/edit', [ServerController::class, 'edit'])->middleware('admin');

// Update Server
Route::put('/servers/{id}', [ServerController::class, 'update'])->middleware('admin');

#########################################################################################################

// Show Register/Create Form
Route::get('/users/register', [UserController::class, 'create'])->middleware('guest')->name('register');

// Show Login Form
Route::get('/users/login', [UserController::class, 'login'])->middleware('guest')->name('login');

//Create New User
Route::post('/users/store', [UserController::class, 'store']);

// Authenticate User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// Log User Out
Route::post('/users/logout', [UserController::class, 'logout'])->middleware('auth');

// List All Users
Route::get('/users', [UserController::class, 'index'])->middleware('auth');

// List A User's Claimed Servers
Route::get('/users/{id}/servers', [UserController::class, 'manage'])->middleware('auth');

// List Logged In User's Servers
Route::get('/users/owned', [UserController::class, 'getServers'])->middleware('auth');