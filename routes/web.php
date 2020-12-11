<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PDFController;

use App\Http\Controllers\BookController;
use App\Http\Controllers\DiskController;
use App\Http\Controllers\ClientController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
  Route::resource('books', BookController::class);
  Route::resource('disks', DiskController::class);
  Route::resource('clients', ClientController::class);
  Route::resource('books_rents', ClientController::class);
  Route::resource('disks_rents', ClientController::class);
});

Route::get('generate-pdf', [PDFController::class, 'generatePDF']);