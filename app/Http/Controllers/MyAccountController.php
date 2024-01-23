<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class MyAccountController extends Controller
{
    public function myAccount()
    {
        $user = Auth::user()->id;
        $orders = Order::where('user_id', $user)->get();

        return view('my-account', ['orders' => $orders]);
    }
    public function checkEmail(Request $request)
    {
        $exists = User::where('email', $request->email)->exists();
        if ($exists) {
            session(['checkemail' => $request->email]);
            // Redirect to the login page
            return redirect()->route('login');
        } else {
            // Redirect to the registration page
            return redirect()->route('register');
        }
    }
    public function updateProfile(Request $request)
    {
        // Validate the request

        // Get the current user
        $user = Auth::user();

        // Update the user's name and email
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;

        // Save the user
        $user->save();

        // Redirect back with a success message
        return back()->with('success', 'Mise à jour du profil réussie.');
    }

    public function updateProfileAddress(Request $request)
    {
        // Validate the request

        // Get the current user
        $user = Auth::user();

        $user->address = $request->address;
        

        // Save the user
        $user->save();

        // Redirect back with a success message
        return back()->with('success', 'Mise à jour du profil réussie.');
    }

    public function updateProfilePassword(Request $request)
    {
        // Validate the request

        // Get the current user
        $user = Auth::user();

        // Update the user's name and email
       
        $user->password = $request->password;

        // Save the user
        $user->save();

        // Redirect back with a success message
        return back()->with('success', 'Mise à jour du profil réussie.');
    }
}
