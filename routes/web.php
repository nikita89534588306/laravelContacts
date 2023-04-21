<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyContactsController;
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

Route::get('/contact',[MyContactsController::class,'index'])->name('all_contacts');
Route::get('/contact/create',[MyContactsController::class,'create'])->name('create_contact');
Route::post('/contact/store',[MyContactsController::class,'store'])->name('store_contact');
Route::get('/contact/{id}',[MyContactsController::class,'show'])->name('show_contact');