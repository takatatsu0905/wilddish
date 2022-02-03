<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    $serach=$request->input('q');

    $tool1=$request->input('tool1');

    $tool2=$request->input('tool2');

    $tool3=$request->input('tool3');

    $tool4=$request->input('tool4');

    $query=DB::table('recipes');

    //検索ワードの全角スペースを半角スペースに変換
    $serach_spaceharf=mb_convert_kana($serach, 's');


    //検索ワードを半角スペースで区切る
    $keyword_array=preg_split('/[\s]+/', $serach_spaceharf, -1, PREG_SPLIT_NO_EMPTY);

    //検索ワードをループで回してマッチするレコードを探す
    

    // foreach ($keyword_array as $keyword) {
    //     $query->where('title', 'like', '%'.$keyword.'%');
    //   }

      if(!empty($serach)){
        $query->where('title', 'like', '%'.$serach.'%');
      }
      if(!empty($tool1)){
          $query->where('tool_id','1');
      }
      if(!empty($tool2)){
        $query->where('tool_id','2');
    }
    if(!empty($tool3)){
        $query->where('tool_id','3');
    }
    if(!empty($tool4)){
        $query->where('tool_id','4');
    }

    
      $query->select('id','user_id','image_name', 'title','tool_id','ingredients');


    $recipes=$query->paginate(20);

    return view('recipes/list',compact('recipes'));
  }
}
