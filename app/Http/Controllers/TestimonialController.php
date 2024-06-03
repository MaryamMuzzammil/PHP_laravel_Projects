<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('layout.testimonial', ['data' => $testimonials]);
    }

    public function store(Request $req)
    {
        $req->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|string',
            'profession' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        
    if ($req->hasFile('image')) {
        $file = $req->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $path = 'assets/uploads/';
        $file->move($path, $filename);

        // Save Event Data
        $testimonial = new Testimonial();
        $testimonial->name = $req->name;
        $testimonial->content = $req->content;
        $testimonial->profession = $req->profession;
        $testimonial->image = $path.$filename;
        $testimonial->created_at = now();
        $testimonial->updated_at = now();

        if ($testimonial->save()) {
            return redirect()->route('testimonial')->with('success', 'testimonial added successfully.');
        } else {
            return back()->with('error', 'Failed to add testimonial.');
        }
    } else {
        return back()->with('error', 'Image upload failed.');
    }
    }
}
