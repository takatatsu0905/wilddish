<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tool;
use App\Models\Recipe;
use App\Models\Users;
use Illuminate\Database\Eloquent\Model;


class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('search');
    }

    public function recipes()
    {
        return $this->belongsToMany('Recipe','recipe_tool','tool_id','recipe_id');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
        return view('recipes/list',compact('recipes','tools','profile'));
    }
}
