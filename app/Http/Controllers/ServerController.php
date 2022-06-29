<?php

namespace App\Http\Controllers;

use App\Models\Server;
use Faker\Core\Number;
use Illuminate\Http\Request;

class ServerController extends Controller
{
    public function index() {
        // dd(request('tag'));
        return view('index', [
            'servers' => Server::all()
        ]);
    }

    public function edit(Request $request) {
        // dd($request->all());
        $server = Server::find($request->id);
        $server->hostname = $request->hostname;
        $server->save();
        return redirect('/');
    }

    // Change the availability of a server
    public function update($number) {
        // dd(Server::find($number));
        $server = Server::find($number);

        if ($server->availability == "available") {
            $server->availability = "unavailable";
        } else { 
            $server->availability = "available"; 
        }

        $server->save();

        return redirect('/');
    }
}
