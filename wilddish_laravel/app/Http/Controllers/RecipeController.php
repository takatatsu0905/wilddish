<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Recipe;
use App\Models\Tool;
use App\Models\Process;

class RecipeController extends Controller
{
    /**
     * レシピ一覧
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request, $id)
    {
        $recipe = Recipe::find($id);
        
        return view('recipes.index', ['recipe' => $recipe]);
    }

    public function list()
    {
        $recipes = Recipe::all();
        return view('recipes.list', ['recipes' => $recipes]);
    }
}
