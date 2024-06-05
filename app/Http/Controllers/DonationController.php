<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function showForm() {
        return view('layout.donation');
    }

    public function donate(Request $req) {
        $req->validate([
            'name' => 'required|alpha|max:255',
            'email' => 'required|email|max:255',
            'amount' => 'required|numeric|min:1',
            'payment_method' => 'required|string|in:credit_card,paypal',
        ]);

        Donation::create([
            'name' => $req->name,
            'email' => $req->email,
            'amount' => $req->amount,
            'payment_method' => $req->payment_method,
        ]);

        return redirect()->route('donate')->with('success', 'Thank you for your donation!');
    }

    public function index(Request $req) {
        $search = $req->query('search');
        $donations = Donation::when($search, function($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                         ->orWhere('email', 'like', "%{$search}%")
                         ->orWhere('payment_method', 'like', "%{$search}%");
        })->paginate(10);

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
