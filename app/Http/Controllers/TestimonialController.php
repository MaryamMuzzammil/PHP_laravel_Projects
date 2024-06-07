<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Models\PermissionRole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('layout.testimonial', ['data' => $testimonials]);
    }
    public function list(Request $request)
    {
        $permissionTestimonial = PermissionRole::getPermission('Testimonial', Auth::user()->role_id);
        if (empty($permissionTestimonial)) {
            abort(404);
        }
    
        $data['permissionAdd'] = PermissionRole::getPermission('Add Testimonial', Auth::user()->role_id);
        $data['permissionEdit'] = PermissionRole::getPermission('Edit Testimonial', Auth::user()->role_id);
        $data['permissionDelete'] = PermissionRole::getPermission('Delete Testimonial', Auth::user()->role_id);
    
        // Search and pagination
        $search = $request->input('search');
        $data['search'] = $search;
    
        // Role-based data filtering
        if (Auth::user()->role->name == 'admin') {
            // Admins see all testimonials
            $query = Testimonial::query();
        } else {
            // Non-admins see only their testimonials
            $query = Testimonial::where('user_id', Auth::id());
        }
    
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('content', 'LIKE', "%{$search}%");
            });
        }
    
        $data['getRecord'] = $query->paginate(10);
    
        return view('panel.testimonials.list', $data);
    }
    
    public function add() {
        $permissionTestimonial = PermissionRole::getPermission('Add Testimonial',Auth::user()->role_id);
        if(empty( $permissionTestimonial)){
 
             abort(404);
         }
        $data['getRole'] = Role::getRecord();
        return view('panel.testimonials.add',$data);
    }

    public function insert(Request $req)
    {
        $permissionTestimonial = PermissionRole::getPermission('Add Testimonial', Auth::user()->role_id);
        if (empty($permissionTestimonial)) {
            abort(404);
        }
    
        $req->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|string',
            'profession' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        if ($req->hasFile('image')) {
            $file = $req->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'assets/uploads/';
            $file->move(public_path($path), $filename);
    
            $testimonial = new Testimonial();
            $testimonial->name = $req->name;
            $testimonial->content = $req->content;
            $testimonial->profession = $req->profession;
            $testimonial->image = $path . $filename;
            $testimonial->user_id = Auth::id(); // Add this line
            $testimonial->created_at = now();
            $testimonial->updated_at = now();
    
            if ($testimonial->save()) {
                return redirect()->route('testimonialslist')->with('success', 'Testimonial added successfully.');
            } else {
                return back()->with('error', 'Failed to add testimonial.');
            }
        } else {
            return back()->with('error', 'Image upload failed.');
        }
    }
  public function edit($id)
    {   
        $permissionTestimonial = PermissionRole::getPermission('Edit Testimonial',Auth::user()->role_id);
       if(empty( $permissionTestimonial)){

            abort(404);
        }
        $data['getRecord'] =Testimonial::find($id);
        $data['getRole'] = Role::get();  
        return view('panel.testimonials.edit',$data);
    }

    public function update($id,Request $request)
    {
        $permissionTestimonial = PermissionRole::getPermission('Edit Testimonial',Auth::user()->role_id);
       if(empty( $permissionTestimonial)){

            abort(404);
        }
        // Validate request data
         $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|string',
            'profession' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        
    ]);

    // Find the blog by ID
    $testimonial = Testimonial::find($id);
    if (! $testimonial) {
        return redirect()->back()->with('error', 'Testimonial not found');
    }

    // Update fields
    $testimonial->name= $request->name;
    $testimonial->content = $request->content;
    $testimonial->profession = $request->profession;

    // Handle image upload if present
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $path = 'assets/uploads/';
        $file->move(public_path($path), $filename);

        // Delete old image if exists
        if ($testimonial->image && File::exists(public_path($testimonial->image))) {
            File::delete(public_path($testimonial->image));
        }

        $testimonial->image = $path . $filename;
    }

    // Save blog entry and handle success/failure
    if ($testimonial->save()) {
        //  PermissionRole::InsertUpdateRecord($request->permission_id,$blog->id);
        return redirect()->route('testimonialslist')->with('success', 'Testimonial updated successfully.');
    } else {
        return redirect()->back()->with('error', 'Failed to update testimonial.');
    }
   
        return redirect('panel/testimonials')->with('success','Testimonials successfully updated');
    }

    public function delete($id,Request $request)
     { $permissionTestimonial = PermissionRole::getPermission('Delete Testimonial',Auth::user()->role_id);
        if(empty( $permissionTestimonial)){
 
             abort(404);
         }
        $save = Testimonial::find($id);
        $save->delete();
        return redirect('panel/testimonials')->with('success','Testimonial successfully deleted');


        
    }
}




