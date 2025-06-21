<?php

use App\Http\Controllers\PetsAdminController;
use App\Http\Controllers\PetsDataController;
use App\Http\Controllers\PetsUserController;
use App\Models\PetsUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/pets-user', function (Request $request) {
    return Auth::user();
})->middleware('auth:sanctum');

Route::post('/pet-user/login', [PetsUserController::class, 'login'])->name('pet_user.login');
Route::post('/pet-user/register', [PetsUserController::class, 'register']);
Route::post('/pet-user/logout', [PetsUserController::class, 'logout'])->name('pet_user.logout')->middleware('auth:sanctum');
Route::post('/admin/register', [PetsAdminController::class, 'register'])->name('admin.register');

Route::get('/all-pets', [PetsDataController::class, 'getAllPets']);

// Route::middleware('auth:admin')->group(function () {
//     // Protected routes for authenticated admins
//     Route::get('/admin/dashboard', function (Request $request) {
//         return response()->json(['message' => 'Welcome to the admin dashboard']);
//     })->name('admin.dashboard');
// });