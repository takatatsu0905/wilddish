<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Recipe;
use App\Models\Tool;
use App\Models\Process;

class EditController extends Controller
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
    
    public function edit($id)
    {
        $recipe = Recipe::find($id);
        $tools = $recipe->tools->pluck('id')->toArray();
        $toolList = Tool::all();
        $processes = Process::find($id);
        return view('recipes.edit', compact('recipe', 'tools', 'toolList', 'processes'));
    }

    public function update(Request $request, $recipeid)
    {
        //$recipeid = $request->recipeid;
        if(!$request->image_name){
            $image=null;
        }
        else
        {
            $filename = $request->file('image_name')->getClientOriginalName();
            $image = $request->file('image_name')->storeAs('',$filename,'public');
        }
        if(!$request->process_image1){
            $processimage1=null;
        }
        else{
            $filename = $request->file('process_image1')->getClientOriginalName();
            $processimage1 = $request->file('process_image1')->storeAs('',$filename,'public');
        }
        if(!$request->process_image2){
            $processimage2=null;
        }
        else{
            $filename = $request->file('process_image2')->getClientOriginalName();
            $processimage2 = $request->file('process_image2')->storeAs('',$filename,'public');
        }
        if(!$request->process_image3){
            $processimage3=null;
        }
        else{
            $filename = $request->file('process_image3')->getClientOriginalName();
            $processimage3 = $request->file('process_image3')->storeAs('',$filename,'public');
        }
        if(!$request->process_image4){
            $processimage4=null;
        }
        else{
            $filename = $request->file('process_image4')->getClientOriginalName();
            $processimage4 = $request->file('process_image4')->storeAs('',$filename,'public');
        }
        if(!$request->process_image5){
            $processimage5=null;
        }
        else{
            $filename = $request->file('process_image5')->getClientOriginalName();
            $processimage5 = $request->file('process_image5')->storeAs('',$filename,'public');
        }

        $update = [
            'title' => $request->title,
            'ingredients' => $request->ingredients,
            'image_name' => $image,
        ];

        $processupdate1 = [
            'turn' => $request->turn1,
            'process_title' => $request->process_title1,
            'image_name' => $processimage1,
            'make' => $request->process_make1
        ];
        $processupdate2 = [
            'turn' => $request->turn2,
            'process_title' => $request->process_title2,
            'image_name' => $processimage2,
            'make' => $request->process_make2
        ];
        $processupdate3 = [
            'turn' => $request->turn3,
            'process_title' => $request->process_title3,
            'image_name' => $processimage3,
            'make' => $request->process_make3
        ];
        $processupdate4 = [
            'turn' => $request->turn4,
            'process_title' => $request->process_title4,
            'image_name' => $processimage4,
            'make' => $request->process_make4
        ];
        $processupdate5 = [
            'turn' => $request->turn5,
            'process_title' => $request->process_title5,
            'image_name' => $processimage5,
            'make' => $request->process_make5
        ];

        Recipe::where('id', $recipeid)->update($update);
        $recipe = Recipe::find($recipeid);
        $recipe->tools()->sync(request()->tools);
        Process::where('recipe_id', $recipeid)->where('turn', 1)->update($processupdate1);
        Process::where('recipe_id', $recipeid)->where('turn', 2)->update($processupdate2);
        Process::where('recipe_id', $recipeid)->where('turn', 3)->update($processupdate3);
        Process::where('recipe_id', $recipeid)->where('turn', 4)->update($processupdate4);
        Process::where('recipe_id', $recipeid)->where('turn', 5)->update($processupdate5);
        return redirect('/forms');
    }

    public function destroy(Request $request)
    {
        $recipeid = $request->recipeid;
        $recipe = Recipe::find($recipeid);
        $recipe->delete();
        $recipe->processes()->each(function ($process) {
            $process->delete();
        });
        $recipe->tools()->detach();
        return redirect('/profile');
    }
}
