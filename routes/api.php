<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\UsersRoleController;
use App\Models\UsersRole;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/users', [UserController::class, 'index'])->name('index');
Route::get('/users/create', [UserController::class, 'create'])->name('create');
Route::post('/users/create', [UserController::class, 'store'])->name('store');
Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('update');
Route::delete('/users/destroy/{id}', [UserController::class, 'destroy'])->name('destroy');
