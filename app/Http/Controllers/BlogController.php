<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Event;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $blogs = Blog::all();
        return view('layout.blogs', ['data' => $blogs]);
    }

    public function index2b(){
        $blogs = Blog::all();
        return view('layout.index', ['data' => $blogs]);
    }
    public function addblog(Request $req){
        $file = $req->file('image');
        $extension = $file->getClientOriginalExtension();

        $filename = time().'.'.$extension;
        $path = 'assets/uploads/';
        $file->move($path, $filename);

        $blog = new Blog();
        $blog->title = $req->title;
        $blog->content = $req->content;
        $blog->date = $req->date;
        $blog->image = $path.$filename;
        $blog->created_at = now();
        $blog->updated_at = now();

        if ($blog->save()) {
            return redirect()->route('blogs');
        } else {
            return back()->with('error', 'Failed to add blog.');
        }
    }
}
