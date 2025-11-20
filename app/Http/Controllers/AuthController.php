<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Show login page (optional if you use Route::view)
    public function showLogin()
    {
        return view('login');
    }

    // Handle login form
   public function login(Request $request)
    {
        // 1. Validate input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // 2. Attempt to find user by email
        $account = Account::where('email', $request->email)->first();

        if (!$account || !Hash::check($request->password, $account->password)) {
            return back()->withErrors([
                'login' => 'Incorrect email or password.',
            ])->withInput();
        }

        // 3. Log the user in
        Auth::login($account);

        // 4. Redirect to dashboard
        return redirect('/dashboard');
    }


    // Handle registration form
    public function register(Request $request)
    {
        // 1. Validate input
        $request->validate([
            'first_name'            => 'required|string|max:255',
            'family_name'           => 'required|string|max:255',
            'id_number'             => 'required|string|max:50|unique:accounts,id_number',
            'email'                 => 'required|email|unique:accounts,email',
            'password'              => 'required|min:6|confirmed',
        ]);

        // 2. Create the account
        $account = Account::create([
            'first_name' => $request->first_name,
            'family_name' => $request->family_name,
            'id_number' => $request->id_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // 3. Login the user automatically
        Auth::login($account);

        // 4. Redirect to dashboard
        return redirect('/dashboard');
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect('/'); // login page
    }
}
