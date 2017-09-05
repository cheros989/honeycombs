<?php

namespace RomanPavliukov\Honeycombs\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class AuthController extends Controller
{
    public function loginView() {
        return view('honeycombs::login');
    }

    public function loginAction(Request $request) {
        return 1;
    }
}
