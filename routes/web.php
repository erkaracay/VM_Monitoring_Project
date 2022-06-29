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

Route::get('/', [ServerController::class, 'index']);

// Changing Owner Name
Route::get('/edit', [ServerController::class, 'edit']);

// Changing Server Availability
Route::get('/update/{id}', [ServerController::class, 'update']);

// Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->middleware('guest');

//Create New User
Route::post('/users', [UserController::class, 'store']);

// Authenticate User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
