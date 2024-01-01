<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend;
use App\Http\Controllers\Frontend;

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
Route::get('/', [Frontend\HomeController::class, 'index'])->name('home');
Route::get('e-book', [Frontend\EBookController::class, 'index'])->name('ebook');
Route::get('e-book/{slug}', [Frontend\EBookController::class, 'show'])->name('detail');
Route::get('category/{slug}', [Frontend\CategoryController::class, 'index'])->name('category');

Auth::routes();

Route::middleware('role:admin')->group(function () {
    Route::get('dashboard', [Backend\DashboardController::class, 'index'])->name('dashboard');
    Route::resources([
        'categories' => Backend\CategoryController::class,
        'books' => Backend\BookController::class,
        'users' => Backend\UserController::class,
    ]);
    Route::get('export-books-excel', [Backend\BookController::class, 'exportBooksExcel'])->name('export.books.excel');
    Route::get('export-books-pdf', [Backend\BookController::class, 'exportBooksPdf'])->name('export.books.pdf');
});
