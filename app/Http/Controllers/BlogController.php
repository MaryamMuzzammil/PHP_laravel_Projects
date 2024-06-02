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
        $validatedData = $req->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);



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
