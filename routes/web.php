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

use App\Http\Controllers\ContactsController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    //return view('auth.login');
    return view('home');
});

Route::get('/', [ContactsController::class, 'index'])->name('contacts.index');

Route::get('/list', [ContactsController::class, 'index'])->name('contacts.index');
Route::get('/edit/{id}', [ContactsController::class, 'edit'])->name('contacts.edit');
Route::get('/delete/{id}', [ContactsController::class, 'delete'])->name('contacts.delete');
Route::get('/create', [ContactsController::class, 'create'])->name('contacts.create');
Route::post('/store', [ContactsController::class, 'store'])->name('contacts.store');
Route::post('/update{id}', [ContactsController::class, 'update'])->name('contacts.update');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();
