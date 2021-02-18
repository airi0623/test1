<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auth = Auth::id();
        // dd($auth);
        $users = User::all();
        return view('users.index', compact('auth', 'users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $auth = Auth::id();
        $user = User::find($auth);
        return view('users.show', compact('user'));
    }
}
