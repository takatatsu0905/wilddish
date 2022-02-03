<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Recipe;
use App\Models\Tool;

class RecipeController extends Controller
{
    /**
     * コンストラクタ
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * レシピ一覧
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $recipe = Recipe::find(12);
        
        return view('recipes.index', ['recipe' => $recipe]);
    }

    public function list()
    {
        $recipes = Recipe::all();
        return view('recipes.list', ['recipes' => $recipes]);
    }

    public function form()
    {
        $tools = Tool::all();
        return view('forms.form', compact('tools'));
    }

    public function store(Request $request)
    {
        $filename = $request->file('image_name')->getClientOriginalName();

        $image = $request->file('image_name')->storeAs('',$filename,'public');

        $recipe = $request->user()->recipes()->create([
            'title' => $request->title,
            'ingredients' => $request->ingredients,
            'image_name' => $image,
            'tool_id' => $request->tools
        ]);

        $recipe->tools()->attach(request()->tools);
        
        return redirect('/recipes')->with('success','登録完了しました');
        
    }

}
