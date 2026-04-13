<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FrontController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;

Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/tentang-kami', [FrontController::class, 'about'])->name('about');
Route::get('/layanan', [FrontController::class, 'services'])->name('services');
Route::get('/portofolio', [FrontController::class, 'portfolio'])->name('portfolio');
Route::get('/klien', [FrontController::class, 'clients'])->name('clients');
Route::get('/sertifikasi', [FrontController::class, 'certifications'])->name('certifications');
// ─── AUTHENTICATION ──────────────────────────────────────────────────────────
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ─── CLIENT DASHBOARD ────────────────────────────────────────────────────────
Route::middleware('auth')->group(function () {
    Route::get('/pesan-jasa', [OrderController::class, 'create'])->name('pesan-jasa');
    Route::get('/client/dashboard', [OrderController::class, 'index'])->name('client.dashboard');
    Route::post('/client/order', [OrderController::class, 'store'])->name('client.order.store');
    Route::post('/client/order/{order}/complete', [OrderController::class, 'complete'])->name('client.order.complete');
});

// ─── DASHBOARD ───────────────────────────────────────────────────────────────
// prefix adalah untuk membuat url menjadi /admin/...
// name adalah untuk membuat nama route menjadi dashboard.index
// middleware adalah untuk membuat route menjadi private
Route::prefix('admin')->name('dashboard.')->middleware('auth')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('index');

    // Clients
    Route::prefix('clients')->name('clients.')->group(function () {
        Route::get('/', [DashboardController::class, 'clientsIndex'])->name('index');
        Route::get('/create', [DashboardController::class, 'clientsCreate'])->name('create');
        Route::post('/', [DashboardController::class, 'clientsStore'])->name('store');
        Route::get('/{client}/edit', [DashboardController::class, 'clientsEdit'])->name('edit');
        Route::put('/{client}', [DashboardController::class, 'clientsUpdate'])->name('update');
        Route::delete('/{client}', [DashboardController::class, 'clientsDestroy'])->name('destroy');
    });

    // Projects
    Route::prefix('projects')->name('projects.')->group(function () {
        Route::get('/', [DashboardController::class, 'projectsIndex'])->name('index');
        Route::get('/create', [DashboardController::class, 'projectsCreate'])->name('create');
        Route::post('/', [DashboardController::class, 'projectsStore'])->name('store');
        Route::get('/{project}/edit', [DashboardController::class, 'projectsEdit'])->name('edit');
        Route::put('/{project}', [DashboardController::class, 'projectsUpdate'])->name('update');
        Route::delete('/{project}', [DashboardController::class, 'projectsDestroy'])->name('destroy');
    });

    // Project Categories
    Route::prefix('project-categories')->name('project-categories.')->group(function () {
        Route::get('/', [DashboardController::class, 'categoriesIndex'])->name('index');
        Route::get('/create', [DashboardController::class, 'categoriesCreate'])->name('create');
        Route::post('/', [DashboardController::class, 'categoriesStore'])->name('store');
        Route::get('/{projectCategory}/edit', [DashboardController::class, 'categoriesEdit'])->name('edit');
        Route::put('/{projectCategory}', [DashboardController::class, 'categoriesUpdate'])->name('update');
        Route::delete('/{projectCategory}', [DashboardController::class, 'categoriesDestroy'])->name('destroy');
    });

    // Orders
    Route::prefix('orders')->name('orders.')->group(function () {
        Route::get('/', [DashboardController::class, 'ordersIndex'])->name('index');
        Route::post('/{order}/confirm', [DashboardController::class, 'ordersConfirm'])->name('confirm');
        Route::post('/{order}/complete', [DashboardController::class, 'ordersComplete'])->name('complete');
        Route::post('/{order}/reject', [DashboardController::class, 'ordersReject'])->name('reject');
    });

    // Services
    Route::prefix('services')->name('services.')->group(function () {
        Route::get('/', [DashboardController::class, 'servicesIndex'])->name('index');
        Route::get('/create', [DashboardController::class, 'servicesCreate'])->name('create');
        Route::post('/', [DashboardController::class, 'servicesStore'])->name('store');
        Route::get('/{service}/edit', [DashboardController::class, 'servicesEdit'])->name('edit');
        Route::put('/{service}', [DashboardController::class, 'servicesUpdate'])->name('update');
        Route::delete('/{service}', [DashboardController::class, 'servicesDestroy'])->name('destroy');
    });

});

