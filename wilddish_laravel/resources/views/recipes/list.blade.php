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
        @foreach($tools as $tool)
          <label>
            <input type="checkbox" name="tools[]" value="{{ $tool->id }}">{{ $tool->name }}
          </label>
        @endforeach
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
      </div>
    @endforeach
    </div>
</body>
</html>
@endsection


