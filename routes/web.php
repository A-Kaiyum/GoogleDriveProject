<?php

use App\Models\Post;
use Illuminate\Contracts\Session\Session;
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
});

Route::post('upload', function (Request $request) {
    $file = $request->file('file');
    $fileName = time().'_'.$file->getClientOriginalName();
    $file ->store('' ,'google');
    Post::create([
        'title' =>$request->title,
        'description'=> $request->description,
        'uploaded_file'=>'uploads/'.$fileName,
    ]);

    $request->session()->flash('message', "File Successfully Uploaded!");

    return back();
});

Route::get('test', function() {
    Storage::disk('google')->put('test.txt', 'Hello World');
});
