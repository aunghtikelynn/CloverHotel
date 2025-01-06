<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\FrontController::class, 'index'])->name('index');
Route::get('/about', [App\Http\Controllers\FrontController::class, 'about'])->name('about');
Route::get('/service', [App\Http\Controllers\FrontController::class, 'service'])->name('service');
Route::get('/room',[App\Http\Controllers\FrontController::class, 'room'])->name('room');
Route::get('/contact',[App\Http\Controllers\FrontController::class, 'contact'])->name('contact');
Route::get('/team',[App\Http\Controllers\FrontController::class, 'team'])->name('team');
Route::get('/testimonial',[App\Http\Controllers\FrontController::class, 'testimonial'])->name('testimonial');
Route::get('/booking',[App\Http\Controllers\FrontController::class, 'booking'])->name('booking');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
