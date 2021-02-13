<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\recipe;
// use Illuminate\Http\Request;
use App\Http\Requests\RecipeRequest;
// ユーザーID取得のため
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::orderBy('id','desc')->paginate(20);

        return view('recipes.index', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = config('category');
        // dd($category);
        return view('recipes.create', compact('category'));
        // return view('recipes.create')->with(['category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecipeRequest $request)
    {   
        // dd($request);
        // dd(Auth::id());
        if($request->file('image')->isValid()){
            $recipe = new Recipe;
            // これがないとエラー
            // SQLSTATE[HY000]: General error: 1364 Field 'user_id' doesn't have a default value (SQL: insert into `recipes` (`title`, `category`, `updated_at`, `created_at`) values (test, 1, 2021-02-09 09:17:00, 2021-02-09 09:17:00))
            $recipe->user_id = Auth::id();
            $recipe->title = $request->title;
            $recipe->category = $request->category;
            // ファイル名を指定
            $file_name = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('public/image', $file_name);
            // $path = $request->file('image')->store('public/image');
            // $input->image = basename($filename);
            // dd($filename);
            $recipe->image = basename($path);
            // $recipe->image = $filename
            $recipe->save();
        }

        return redirect()->route('home')->with('status', 'レシピを登録しました');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(recipe $recipe)
    {
        return view('recipes.show', compact('recipe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(recipe $recipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(RecipeRequest $request, recipe $recipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(recipe $recipe)
    {
        //
    }
}
