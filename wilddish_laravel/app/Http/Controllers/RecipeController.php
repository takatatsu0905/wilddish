<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Recipe;

class RecipeController extends Controller
{
    /**
     * レシピ一覧
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $recipe = Recipe::find(27);
        
        return view('recipes.index', ['recipe' => $recipe]);
    }

    public function list()
    {
        $recipes = Recipe::all();
        return view('recipes.list', ['recipes' => $recipes]);
    }

    public function form()
    {
        return view('forms.form');
    }

    public function store(Request $request)
    {

        $filename = $request->file('image_name')->getClientOriginalName();

        $image = $request->file('image_name')->storeAs('',$filename,'public');

        Recipe::create([
            'user_id' => 0,
            'title' => $request->title,
            'tool_id' => 0,
            'ingredients' => $request->ingredients,
            'image_name' => $image
        ]);

        return redirect('/forms');
    }

    
}
