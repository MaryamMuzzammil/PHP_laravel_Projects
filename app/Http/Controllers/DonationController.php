<?php

namespace App\Http\Controllers;



use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;



class DonationController extends Controller
{
    public function showForm() {
        return view('layout.donation');
    }
    public function donate(Request $req) {
        $req->validate([
            'name' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
            'email' => 'required|email|max:255',
            'amount' => 'required|numeric|min:1',
            'payment_method' => 'required|string|in:credit_card,paypal',
        ]);
    
        // Find user by email or create a new user if not found
        $user = User::firstOrCreate(['email' => $req->email], ['name' => $req->name]);
    
        Donation::create([
            'user_id' => $user->id,
            'name' => $req->name,
            'email' => $req->email,
            'amount' => $req->amount,
            'payment_method' => $req->payment_method,
        ]);
    
        return redirect()->route('donate')->with('success', 'Thank you for your donation!');
    }
    
    public function index(Request $req) {
        $search = $req->query('search');
        
        // Role-based data filtering
        if (Auth::user()->role->name == 'admin') {
            // Admins see all donations
            $query = Donation::query();
        } else {
            // Non-admins see only their donations
            $query = Donation::where('user_id', Auth::id());
        }
    
        // Apply search filter
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('payment_method', 'like', "%{$search}%");
            });
        }
    
        $donations = $query->paginate(10);
    
        return view('layout.donationlist', compact('donations', 'search'));
    }
    

    public function create() {
        return view('layout.donation');
    }

    public function store(Request $req) {
        $req->validate([
            'name' => 'required|alpha|max:255',
            'email' => 'required|email|max:255',
            'amount' => 'required|numeric|min:1',
            'payment_method' => 'required|string|in:credit_card,paypal',
        ]);

        Donation::create($req->all());

        return redirect()->route('donate')->with('success', 'Donation added successfully.');
    }

    public function edit(Donation $donation) {
        return view('layout.donationedit', compact('donation'));
    }

    public function update(Request $req, Donation $donation) {
        $req->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'amount' => 'required|numeric|min:1',
            'payment_method' => 'required|string|in:credit_card,paypal',
        ]);

        $donation->update($req->all());

        return redirect()->route('donations.index')->with('success', 'Donation updated successfully.');
    }

    public function destroy(Donation $donation) {
        $donation->delete();

        return redirect()->route('donations.index')->with('success', 'Donation deleted successfully.');
    }
}
