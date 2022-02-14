<!-- <!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head> -->

<!-- <body> -->
    
    <!-- <header>
        <div class="header-yoko">
        <h1>wilddish</h1>
        <div class="to-recipe"><a href="{{route('search')}}">{{ __('レシピ検索') }}</a></div>
        <div class="to-top"><a href="{{route('top')}}">{{__('トップ')}}</a></div>
        </div>
        
    </header> -->
@extends('layouts.app')


@section('content')

<div class="to-recipe"><a href="{{route('list')}}">{{ __('レシピ検索') }}</a></div>
    
    
    <div class="icon-box">
        
        
        <div class="icon">
            
            <img src="{{Storage::url($profile->image_name)}}" width="100px">
            
        </div>
        <h2>{{$profile->name}}</h2>
        <div class="editbuttonbox">
            <button type="button" class="editbutton" onclick="location.href='{{route('profile.edit',['id'=>$profile->id])}}'">編集</button>
        </div>
    </div>

    <div class="selfintroduction-box">
        <div class="selfintroduction">
            <p>{{$profile->self_introduction}}</p>
        </div>
        <!-- <a href="{{route('profile.edit',['id'=>$profile->id])}}">{{ __('編集') }}</a> -->
        
    
        <!-- <input type="button" value="編集" onclick="location.href='/profile/update'"> -->
    
        
    </div>

    
        <!-- <div class="toukourecipe-box">
            <div class="toukourecipe">
                <p class="toukourecipedai">投稿レシピ</p>
                @foreach($recipes as $recipe)
                <div class="toukoureciperaretu">
                    <div class="image_name">
                        <img src="/storage/{{ $recipe->image_name }}" width="200px" height="200px">
                    </div>
                    <div class="setumei">
                        <div class="title">
                            <p>タイトル：{{$recipe->title}}</p>
                        </div>
                        <div class="tool_id">
                            {{$recipe->tool_id}}
                        </div>
                        <div class="ingredients">
                            {{$recipe->ingredients}}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div> -->
        <div class="myrecipes">
            <button type="button" class="editbutton" onclick="location.href='{{route('profile.myrecipes',['id'=>$profile->id])}}'">
            投稿レシピ
            </button>
        </div>
            
        <div class="to-recipetoukou">
            <a href="{{route('form')}}" >{{ __('レシピ投稿') }}</a>
        </div>
    
    
    
</body>
@endsection