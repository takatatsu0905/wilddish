<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>レシピ一覧画面</title>
  @extends('layouts.app')
  <link rel="stylesheet" href="{{ asset('css/list.css') }}">
  @section('content')
</head>
<body>
    <form method="GET" action="{{route('search')}}">
      @csrf
      <div>
          <label for="form-search">検索</label>
          <input type="search" name="q" id="form-search">
      </div>
      <div>
      <input type="checkbox" id="tool1" name="tool1">
      <label for="tool1">tool_id1</label>
      </div>
      <div>
      <input type="checkbox" id="tool2" name="tool2">
      <label for="tool2">tool_id2</label>
      </div>
      <div>
      <input type="checkbox" id="tool3" name="tool3">
      <label for="tool3">tool_id3</label>
      </div>
      <div>
      <input type="checkbox" id="tool4" name="tool4">
      <label for="tool4">tool_id4</label>
      </div>
      <button type="submit">レシピ検索</button>
    </form>
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
        @if(Auth::check())
        <div class="editmove">
          <a href="/edit/{{$recipe->id}}">編集</a>
        </div>
        @endif
      </div>
    @endforeach
    </div>
</body>
</html>
@endsection


