<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

 class crudController extends Controller
{
    //

    public function index()
    {
        return view('crud');

    }

    public function createUser(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
        ]);

        $user = User::create([
            'name' => trim($request->input('name')),
            'email' => strtolower($request->input('email')),
            'password' => bcrypt($request->input('password')),
        ]);

        session()->flash('message', 'Your account is created');

    }
}
