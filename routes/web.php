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

// Common Resource Routes:
// index -> Show all listings
// show -> Show single Listing
// create -> Show form to create new listing
// store -> Store new listing
// edit -> Show form to edit listing
// update -> Update listing
// destroy -> Delete listing

// Show all servers
Route::get('/', [ServerController::class, 'index']);

// Show Form To Claim Server
Route::get('/servers/{id}/claim', [ServerController::class, 'claim'])->middleware('auth');

// Unclaim a Server
Route::get('/servers/{id}/unclaim', [ServerController::class, 'unclaim'])->middleware('auth');

// Confirm Claim Of a Server
Route::post('/servers/confirmClaim', [ServerController::class, 'confirmClaim'])->middleware('auth');

// List Servers To Manage
Route::get('/servers/manage', [ServerController::class, 'manage'])->middleware('auth');

// Delete Server
Route::delete('/servers/{id}', [ServerController::class, 'destroy'])->middleware('auth');

// Show Server Create Form
Route::get('/servers/create', [ServerController::class, 'create'])->middleware('auth');

// Create Server
Route::post('/servers', [ServerController::class, 'store'])->middleware('auth');

// Show Server Edit Form
Route::get('/servers/{id}/edit', [ServerController::class, 'edit'])->middleware('auth');

// Update Server
Route::put('/servers/{id}', [ServerController::class, 'update'])->middleware('auth');

#########################################################################################################

// Show Register/Create Form
Route::get('/users/register', [UserController::class, 'create'])->middleware('guest');

// Show Login Form
Route::get('/users/login', [UserController::class, 'login'])->middleware('guest');

//Create New User
Route::post('/users/store', [UserController::class, 'store']);

// Authenticate User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// Log User Out
Route::post('/users/logout', [UserController::class, 'logout'])->middleware('auth');
