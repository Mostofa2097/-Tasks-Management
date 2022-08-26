<?php

use App\Http\Controllers\CatagoryController;
use App\Http\Controllers\taskController;
use Illuminate\Support\Facades\Route;

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
// Route::get('/catagories', [CatagoryController::class, 'index'])->middleware('auth');
// Route::get('/catagories/create', [CatagoryController::class, 'create'])->middleware('auth');
// Route::post('/catagories', [CatagoryController::class, 'store'])->middleware('auth');
// Route::get('/catagories/{id}/edit', [CatagoryController::class, 'edit'])->middleware('auth');
// Route::put('/catagories/{id}', [CatagoryController::class, 'update'])->middleware('auth');
// Route::delete('/catagories/{id}', [CatagoryController::class, 'destroy'])->middleware('auth');
Route::resource('catagories', CatagoryController::class)->middleware('auth');
Route::resource('tasks', taskController::class)->middleware('auth');
require __DIR__.'/auth.php';
