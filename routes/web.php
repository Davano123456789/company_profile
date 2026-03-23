<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FrontController;

Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/tentang-kami', [FrontController::class, 'about'])->name('about');
Route::get('/layanan', [FrontController::class, 'services'])->name('services');
Route::get('/portofolio', [FrontController::class, 'portfolio'])->name('portfolio');
Route::get('/klien', [FrontController::class, 'clients'])->name('clients');
Route::get('/sertifikasi', [FrontController::class, 'certifications'])->name('certifications');
Route::get('/kontak', [FrontController::class, 'contact'])->name('contact');
