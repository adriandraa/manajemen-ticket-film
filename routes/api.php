<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
    FilmController,
    TheaterController,
    ScheduleController,
    TicketController
};

// 📌 Public Routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// 📌 Public Resource Routes (tanpa login)
Route::apiResource('/films', FilmController::class)->only(['index', 'show']);
Route::apiResource('/theaters', TheaterController::class)->only(['index', 'show']);
Route::apiResource('/schedules', ScheduleController::class)->only(['index', 'show']);

// 🔐 Protected Routes (JWT Login Required)
Route::middleware('auth:api')->group(function () {
    // ✅ Info user login
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // ✅ Resource full-access
    Route::apiResource('/films', FilmController::class)->except(['index', 'show']);
    Route::apiResource('/theaters', TheaterController::class)->except(['index', 'show']);
    Route::apiResource('/schedules', ScheduleController::class)->except(['index', 'show']);

    // ✅ Ticket khusus user yang login
    Route::apiResource('/tickets', TicketController::class)->only(['index', 'store', 'show', 'destroy']);
});
