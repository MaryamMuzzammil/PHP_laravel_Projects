<?php

namespace App\Http\Controllers;



use App\Models\Role;
use App\Models\Donation;
use Illuminate\Http\Request;
use App\Models\PermissionRole;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;



class DonationController extends Controller
{
    // public function showForm() {
    //     return view('layout.donation');
    // }
    // public function donate(Request $req) {
    //     $req->validate([
    //         'name' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
    //         'email' => 'required|email|max:255',
    //         'amount' => 'required|numeric|min:1',
    //         'payment_method' => 'required|string|in:credit_card,paypal',
    //     ]);
    
    //     // Find user by email or create a new user if not found
    //     $user = User::firstOrCreate(['email' => $req->email], ['name' => $req->name]);
    
    //     Donation::create([
    //         'user_id' => $user->id,
    //         'name' => $req->name,
    //         'email' => $req->email,
    //         'amount' => $req->amount,
    //         'payment_method' => $req->payment_method,
    //     ]);
    
    //     return redirect()->route('donate')->with('success', 'Thank you for your donation!');
    // }
    
    // public function index(Request $req) {
    //     $search = $req->query('search');
        
    //     // Role-based data filtering
    //     if (Auth::user()->role->name == 'admin') {
    //         // Admins see all donations
    //         $query = Donation::query();
    //     } else {
    //         // Non-admins see only their donations
    //         $query = Donation::where('user_id', Auth::id());
    //     }
    
    //     // Apply search filter
    //     if ($search) {
    //         $query->where(function ($q) use ($search) {
    //             $q->where('name', 'like', "%{$search}%")
    //               ->orWhere('email', 'like', "%{$search}%")
    //               ->orWhere('payment_method', 'like', "%{$search}%");
    //         });
    //     }
    
    //     $donations = $query->paginate(10);
    
    //     return view('layout.donationlist', compact('donations', 'search'));
    // }
    

    // public function create() {
    //     return view('layout.donation');
    // }

    // public function store(Request $req) {
    //     $req->validate([
    //         'name' => 'required|alpha|max:255',
    //         'email' => 'required|email|max:255',
    //         'amount' => 'required|numeric|min:1',
    //         'payment_method' => 'required|string|in:credit_card,paypal',
    //     ]);

    //     Donation::create($req->all());

    //     return redirect()->route('donate')->with('success', 'Donation added successfully.');
    // }

    // public function edit(Donation $donation) {
    //     return view('layout.donationedit', compact('donation'));
    // }

    // public function update(Request $req, Donation $donation) {
    //     $req->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|max:255',
    //         'amount' => 'required|numeric|min:1',
    //         'payment_method' => 'required|string|in:credit_card,paypal',
    //     ]);

    //     $donation->update($req->all());

    //     return redirect()->route('donations.index')->with('success', 'Donation updated successfully.');
    // }

    // public function destroy(Donation $donation) {
    //     $donation->delete();

    //     return redirect()->route('donations.index')->with('success', 'Donation deleted successfully.');
    // }
    public function index()
    {
        $donations = Donation::all();
        return view('layout.donation', ['data' => $donations]);
    }

    public function list(Request $request)
    {
        $permissionDonation = PermissionRole::getPermission('Donation', Auth::user()->role_id);
        if (empty($permissionDonation)) {
            abort(404);
        }

        $data['permissionAdd'] = PermissionRole::getPermission('Add Donation', Auth::user()->role_id);
        $data['permissionEdit'] = PermissionRole::getPermission('Edit Donation', Auth::user()->role_id);
        $data['permissionDelete'] = PermissionRole::getPermission('Delete Donation', Auth::user()->role_id);

        // Search and pagination
        $search = $request->input('search');
        $data['search'] = $search;

        // Role-based data filtering
        if (Auth::user()->role->name == 'admin') {
            // Admins see all donations
            $query = Donation::query();
        } else {
            // Non-admins see only their donations
            $query = Donation::where('user_id', Auth::id());
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%")
                    ->orWhere('payment_method', 'LIKE', "%{$search}%");
            });
        }

        $data['getRecord'] = $query->paginate(10);

        return view('panel.donations.list', $data);
    }

    public function add()
    {
        $permissionDonation = PermissionRole::getPermission('Add Donation', Auth::user()->role_id);
        if (empty($permissionDonation)) {
            abort(404);
        }

        return view('panel.donations.add');
    }

    public function insert(Request $request)
    {
        $permissionDonation = PermissionRole::getPermission('Add Donation', Auth::user()->role_id);
        if (empty($permissionDonation)) {
            abort(404);
        }
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'amount' => 'required|numeric|min:1',
            'payment_method' => 'required|string|in:credit_card,paypal',
        ]);

        $user = User::firstOrCreate(['email' => $request->email], ['name' => $request->name]);

        Donation::create([
            'user_id' => $user->id,
            'name' => $request->name,
            'email' => $request->email,
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
        ]);

        

        return redirect()->route('donationslist')->with('success', 'Donation added successfully.');
    }

    public function edit($id)
    {
        $permissionDonation = PermissionRole::getPermission('Edit Donation', Auth::user()->role_id);
        if (empty($permissionDonation)) {
            abort(404);
        }

        $data['getRecord'] =Donation::find($id);
        $data['getRole'] = Role::get();  
        return view('panel.donations.edit',$data);

      
    }

    public function update(Request $request, $id)
{
    $permissionDonation = PermissionRole::getPermission('Edit Donation', Auth::user()->role_id);
    if (empty($permissionDonation)) {
        abort(404);
    }

    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'amount' => 'required|numeric|min:1',
        'payment_method' => 'required|string|in:credit_card,paypal',
    ]);

    
    // Find the  by ID
    $donations = Donation::find($id);
    if (!$donations) {
        return redirect()->back()->with('error', 'Donation not found');
    }

    
   // Update fields
    $donations->name = $request->name;
    $donations->email = $request->email;
    $donations->amount = $request->amount;
    $donations->payment_method = $request->payment_method;

 // Save blog entry and handle success/failure
    if ($donations->save()) {
        //  PermissionRole::InsertUpdateRecord($request->permission_id,$donation->id);
        return redirect()->route('donationslist')->with('success', 'Donnation updated successfully.');
    } else {
        return redirect()->back()->with('error', 'Failed to update Donnation.');
    }
  
    

    
}

    public function destroy($id)
    {
        $permissionDonation = PermissionRole::getPermission('Delete Donation', Auth::user()->role_id);
        if (empty($permissionDonation)) {
            abort(404);
        }

        $donation = Donation::find($id);
        if (!$donation) {
            abort(404);
        }

        $save = Donation::find($id);
        $save->delete();
        return redirect()->route('donationslist')->with('success', 'Donation deleted successfully.');
    }

  
  
}
