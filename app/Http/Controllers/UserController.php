<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Server;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\MailController;

class UserController extends Controller
{
    // List All Users
    public function index() {
        // dd(request('tag'));
        return view('users.index', [
            'users' => User::sortable(['created_at' => 'desc'])->filter(request(['search']))->paginate(10)
        ]);
    }

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
        $formFields['id'] = fake()->unique()->numerify('######');
        
        // Create User
        $user = User::create($formFields);

        // Send Email
        MailController::sendSignUp($user);

        // Login
        auth()->login($user);

        return redirect('/')->with('message', 'Successfully registered and logged in!');
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

        return redirect('/')->with('message', 'Successfully logged out!');
    }

    // Authenticate User
    public function authenticate(Request $request) {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'Successfully logged in!');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    // List User's Claimed Servers
    public function manage($id) {
        try {
            return view('users.manage', [
                'servers' => User::find($id)->servers()->get()
            ]);
        } catch (Exception $th) {
            dd($th);
        }
    }

    // List Logged In User's Servers
    public function getServers() {
        try {
            return view('users.manage', [
                'servers' => auth()->user()->servers()->get()
            ]);
        } catch (Exception $th) {
            ddd($th);
        }
    }

    // Show User Create Form for Admin
    public function adminCreate() {
        return view('users.create');
    }

    // Create New User as Admin
    public function adminStore(Request $request) {
        // dd($request);
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6'],
            'isAdmin' => ['required']
        ]);

        // Hash Password & ID
        $formFields['password'] = bcrypt($formFields['password']);
        $formFields['id'] = fake()->unique()->numerify('######');

        // Create User
        User::create($formFields);

        return redirect('/')->with('message', 'Successfully created user!');
    }    

    // Show Admin Actions
    public function admin($id) {
        // dd(User::find($id))
        try {
            return view('users.admin', [
                'user' => User::find($id)
            ]);
        } catch (Exception $th) {
            return redirect('/')->with('message', 'User not found!');
        }
    }

    // Delete User as Admin
    public function destroy($id) {
        // dd($id);
        try {
            $user = User::find($id);

            foreach ($user->servers as $server) {
                // dd($server);
                ServerController::unclaim($server->id);
            }

            User::find($id)->delete();
        } catch (Exception $th) {
            dd($th);
            return redirect('/')->with('message', 'Error deleting user!');
        }

        return redirect('/')->with('message', 'Successfully deleted user and unclaimed servers!');
    }

    // Update User as Admin
    public function update(Request $request, $id) {
        // dd($request);
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'isAdmin' => ['required']
        ]);

        // Update User
        try {
            User::find($id)->update($formFields);
        } catch (Exception $th) {
            return redirect('/')->with('message', 'Error updating user!');
        }

        return redirect('/users')->with('message', 'Successfully updated user!');
    }

    // Assign a random password to a user as Admin
    public function assignPassword($id) {
        // dd($id);
        try {
            $user = User::find($id);
            $password = fake()->password;
            MailController::sendNewPassword($user, $password);
            $password = bcrypt($password);
            throw new Exception("Error Processing Request", 1);
            
            $user->update(['password' => $password]);
            $user->save();
        } catch (Exception $th) {
            // dd($th->getMessage());
            return redirect('/')->with('message', 'Error assigning password!' . $th->getMessage());
        }

        

        return redirect('/users')->with('message', 'Successfully assigned password!');
    }

}