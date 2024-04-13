
<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\FeedbacksController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('users')->name('users.')->middleware('auth')->group(function() {
    Route::get('/', [RegisteredUserController::class, 'index'])->name('index');
    Route::get('/requests', [RegisteredUserController::class, 'requests'])->name('requests');
    Route::get('/{user}', [RegisteredUserController::class, 'show'])->name('show');
});

Route::prefix('orders')->name('orders.')->middleware('auth')->group(function() {
    Route::get('/', [OrdersController::class, 'index'])->name('index');
    Route::get('/{order}', [OrdersController::class, 'show'])->name('show');
});

Route::prefix('reports')->name('reports.')->middleware('auth')->group(function() {
    Route::get('/', [ReportsController::class, 'showMenu'])->name('menu');
    Route::get('/users', [ReportsController::class, 'users'])->name('users');
    Route::get('/orders', [ReportsController::class, 'orders'])->name('orders');
});

Route::prefix('feedbacks')->name('feedbacks.')->middleware('auth')->group(function() {
    Route::get('/', [FeedbacksController::class, 'index'])->name('index');
    Route::get('/create', [FeedbacksController::class, 'create'])->name('create');
    Route::post('/create', [FeedbacksController::class, 'store'])->name('create');
});

require __DIR__ . '/auth.php';
