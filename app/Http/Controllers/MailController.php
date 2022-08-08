<?php

namespace App\Http\Controllers;

use App\Mail\SignUp;
use App\Models\User;
use App\Models\Server;
use App\Mail\NewPassword;

use App\Mail\ServerClaimed;
use Illuminate\Http\Request;
use App\Mail\ServerUnclaimed;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    // Send Welcome Email
    public static function sendSignUp(User $user) {
        // $user = User::find(788659);
        // dd($user);
        Mail::to($user->email)->send(new SignUp($user));
    }

    // Send Password Reset Email
    public static function sendNewPassword(User $user, $password) {
        Mail::to($user->email)->send(new NewPassword($user, $password));
    }

    // Send Server Claimed Email
    public static function sendServerClaimed(User $user, Server $server) {
       Mail::to($user->email)->send(new ServerClaimed($user, $server));
    }

    // Send Server Unclaimed Email
    public static function sendServerUnclaimed(User $user, Server $server) {
        Mail::to($user->email)->send(new ServerUnclaimed($user, $server));
    }
}
