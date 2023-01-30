<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\CategoryController;

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

//tutte le rotte pubbliche per i profili Guest
Route::get('/', function () {
    return view('welcome');
});

//Tutte le rotte protette che chiedono l'autenticazione
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    //collego la risorsa Post alle rotte, cosi che vengano generate da laravel
    Route::resource('posts', PostController::class)->parameters(['posts' => 'post:slug']);

    Route::resource('categories', CategoryController::class)->parameters(['categories' => 'category:slug']);
});

//Tutte le rotte per l'autenticazione
require __DIR__.'/auth.php';
