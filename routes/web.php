<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\RegistrationController;

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

Route::get('/', function () {
    return view('pages.index');
});


Route::get('/register', [RegistrationController::class, 'create'])->name('registration.create');
Route::post('/registerr', [RegistrationController::class, 'store'])->name('registration.store');
Route::get('/register/success', [RegistrationController::class, 'success'])->name('registration.success');

Route::get('/search', [SearchController::class, 'index'])->name('search.index');
Route::get('/search_result', [SearchController::class, 'search']);
