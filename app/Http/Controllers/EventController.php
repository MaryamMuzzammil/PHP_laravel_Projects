<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\PermissionRole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

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
    public function list()
    {  
        $permissionEvent = PermissionRole::getPermission('Event',Auth::user()->role_id);
       if(empty($permissionEvent)){

            abort(404);
        }
        $data['permissionAdd'] = PermissionRole::getPermission('Add Event',Auth::user()->role_id);
        $data['permissionEdit'] = PermissionRole::getPermission('Edit Event',Auth::user()->role_id);
        $data['permissionDelete'] = PermissionRole::getPermission('Delete Event',Auth::user()->role_id);
        $data['getRecord'] = Event::getRecord();
        return view('panel.events.list',$data);

}
      public function add() {
        $permissionEvent = PermissionRole::getPermission('Add Event',Auth::user()->role_id);
        if(empty($permissionEvent)){
 
             abort(404);
         }
       $data['getRole'] = Role::getRecord();
        return view('panel.events.add',$data);
}


public function insert(Request $req)
 { 
    $permissionEvent = PermissionRole::getPermission('Add Event',Auth::user()->role_id);
        if(empty($permissionEvent)){
 
             abort(404);
         }
    $validatedData = $req->validate([
    'title' => 'required|string|max:255',
    'content' => 'required|string',
    'date' => 'required|date',
    'time' => 'required|date_format:H:i',
    'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
]);
   
    // Handle file upload
    if ($req->hasFile('image')) {
        $file = $req->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $path = 'assets/uploads/';
        $file->move(public_path($path), $filename);

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
        return redirect()->route('eventslist')->with('success', 'Event added successfully.');
    } else {
        return back()->with('error', 'Failed to add event.');
    }
} else {
    return back()->with('error', 'Image upload failed.');
}
}
public function edit($id)
{   
    $permissionEvent = PermissionRole::getPermission('Edit Event',Auth::user()->role_id);
        if(empty($permissionEvent)){
 
             abort(404);
         }
    $data['getRecord'] =Event::find($id);
    $data['getRole'] = Role::get();  
    return view('panel.events.edit',$data);
}
public function update($id,Request $request)
{
    $permissionEvent = PermissionRole::getPermission('Edit Event',Auth::user()->role_id);
    if(empty($permissionEvent)){

         abort(404);
     }
    // Validate request data
     $request->validate([
    'title' => 'required|string|max:255',
    'content' => 'required|string',
    'date' => 'required|date',
    'time' => 'required|date_format:H:i',
    'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
]);

// Find the blog by ID
$event = Event::find($id);
if (!$event) {
    return redirect()->back()->with('error', 'Event not found');
}

// Update fields
$event->title = $request->title;
$event->content = $request->content;
$event->date = $request->date;
$event->time = $request->time;

// Handle image upload if present
if ($request->hasFile('image')) {
    $file = $request->file('image');
    $filename = time() . '.' . $file->getClientOriginalExtension();
    $path = 'assets/uploads/';
    $file->move(public_path($path), $filename);

    // Delete old image if exists
    if ($event->image && File::exists(public_path($event->image))) {
        File::delete(public_path($event->image));
    }

    $event->image = $path . $filename;
}

// Save blog entry and handle success/failure
if ($event->save()) {
   
    return redirect()->route('eventslist')->with('success', 'Event updated successfully.');
} else {
    return redirect()->back()->with('error', 'Failed to update Event.');
}

    return redirect('panel/events')->with('success','Event successfully updated');
}

public function delete($id,Request $request)
 { 
    $permissionEvent = PermissionRole::getPermission('Delete Event',Auth::user()->role_id);
    if(empty($permissionEvent)){

         abort(404);
     }
    $save = Event::find($id);
    $save->delete();
    return redirect('panel/events')->with('success','Event successfully deleted');


    
}
    
}
   
