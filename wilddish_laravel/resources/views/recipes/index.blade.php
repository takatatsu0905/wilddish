<!DOCTYPE html>
<html lang="ja">
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
  <main>
    <div class="flex">
      
      <div class="recipe">
        <h1 class="page-title">{{$recipe->title}}</h1>

        <h2 class="content-title">使う調理器具</h2>
        <ol class="tool-list">
          @foreach($recipe->tools as $tool)
          <li>{{$tool->name}}</li>
          @endforeach
        </ol>

        <h2 class="content-title">材料</h2>
        <div class="ingredient-list">
          {!! nl2br($recipe->ingredients) !!}
        </div>    
      </div>
      <div class="image">
        <img src="/storage/{{ $recipe->image_name }}" width="600px" height="600px">
      </div>

    </div>
    <div class="process">
      @foreach($recipe->processes as $process)
      <div class="processrecipe">
        <div class="turn">{{$process->turn}}</div>
        <div class="processtitle">{{$process->process_title}}</div>
        <div class="processmake">{{$process->make}}</div>
        @if($process['image_name'] != null)
        <img src="/storage/{{ $process->image_name }}" width="200px" height="200px">
        @endif
      </div>
      @endforeach
    </div>
  </main>
</body>
</html>
@endsection
