<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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
    return view('index');
})->name('home');

Route::post('upload', [PostController::class,'store'])->name('upload.file');
Route::get('show', [PostController::class,'show'])->name('show.file');
Route::get('/delete/{id}', [PostController::class,'delete'])->name('delete.file');
Route::get('/download/{id}', [PostController::class,'download'])->name('download.file');

Route::get('test', function() {
    Storage::disk('google')->put('test.txt', 'Hello World');
});
