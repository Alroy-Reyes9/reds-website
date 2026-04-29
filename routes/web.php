<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ServicesController;
use Illuminate\Support\Facades\Route;

Route::get('/',                [PageController::class, 'home'])->name('home');
Route::get('/services',        [PageController::class, 'services'])->name('services');
Route::get('/services/{slug}', [PageController::class, 'serviceShow'])->name('services.show');
Route::get('/about',           [PageController::class, 'about'])->name('about');
Route::get('/contact',         [PageController::class, 'contact'])->name('contact');
Route::post('/contact',        [ContactController::class, 'submit'])->name('contact.submit');
Route::get('/book',            [PageController::class, 'book'])->name('book');
Route::post('/book',           [BookingController::class, 'store'])->name('book.store');
