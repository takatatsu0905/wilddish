<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Recipe;
use App\Models\Tool;
use App\Models\Users;

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
        $tools = Tool::all();
        $profile = Users::find(\Auth::id());
        return view('recipes.list', compact('tools','recipes','profile'));
    }
}
