<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>マイレシピ</title>
  @extends('layouts.app')
  <link rel="stylesheet" href="{{ asset('css/myrecipes.css') }}">
  @section('content')
</head>
<body>
  <div class="container">
    @foreach($recipes as $recipe)
      <div class="recipe">
        <div class="image_name">
          <img src="/storage/{{ $recipe->image_name }}" width="150px" height="150px">
        </div>
        <div class="menu">
          <div class="title"><a href="/recipes/{{$recipe->id}}">{{$recipe->title}}</a></div>
          @foreach($recipe->tools as $tool)
          <p class="tool">{{$tool->name}}</p>
          @endforeach
          <p class="ingredients">{{$recipe->ingredients}}</p>
        </div>
        <button type="button" class="edit_button" onclick="location.href='/edit/{{$recipe->id}}'">
          編集
        </button>
        <form action="{{ route('delete', ['recipeid' =>$recipe->id])}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
          <button type="submit" class="edit_button">削除</button>
          {{ csrf_field() }}
        </form>
      </div>
    @endforeach
  </div>
</body>
</html>
@endsection