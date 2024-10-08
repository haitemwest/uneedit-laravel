<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\DeliveryServiceController;
use App\Http\Controllers\AuthController;

// Load dynamic routes
$routes = require("dynamic.php");

// Public routes
Route::view('/', 'public.home');
Route::view('/webshop', 'webshop.index');

// Dynamic routes
foreach ($routes as $route) {
    Route::view($route['uri'], $route['view']);
}

// User authentication routes
Route::prefix('user')->group(function () {
    Route::post('/register', [UserController::class, 'register']);
    Route::post('/login', [UserController::class, 'login']);
    Route::get('/logout', [UserController::class, 'logout']);
});

// Appointment routes
Route::prefix('appointments')->group(function () {
    Route::post('/create', [AppointmentController::class, 'createAppointment']);
    Route::get('/create', [AppointmentController::class, 'statusAppointment']);
    Route::get('/dashboard', [AppointmentController::class, 'showAppointmentBooking']);

    Route::get('/available-times', [AppointmentController::class, 'getAvailableTimes']);

    // Calendar view route
    Route::get('/calendar', [AppointmentController::class, 'showCalendar'])->name('appointments.calendar');

    // Fetch appointments for a specific day
    Route::get('/day/{date}', [AppointmentController::class, 'showAppointmentsForDay'])->name('appointments.day');

    Route::get('/events', [AppointmentController::class, 'getEvents'])->name('appointments.events');

});

Route::prefix('admin')->group(function() {
    Route::get('/availability', function() {
        return view('admin.availability');
    });
    // In routes/web.php
    Route::post('/availability', [AdminController::class, 'saveAvailability']);
});

// Registration route
Route::view('/register', 'appointments.register');



// Definieer je routes

Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/service', [ServiceController::class, 'index'])->name('service');
Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments');
Route::get('/faq', [FAQController::class, 'index'])->name('faq');
Route::get('/bezorgdiensten', [DeliveryServiceController::class, 'index'])->name('bezorgdiensten');
Route::post('/user/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
