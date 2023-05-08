<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::redirect('/', '/photos');

Route::get('/photos', [PhotoController::class, 'view']);

Route::get('/photo-add', [PhotoController::class, 'store']);
Route::post('/photo-add', [PhotoController::class, 'create']);

Route::get('/photo-delete/{id}', [PhotoController::class, 'delete']);
Route::delete('/photo-delete/{id}', [PhotoController::class, 'destroy']);
