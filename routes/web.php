<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\FrontController::class, 'index'])->name('index');
Route::get('/about', [App\Http\Controllers\FrontController::class, 'about'])->name('about');
Route::get('/service', [App\Http\Controllers\FrontController::class, 'service'])->name('service');
Route::get('/room',[App\Http\Controllers\FrontController::class, 'room'])->name('room');
Route::get('/room-detail/{id}',[App\Http\Controllers\FrontController::class, 'roomDetail'])->name('room-detail');

Route::get('/contact',[App\Http\Controllers\FrontController::class, 'contact'])->name('contact');
Route::get('/team',[App\Http\Controllers\FrontController::class, 'team'])->name('team');
Route::get('/testimonial',[App\Http\Controllers\FrontController::class, 'testimonial'])->name('testimonial');

Route::get('/booking',[App\Http\Controllers\FrontController::class, 'booking'])->name('booking');
Route::post('/book-now',[App\Http\Controllers\FrontController::class,'bookNow'])->name('bookNow');
Route::post('/book-successful',[App\Http\Controllers\FrontController::class, 'bookSuccessful'])->name('bookSuccessful');

Route::get('print-pdf',[App\Http\Controllers\FrontController::class, 'printPdf'])->name('printPdf');

Route::group(['middleware'=>['auth','role:Super Admin|Admin'],'prefix'=>'backend','as'=>'backend.'],function(){
    Route::get('/',[App\Http\Controllers\Admin\DashboardController::class,'index'])->name('dashboard');
    Route::get('/charts',[App\Http\Controllers\Admin\DashboardController::class,'charts'])->name('charts');
    Route::get('/tables',[App\Http\Controllers\Admin\DashboardController::class,'tables'])->name('tables');
    Route::resource('types',App\Http\Controllers\Admin\TypeController::class);
    Route::resource('rooms',App\Http\Controllers\Admin\RoomController::class);
    Route::resource('payments',App\Http\Controllers\Admin\PaymentController::class);
    Route::resource('users',App\Http\Controllers\Admin\UserController::class);

    Route::get('books',[App\Http\Controllers\Admin\BookController::class,'books'])->name('books');
    Route::get('bookAccept',[App\Http\Controllers\Admin\BookController::class,'bookAccept'])->name('bookAccept');
    Route::get('bookComplete',[App\Http\Controllers\Admin\BookController::class,'bookComplete'])->name('bookComplete');
    Route::put('books/{id}',[App\Http\Controllers\Admin\BookController::class,'status'])->name('books.status');
    Route::get('books/{id}',[App\Http\Controllers\Admin\BookController::class,'bookDetail'])->name('books.detail');

    
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
