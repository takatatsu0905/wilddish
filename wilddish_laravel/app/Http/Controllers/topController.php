<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class topController extends Controller
{
    //indexという名前を後ほどroutes/web.php に設定する
    public function index(){ 
        //bladeファイルの名前 (sample.blade.phpの場合)
        return view('top');
    }
}
