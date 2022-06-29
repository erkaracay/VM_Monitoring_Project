<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
      // Show Register/Create Form
      public function create() {
        return view('users.register');
    }

    // Create New User
    public function store(Request $request) {
        // dd($request);
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6'],
        ]);

        // Hash Password & ID
        $formFields['password'] = bcrypt($formFields['password']);
        $formFields['id'] = fake()->unique()->numberBetween(1, 100);
        
        // Create User
        $user = User::create($formFields);

        // Login
        auth()->login($user);

        return redirect('/');
    }

    // Show Login Form
    public function login() {
        return view('users.login');
    }

    // Log User Out
    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    // Authenticate User
    public function authenticate(Request $request) {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }
}
