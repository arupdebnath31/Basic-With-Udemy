<?php

use App\Http\Controllers\ContactController;
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




Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    
    $users = User::all();
    return view('dashboard',compact('users'));

})->name('dashboard');
