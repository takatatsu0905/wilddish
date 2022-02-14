<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Recipe;
use App\Models\Tool;
use App\Models\Process;

class FormController extends Controller
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
    
    public function form()
    {
        $tools = Tool::all();
        return view('forms.form', compact('tools'));
    }

    public function store(Request $request)
    {
        if(!$request->image_name){
            $image=null;
        }
        else
        {
            $filename = $request->file('image_name')->getClientOriginalName();
            $image = $request->file('image_name')->storeAs('',$filename,'public');
        }

        $recipe = $request->user()->recipes()->create([
            'title' => $request->title,
            'ingredients' => $request->ingredients,
            'image_name' => $image,
            'tool_id' => $request->tools
        ]);

        $this->process1($request, $recipe->id);
        $this->process2($request, $recipe->id);
        $this->process3($request, $recipe->id);
        $this->process4($request, $recipe->id);
        $this->process5($request, $recipe->id);
        $recipe->tools()->attach(request()->tools);
        
        // return redirect('/recipes')->with('success','登録完了しました');
        return redirect('/forms');
        
    }

    public function process1(Request $request, $recipe_id)
    {
        if(!$request->process_image1){
            $image=null;
        }
        else{
            $filename = $request->file('process_image1')->getClientOriginalName();
            $image = $request->file('process_image1')->storeAs('',$filename,'public');
        }

        Process::create([
            'recipe_id' => $recipe_id,
            'turn' => $request->turn1,
            'process_title' => $request->process_title1,
            'image_name' => $image,
            'make' => $request->process_make1
        ]);
    }

    public function process2(Request $request, $recipe_id)
    {
        if(!$request->process_image2){
            $image=null;
        }
        else{
            $filename = $request->file('process_image2')->getClientOriginalName();
            $image = $request->file('process_image2')->storeAs('',$filename,'public');
        }

        Process::create([
            'recipe_id' => $recipe_id,
            'turn' => $request->turn2,
            'process_title' => $request->process_title2,
            'image_name' => $image,
            'make' => $request->process_make2
        ]);

    }public function process3(Request $request, $recipe_id)
    {
        if(!$request->process_image3){
            $image=null;
        }
        else{
            $filename = $request->file('process_image3')->getClientOriginalName();
            $image = $request->file('process_image3')->storeAs('',$filename,'public');
        }

        Process::create([
            'recipe_id' => $recipe_id,
            'turn' => $request->turn3,
            'process_title' => $request->process_title3,
            'image_name' => $image,
            'make' => $request->process_make3
        ]);
    }

    public function process4(Request $request, $recipe_id)
    {
        if(!$request->process_image4){
            $image=null;
        }
        else{
            $filename = $request->file('process_image4')->getClientOriginalName();
            $image = $request->file('process_image4')->storeAs('',$filename,'public');
        }

        Process::create([
            'recipe_id' => $recipe_id,
            'turn' => $request->turn4,
            'process_title' => $request->process_title4,
            'image_name' => $image,
            'make' => $request->process_make4
        ]);
    }

    public function process5(Request $request, $recipe_id)
    {
        if(!$request->process_image5){
            $image=null;
        }
        else{
            $filename = $request->file('process_image5')->getClientOriginalName();
            $image = $request->file('process_image5')->storeAs('',$filename,'public');
        }

        Process::create([
            'recipe_id' => $recipe_id,
            'turn' => $request->turn5,
            'process_title' => $request->process_title5,
            'image_name' => $image,
            'make' => $request->process_make5
        ]);
    }

}
