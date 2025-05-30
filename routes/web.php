<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CustomLoginController;

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::get('/login', [CustomLoginController::class , 'login'])->middleware('alreadyLoggedIn');
Route::get('/register', [CustomLoginController::class , 'register'])->middleware('alreadyLoggedIn');
Route::post('/registerUser' , [CustomLoginController::class, 'registerUser'])->name('registerUser');
Route::post('/login-user', [CustomLoginController::class,'loginUser'])->name('loginUser');
Route::get('/viewpage', [CustomLoginController::class, 'viewpage'])->name('viewpage')->middleware('isLoggedIn');
Route::get('/logout', [CustomLoginController::class, 'logout'])->name('logout');
// require __DIR__.'/auth.php';
