<?php

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
Route::get('/test' , [\App\Http\Controllers\PDFController::class , 'test']);
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::middleware(['auth:'.config('fortify.guard')])->group(function() {
    Route::get('/pdf/{slug}' , [\App\Http\Controllers\PDFController::class , 'index'])->name('pdf.index');
    Route::get('/pdf/download/{slug}' , [\App\Http\Controllers\PDFController::class , 'download'])->name('pdf.download');
    Route::post('/save/{id}' , [\App\Http\Controllers\PDFController::class , 'update'])->name('api.update');
    Route::get('/cvs' , [\App\Http\Controllers\CVController::class , 'index'])->name('cvs.index');
    Route::get('/url', function (){ return storage_path(\Auth::user()->profile_photo_path); })->name('storage.url');


});
// Route::post('/post/login', [\App\Http\Controllers\LoginController::class , 'login'])->name('post.login');