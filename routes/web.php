<?php

use App\Http\Controllers\CategoryExpensesController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth')->group(function(){
    Route::get('/', function () {
        return view('home');
    })->name('/');
});
Route::middleware('auth')->group(function(){
        //Users routes 
        Route::resource('users', UserController::class);
        Route::resource('categories', CategoryExpensesController::class);
        Route::resource('expenses', ExpenseController::class);
        Route::post('/expenses/date', [ExpenseController::class, 'filterDate'])->name('expenses.fileterDate');
});

Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
