<?php

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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/register-visitor', [App\Http\Controllers\HomeController::class, 'register_visitor'])->name('register.visitor');
Route::post('/store-visitor', [App\Http\Controllers\HomeController::class, 'store_visitor'])->name('visitor.store');
Route::get('/exit-list-visitor', [App\Http\Controllers\HomeController::class, 'exit_list_visitor'])->name('exitlist.visitor');
Route::get('/entry-list-visitor', [App\Http\Controllers\HomeController::class, 'entry_list_visitor'])->name('entrylist.visitor');

// Masters Route

// Visiting Department
Route::get('/department-list', [App\Http\Controllers\MastersController::class, 'index'])->name('list.department');
Route::get('/add-department', [App\Http\Controllers\MastersController::class, 'add_department'])->name('add.department');
Route::post('/store-department', [App\Http\Controllers\MastersController::class, 'store_department'])->name('store.department');
Route::get('/edit-department/{id}', [App\Http\Controllers\MastersController::class, 'edit_department'])->name('edit.department');
Route::put('/update-department/{id}', [App\Http\Controllers\MastersController::class, 'update_department'])->name('update.department');
Route::delete('/delete-department/{id}', [App\Http\Controllers\MastersController::class, 'delete_department'])->name('delete.department');

// purpose of visiting 
Route::get('/visiting-purpose-list', [App\Http\Controllers\MastersController::class, 'visiting_purpose_list'])->name('list.visiting_purpose');
Route::get('/add-visiting-purpose', [App\Http\Controllers\MastersController::class, 'add_visiting_purpose'])->name('add.visiting_purpose');
Route::post('/store-visiting-purpose', [App\Http\Controllers\MastersController::class, 'store_visiting_purpose'])->name('store.visiting_purpose');
Route::get('/edit-visiting-pupose/{id}', [App\Http\Controllers\MastersController::class, 'edit_visiting_purpose'])->name('edit.visiting_purpose');
Route::put('/update-visiting-purpose/{id}', [App\Http\Controllers\MastersController::class, 'update_visiting_purpose'])->name('update.visiting_purpose');
Route::delete('/delete-visiting-purpose/{id}', [App\Http\Controllers\MastersController::class, 'delete_visiting_purpose'])->name('delete.visiting_purpose');