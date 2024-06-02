<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index(){
        $events = Event::all();
        return view('layout.event', ['data' => $events]);
    }

    public function index2(){
        $events = Event::all();
        return view('layout.index', ['data' => $events]);
    }

    public function addevent(Request $req){
        // Validation
        $validatedData = $req->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Handle File Upload
        if ($req->hasFile('image')) {
            $file = $req->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $path = 'assets/uploads/';
            $file->move($path, $filename);
    
            // Save Event Data
            $event = new Event();
            $event->title = $req->title;
            $event->content = $req->content;
            $event->date = $req->date;
            $event->time = $req->time;
            $event->image = $path.$filename;
            $event->created_at = now();
            $event->updated_at = now();
    
            if ($event->save()) {
                return redirect()->route('event')->with('success', 'Event added successfully.');
            } else {
                return back()->with('error', 'Failed to add event.');
            }
        } else {
            return back()->with('error', 'Image upload failed.');
        }
    }
}
