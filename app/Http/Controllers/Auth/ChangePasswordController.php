<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function index()
    {
        return view('users.changePassword');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ' required|current_password',
            'password' => 'required|min:3|confirmed',
        ]);


        $request->user()->update([
            'password' => Hash::make($request->password)
        ]);
        return back()->with('success', 'Password successfully changed!');
    }
}
