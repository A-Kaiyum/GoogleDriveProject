<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Google\Service\CloudSearch\Id;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function store(Request $request){
        $dir = 'use_key';
        $subdir = '1vuOpsK0wlDu9GjwBYtay4q94mP0np1tL';
        $file = $request->file('file');

        // Store the file in Google Cloud Storage
        $path = Storage::cloud()->putFile($subdir, $file);

        // Get all info back
        $data = Storage::cloud()->getMetaData($path);

        // Get the response from Google Cloud Storage
        $url = Storage::cloud()->url($path);

        Post::create([
                'title' =>$request->title,
                'description'=> $request->description,
                'uploaded_file'=> $url,
            ]);
        $request->session()->flash('message', "File Successfully Uploaded!");

        return back();

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
    }

    public function show()
    {
        $post = Post::latest()->first();
        $url = $post->uploaded_file;

        $query = parse_url($url,PHP_URL_QUERY);
        parse_str($query,$params);
        $id =  $params['id'];

        return view('show',compact('url','id'));

        // $dir = '/';
        // $recursive = true; // Get subdirectories also?
        // $contents = collect(Storage::cloud()->listContents($dir, $recursive));

        // // return $contents->where('type', '=', 'dir'); // directories
        // return $contents->where('type', '=', 'file'); // files

    }
    public function delete($id){

        $post = Post::latest()->first();
        $post->delete();
        Storage::cloud()->delete($id);
        Session::flash('message', "File Successfully Deleted!");
        return redirect()->route('home');
    }
}
