<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// 足した 
use App\Models\recipe;
use App\Http\Requests\RecipeRequest;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $recipe = Recipe::find(18);

        return view('home', compact('recipe'));
    }
}
