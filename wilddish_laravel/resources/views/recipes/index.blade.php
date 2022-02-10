<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>レシピ内容画面</title>
  @extends('layouts.app')
  <link rel="stylesheet" href="{{ asset('css/index.css') }}">
  <script src="{{ mix('js/form.js') }}"></script>
  @section('content')
</head>
<body>
<div class="container">
  <div class="title">
    <h1>レシピの名前</h1>
    <div>{{$recipe->title}}</div>
  </div>
  <div class="tool">
    <h1>使う調理器具</h1>
    <div>
      @foreach($recipe->tools as $tool)
      <div>{{$tool->name}}</div>
      @endforeach
    </div>
  </div>
  <div class="ingredients">
    <h1>材料</h1>
    <div>{{$recipe->ingredients}}</div>
  </div>
  <img src="/storage/{{ $recipe->image_name }}" width="200px" height="200px" class="image_name">
  <div class="process">
    @foreach($recipe->processes as $process)
    <div>
      <div>{{$process->turn}}</div>
      <div>{{$process->process_title}}</div>
      <div>{{$process->make}}</div>
      @if($process['image_name'] != null)
      <img src="/storage/{{ $process->image_name }}" width="200px" height="200px">
      @endif
    </div>
    @endforeach
  </div>
  <a href="/edit/{{$recipe->id}}">編集</a>
</div>
</body>
</html>
@endsection