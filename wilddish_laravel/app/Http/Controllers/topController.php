<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Recipe;
use App\Models\Tool;
use App\Models\Users;

class topController extends Controller
{
    //indexという名前を後ほどroutes/web.php に設定する
    public function index(){ 
        $recipes = Recipe::all();
        $tools = Tool::all();
        $profile = Users::find(\Auth::id());
        return view('welcome', compact('tools','recipes','profile'));
    }

    public function search(Request $request)
    {
        $tools = Tool::all();

        $serach=$request->input('q');

        $toolId = $request->tools;
        $query = Recipe::query();
        if(!is_null($request->tools)){
            $query->whereHas('tools', function($q) use($toolId)  {
                $q->whereIn('recipe_tool.tool_id', $toolId);
            });
        }

        if(isset($serach) && $serach != "") {
            $query->where('title', 'like', '%'.$serach.'%');
        }
    // dd($query->get());
    //     $query=DB::table('recipes');
    //     //検索ワードの全角スペースを半角スペースに変換
    //     $serach_spaceharf=mb_convert_kana($serach, 's');
    //     //検索ワードを半角スペースで区切る
    //     $keyword_array=preg_split('/[\s]+/', $serach_spaceharf, -1, PREG_SPLIT_NO_EMPTY);
    //     $query->where('title', 'like', '%'.$serach.'%')->whereIn('tool_id',$request->tools);
    //     $query->select('id','user_id','image_name', 'title','tool_id','ingredients');
    //     //   $query->select('id','user_id','image_name', 'title','tool_id','ingredients');

        $recipes=$query->paginate(20);
        $profile = Users::find(\Auth::id());
        return view('welcome',compact('recipes','tools','profile'));
    }
}
