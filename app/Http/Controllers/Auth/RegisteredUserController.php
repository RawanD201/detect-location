<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */


    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'phone' => ['string', 'max:11']
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'phone' => $request->phone,
            'status' => $request->status,
            'role' =>  \App\Enums\Role::set($request->role)
        ]);
        return redirect(route('users.index'));
    }


    public function all()
    {
        if (request()->user()->cannot('view', User::class)) {
            return back();
        }
        $users = User::where('id', '<>', 1)->get();
        return view('users.index', compact('users'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'phone' => ['string', 'max:11']
        ]);


        $user = User::find($id);
        $user->update([

            'name' => $request->name,
            'username' => $request->username,
            'phone' => $request->phone,
            'status' => $request->status,
            'role' =>  \App\Enums\Role::set($request->role)
        ]);
        return back()->with('success', 'user seccessfully updated');
    }


    public function edit($id)
    {
        $user = User::find($id);
        return compact('user');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return back()->with('success', 'user seccessfully removed');
    }
}
