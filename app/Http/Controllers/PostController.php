<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function store(Request $request){
        // $file = $request->file('file');
        // $fileName = time().".".$file->getClientOriginalExtension();
        // return $path = Storage::cloud()->getDriver()->readStream($fileName);
        // Post::create([
        //     'title' =>$request->title,
        //     'description'=> $request->description,
        //     'uploaded_file'=>$path,
        // ]);

        // $request->session()->flash('message', "File Successfully Uploaded!");

        // return back();
         // Get the uploaded file from the request
    $file = $request->file('file');

    // Store the file in Google Cloud Storage
    $path = Storage::cloud()->putFile('', $file);

    // Get the response from Google Cloud Storage
    $url = Storage::cloud()->url($path);

      Post::create([
            'title' =>$request->title,
            'description'=> $request->description,
            'uploaded_file'=> $url,
        ]);
    $request->session()->flash('message', "File Successfully Uploaded!");

    return back();
    }

    public function show()
    {
        // $post = Post::latest()->first();
        // $file = $post->uploaded_file;
        // return view('show',compact('file'));

        $dir = '/';
        $recursive = true; // Get subdirectories also?
        $contents = collect(Storage::cloud()->listContents($dir, $recursive));

        return $contents->where('type', '=', 'dir'); // directories
        // return $contents->where('type', '=', 'file'); // files

    }
}
