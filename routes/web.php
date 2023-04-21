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

Route::get('/',[MyContactsController::class,'index'])->name('all_contacts');
Route::get('/create_contact',[MyContactsController::class,'create'])->name('create_contact');
Route::post('/store_contact',[MyContactsController::class,'store'])->name('store_contact');