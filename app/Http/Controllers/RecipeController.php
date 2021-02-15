<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\recipe;
use App\Models\Category;
// use Illuminate\Http\Request;
use App\Http\Requests\RecipeRequest;
// ユーザーID取得のため
use Illuminate\Support\Facades\Auth;
// アップロード時に既存ファイルあれば削除できるようにするため
use Illuminate\Support\Facades\Storage;
// Inputクラスメソッド？を使うため
use Illuminate\Support\Facades\Input;

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
        // アソシエーション組んでたらいらない
        // $categories = Category::all();

        return view('recipes.index', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('recipes.create', compact('categories'));
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
        $recipe = new Recipe;            
        // これがないとエラー
        // SQLSTATE[HY000]: General error: 1364 Field 'user_id' doesn't have a default value (SQL: insert into `recipes` (`title`, `category`, `updated_at`, `created_at`) values (test, 1, 2021-02-09 09:17:00, 2021-02-09 09:17:00))
        $recipe->user_id = Auth::id();
        $recipe->title = $request->title;
        $recipe->category_id = $request->category_id;
        // dd($request);
        // dd(Auth::id());
        if($request->file('image')->isValid()){
            $file_name = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('public/image', $file_name);
            // dd($file_name);
            $recipe->image = basename($path);
        }
        $recipe->save();

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
        $categories = Category::all();
        // Railsとは異なり、find(id)でレコードを取得しなくてもshowもeditが表示される
        return view('recipes.edit', compact('recipe', 'categories'));
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
        $recipe->user_id = Auth::id();
        $recipe->title = $request->title;
        $recipe->category_id = $request->category_id;
        if($request->file('image')->isValid()){
            Storage::delete('public/image/', $recipe->image);//元の画像を削除
            $file_name = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('public/image', $file_name);
            $recipe->image = basename($path);
            $recipe->save();
        }
        $recipe->save(Input::except('image')); 
        return redirect()->route('home')->with('status', 'レシピを更新しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(recipe $recipe)
    {
        $recipe->delete();
        return redirect()
            ->route('recipes.index')
            ->with('status', 'recipeを削除しました');
    }
}
