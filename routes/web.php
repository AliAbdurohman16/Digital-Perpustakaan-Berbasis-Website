<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend;

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
Auth::routes();

Route::get('dashboard', [Backend\DashboardController::class, 'index'])->name('dashboard');
Route::resources([
    'categories' => Backend\CategoryController::class,
    'books' => Backend\BookController::class,
]);
