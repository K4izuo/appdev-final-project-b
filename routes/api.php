<?php

use App\Http\Controllers\PetsUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/user/login', [PetsUserController::class, 'login'])->name('user.login');
Route::post('/user/register', [PetsUserController::class, 'register']);
Route::post('/user/logout', [PetsUserController::class, 'logout'])->name('user.logout')->middleware('auth:sanctum');

// Route::middleware('auth:admin')->group(function () {
//     // Protected routes for authenticated admins
//     Route::get('/admin/dashboard', function (Request $request) {
//         return response()->json(['message' => 'Welcome to the admin dashboard']);
//     })->name('admin.dashboard');
// });