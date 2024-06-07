<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Role;
use App\Models\Event;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\PermissionRole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

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
    public function list(Request $request)
    {
        $permissionBlog = PermissionRole::getPermission('Blog', Auth::user()->role_id);
        if (empty($permissionBlog)) {
            abort(404);
        }
    
        $data['permissionAdd'] = PermissionRole::getPermission('Add Blog', Auth::user()->role_id);
        $data['permissionEdit'] = PermissionRole::getPermission('Edit Blog', Auth::user()->role_id);
        $data['permissionDelete'] = PermissionRole::getPermission('Delete Blog', Auth::user()->role_id);
    
        // Search and pagination
        $search = $request->input('search');
        $data['search'] = $search;
    
        // Role-based data filtering
        if (Auth::user()->role->name == 'admin') {
            // Admins see all blogs
            $query = Blog::query();
        } else {
            // Non-admins see only their blogs
            $query = Blog::where('user_id', Auth::id());
        }
    
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                  ->orWhere('content', 'LIKE', "%{$search}%");
            });
        }
    
        $data['getRecord'] = $query->paginate(10);
    
        return view('panel.blogs.list', $data);
    }
    
    public function add() {
        $permissionBlog = PermissionRole::getPermission('Add Blog',Auth::user()->role_id);
       if(empty($permissionBlog)){

            abort(404);
        }
        $data['getRole'] = Role::getRecord();
        return view('panel.blogs.add',$data);
    }


        public function insert(Request $req)
    {    $permissionBlog = PermissionRole::getPermission('Add Blog',Auth::user()->role_id);
        if(empty($permissionBlog)){
 
             abort(404);
         }
        $validatedData = $req->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'date' => 'required|date',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
       
        // Handle file upload
        if ($req->hasFile('image')) {
            $file = $req->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $path = 'assets/uploads/';
            $file->move(public_path($path), $filename);
    
            // Create new blog entry
            $blog = new Blog();
            $blog->title = $req->title;
            $blog->content = $req->content;
            $blog->date = $req->date;
            $blog->image = $path.$filename;
            $blog->created_at = now();
            $blog->updated_at = now();
    
            // Save blog entry and handle success/failure
            if ($blog->save()) {
                // PermissionRole::InsertUpdateRecord($req->permission_id, $blog->id);
                return redirect()->route('blogslist')->with('success', 'Blog added successfully.');
            } else {
                return back()->with('error', 'Failed to add blog.');
            }
        } else {
            return back()->with('error', 'Image upload failed.');
        }
       
    }
    public function edit($id)
    {   
        $permissionBlog = PermissionRole::getPermission('Edit Blog',Auth::user()->role_id);
        if(empty($permissionBlog)){

            abort(404);
        }
        $data['getRecord'] =Blog::find($id);
        $data['getRole'] = Role::get();  
        return view('panel.blogs.edit',$data);
    }

    public function update($id,Request $request)
    {
        $permissionBlog = PermissionRole::getPermission('Edit Blog',Auth::user()->role_id);
        if(empty($permissionBlog)){

            abort(404);
        }
        // Validate request data
         $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'date' => 'required|date',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ]);

    // Find the blog by ID
    $blog = Blog::find($id);
    if (!$blog) {
        return redirect()->back()->with('error', 'Blog not found');
    }

    // Update fields
    $blog->title = $request->title;
    $blog->content = $request->content;
    $blog->date = $request->date;

    // Handle image upload if present
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $path = 'assets/uploads/';
        $file->move(public_path($path), $filename);

        // Delete old image if exists
        if ($blog->image && File::exists(public_path($blog->image))) {
            File::delete(public_path($blog->image));
        }

        $blog->image = $path . $filename;
    }

    // Save blog entry and handle success/failure
    if ($blog->save()) {
        //  PermissionRole::InsertUpdateRecord($request->permission_id,$blog->id);
        return redirect()->route('blogslist')->with('success', 'Blog updated successfully.');
    } else {
        return redirect()->back()->with('error', 'Failed to update blog.');
    }
   
        return redirect('panel/blogs')->with('success','Blogs successfully updated');
    }

    public function delete($id,Request $request)
    {  $permissionBlog = PermissionRole::getPermission('Delete Blog',Auth::user()->role_id);
        if(empty($permissionBlog)){

            abort(404);
        }
        $save = Blog::find($id);
        $save->delete();
        return redirect('panel/blogs')->with('success','Blog successfully deleted');


        
    }
}



    
    

