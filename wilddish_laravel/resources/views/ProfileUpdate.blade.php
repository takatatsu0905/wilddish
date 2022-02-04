<!-- <!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/profile.css')}}">
</head> -->
@extends('layouts.app')

@section('content')
<body>
    <form action="{{route('profile.update',['id' =>$profile->id])}}" method="POST" enctype='multipart/form-data'>
        @csrf
        <div class="icon-box">
        
            <div class="icon">
                <img src="{{Storage::url($profile->image_name)}}" width="100px">
            </div>
            <div class="iconupdate">
                <input type="file" id="image" name="image">
            </div>
            <!-- <h2>{{$profile->name}}</h2> -->
            <div class="editnamebox">
                <input type="text" value="{{$profile->name}}" class="editname">
            </div>
            
        </div>
        <div class="selfintroduction-box">
            <div class="selfintroductionedit">
                <textarea cols="37" rows="5" wrap="soft" name="introtext" class="introtext" id="introtext" >{{$profile->self_introduction}}</textarea>
            </div>
        <!-- <a href="{{route('profile.edit',['id'=>$profile->id])}}">{{ __('編集') }}</a> -->
        
    
        <!-- <input type="button" value="編集" onclick="location.href='/profile/update'"> -->
    
        
        </div>
        
        <!-- <div class="introupdate">
            <input type="text" name="introtext" id="introtext"value="{{$profile->serf_introduction}}">
        </div> -->
        <div class="editsubmit">
            <input type="submit" value="更新">
        </div>
        
    </form>
</body>
@endsection