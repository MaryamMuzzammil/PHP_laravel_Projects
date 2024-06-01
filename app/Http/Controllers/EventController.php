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
        $file = $req->file('image');
        $extension = $file->getClientOriginalExtension();

        $filename = time().'.'.$extension;
        $path = 'assets/uploads/';
        $file->move($path, $filename);

        $event = new Event();
        $event->title = $req->title;
        $event->content = $req->content;
        $event->date = $req->date;
        $event->time = $req->time;
        $event->image = $path.$filename;
        $event->created_at = now();
        $event->updated_at = now();

        if ($event->save()) {
            return redirect()->route('event');
        } else {
            return back()->with('error', 'Failed to add event.');
        }
    }
}
