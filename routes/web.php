<?php

use App\Http\Controllers\Tojars\TojarController;
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



Route::get('/', static function (){
    return view('tojars.index');
});

Route::get('add', static function (){
    return view('tojars.add');
});


Route::get('tojar/create',[TojarController::class,'create'])->name('tojar/create');
Route::post('tojar_store',[TojarController::class,'store'])->name('tojar_store');
Route::get('tojar',[TojarController::class,'index'])->name('tojar');
Route::get('tojar_edit::46779::5{id}18::6798',[TojarController::class,'edit'])->name('tojar_edit::46779::5{id}18::');
Route::put('tojar_upDate{id}',[TojarController::class,'update'])->name('tojar_upDate{id}');
Route::post('tojar_delete{id}',[TojarController::class,'destroy'])->name('tojar_delete{id}');


