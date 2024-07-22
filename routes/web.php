<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* User */
Route::get('/', function () {
    return view('user.home')->with('header-class', 'home-header');
});

Route::get('/about', function () {
    return view('user.about')->with('header-class', 'about-header');
});

Route::get('/projects', function () {
    return view('user.projects');
});

// Route untuk menampilkan form
Route::get('/form', [PageController::class, 'form']);

// Route untuk menampilkan kontak
Route::get('/contact', [PageController::class, 'contact']);

// Route untuk menangani form submission
Route::post('/form/send', [PageController::class, 'storeMember']);
Route::post('/contact/send', [PageController::class, 'storeFeedback']);

/* Admin */
Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class, 'login']);
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/admin/sales', [AdminController::class, 'sales'])->name('admin.sales');
    Route::post('/admin/sales/store', [AdminController::class, 'storeSales'])->name('admin.sales.store');
    Route::post('/admin/sales/update/', [AdminController::class, 'updateSales'])->name('admin.sales.update');
    Route::post('/admin/sales/delete/', [AdminController::class, 'deleteSales'])->name('admin.sales.delete');

    Route::get('/admin/customers', [AdminController::class, 'customers'])->name('admin.customers');

    Route::get('/admin/broadcast', [AdminController::class, 'broadcast'])->name('admin.broadcast');
    Route::post('/admin/broadcast/send', [AdminController::class, 'broadcastSend'])->name('admin.broadcast.send');
    Route::post('/admin/broadcast/upload', [AdminController::class, 'upload'])->name('admin.broadcast.upload');

    Route::get('/admin/feedback', [AdminController::class, 'feedback'])->name('admin.feedback');

    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
});

