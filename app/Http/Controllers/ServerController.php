<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Server;
use Faker\Core\Number;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ServerController extends Controller
{
    public function index() {
        // dd(request('tag'));
        return view('servers.index', [
            'servers' => Server::paginate(12),
            'users' => User::all()
        ]);
    }

    function prompt($prompt_msg){
        echo("<script type='text/javascript'> var answer = prompt('".$prompt_msg."'); </script>");

        $answer = "<script type='text/javascript'> document.write(answer); </script>";
        return($answer);
    }

    // Claim a server
    public function claim($id) {
        // dd(Server::find($id));
        return view('servers.claim', [
            'server' => Server::find($id)
        ]);
    }

    // Unclaim a server
    public function unclaim($id) {
        // dd(Server::find($id));
        $server = Server::find($id);
        $server->user_id = null;
        $server->available_on = null;
        $server->availability = "available";
        $server->save();

        return redirect('/');
    }

    // Confirm claim of a server
    public function confirmClaim(Request $request) {
        // dd($server->id);
        $server = Server::find($request->id);
        $server->user_id = auth()->user()->id;
        $server->availability = "claimed";
        $server->available_on = $request->date;
        $server->save();

        return redirect('/');
    }

    // List servers to manage
    public function manage() {
        return view('servers.manage', [
            'servers' => Server::paginate(8),
            'users' => User::all()
        ]);
    }

    // Delete server
    public function destroy($id) {
        $server = Server::find($id);

        // if($server->user_id != auth()->id()) {
        //     abort('403', 'Unauthorized Action');
        // }
        $server->delete();

        return back();
    }

    // Show server create form
    public function create() {
        return view('servers.create');
    }

    // Create server
    public function store(Request $request) {
        // dd($request->all());
        $formFields = $request->validate([
            'name' => 'required',
            'ip' => ['required', Rule::unique('servers', 'ip')], // Check if IP is unique
            'running' => 'required'
        ]);

        $formFields['user_id'] = null; // Set user_id to null initially
        $formFields['available_on'] = null; // Set to null to indicate that the server is available
        $formFields['availability'] = "available"; // default to available
        // dd($formFields);

        Server::create($formFields);

        return redirect('/');
    }

    // Show server edit form
    public function edit($id) {
        return view('servers.edit', [
            'server' => Server::find($id),
            'users' => User::all()
        ]);
    }

    // Update server
    public function update(Request $request, $id) {
        // dd($request->all());
        $formFields = $request->validate([
            'name' => 'required',
            'user_id' => 'required',
            'ip' => ['required', Rule::unique('servers', 'ip')->ignore($id)],
            'running' => 'required',
            'date' => 'required'
        ]);
        
        if($request->user_id == "0") {
            $formFields['user_id'] = null;
        }

        $formFields['available_on'] = $formFields['user_id'] == null ? null : $request->date;
        $formFields['availability'] = $formFields['user_id'] == null ? "available" : "claimed";
        // dd($formFields);

        $server = Server::find($id);
        $server->update($formFields);

        return redirect('/servers/manage');
    }
}
