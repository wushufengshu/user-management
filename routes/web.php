<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
 
Route::softDeletes();

Route::resource('users', UserController::class)->names([
    'index' => 'users.index',
    'show' => 'users.show',
    'create' => 'users.create', 
    'edit' => 'users.edit',
    'update' => 'users.update'
]);

Route::get('profile', [UserController::class, 'profile'])->middleware(['auth'])->name('profile');
Route::post('profile/upload', [UserController::class, 'imageUpload'])->middleware(['auth'])->name('user.profile.upload');




require __DIR__.'/auth.php';
