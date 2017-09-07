<?php

namespace RomanPavliukov\Honeycombs\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends Controller
{
    public function loginView() {
        return view('honeycombs::login');
    }

    public function loginAction(Request $request) {

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'role' => 'honeycombs_admin'
        ];

        if (!Auth::attempt($credentials)) {
            return redirect()->route('honey_login');
        }

        return redirect()->route('honey_lobby');
    }

    public function logoutAction() {
        Auth::logout();
        return redirect()->route('honey_login');
    }
}
