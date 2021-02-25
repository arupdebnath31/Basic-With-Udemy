<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BrandController;
use App\Models\User;
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

Route::get('contact', [ContactController::class, 'index'])->middleware('check_age');

//category controller
Route::get('category/all', [CategoryController::class, 'AllCat'])->name('all.category');
Route::post('category/add', [CategoryController::class, 'AddCAt'])->name('store.category');
Route::get('category/edit/{id}', [CategoryController::class, 'Edit'])->name('edit.category');
Route::post('category/update/{id}', [CategoryController::class, 'update'])->name('update.category');
Route::get('category/delete/{id}', [CategoryController::class, 'delete'])->name('delete.category');

//Brand Controller Routes are listed here\

Route::get('brand/all', [BrandController::class, 'AllBrand'])->name('all.brand');
Route::post('brand/add', [BrandController::class, 'StoreBrand'])->name('store.brand');
Route::get('brand/edit/{id}', [BrandController::class, 'Edit'])->name('edit.brand');






Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    
    $users = User::all();
    return view('dashboard',compact('users'));

})->name('dashboard');
