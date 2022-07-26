<?php

use App\Http\Controllers\Tojars\TojarController;
use Illuminate\Support\Facades\Auth;
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


Auth::routes();

Route::get('/', static function (){
    return view('tojars.index');
});

Route::get('add', static function (){
    return view('tojars.add');
});
Route::get('tojar/create',[TojarController::class,'create'])->name('tojar/create')->middleware('auth');
Route::post('tojar_store',[TojarController::class,'store'])->name('tojar_store')->middleware('auth');
Route::get('tojar',[TojarController::class,'index'])->name('tojar')->middleware('auth');
Route::get('tojar_edit::46779::5{id}18::6798',[TojarController::class,'edit'])->name('tojar_edit::46779::5{id}18::')->middleware('auth');
Route::put('tojar_upDate{id}',[TojarController::class,'update'])->name('tojar_upDate{id}')->middleware('auth');
Route::post('tojar_delete{id}',[\App\Http\Controllers\Api\TojarApi::class,'destroy'])->name('tojar_delete{id}')->middleware('auth');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


