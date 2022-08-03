<?php

namespace App\Http\Controllers;

use App\Mail\SignUp;
use App\Models\User;
use App\Mail\NewPassword;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use function PHPUnit\Framework\returnSelf;

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
        // $user = User::find(788659);
        // dd($user);
        Mail::to($user->email)->send(new NewPassword($user, $password));
    }
}
