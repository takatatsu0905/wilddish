<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>レシピ編集画面</title>
  @extends('layouts.app')
  <link rel="stylesheet" href="{{ asset('css/form.css') }}">
  <script src="{{ mix('js/form.js') }}"></script>
  @section('content')
</head>
<body>
  <form action="{{ route('update', ['recipeid' =>$recipe->id])}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
          {{ csrf_field() }}
      <div class="container">
        <div class="title">
          <h1>レシピの名前</h1>
          <input type="text" name="title" value="{{$recipe->title}}">
        </div>
        <div class="tool">
          <h1>使う調理器具</h1>
          <p>
            @foreach($toolList as $tool)
            <label>
                <input type="checkbox" name="tools[]" value="{{ $tool->id }}"> 
                {{ $tool->name }}
            </label>
            @endforeach
          </p>
        </div>
        <div class="ingredients">
          <h1>材料</h1>
          <textarea name="ingredients" id="" cols="30" rows="10">{!! nl2br($recipe->ingredients) !!}</textarea>
        </div>
        <div class="image_name">
          <h1>レシピ画像</h1>
          <img src="/storage/{{ $recipe->image_name }}" width="200px" height="200px" class="image_name">
          <input type="file" name="image_name">
        </div>
        <div class="process">
          <div class="process1">
            <input type="number" value="1" min="1" max="1" name="turn1"><br>
            <input type="text" name="process_title1" value="工程タイトル"><br>
            <input type="file" name="process_image1"><br>
            <textarea name="process_make1" id="" cols="30" rows="10"></textarea>
          </div>
          <div class="process02">
            <div class="process2" id="process2">
              <input type="number" value="2" min="2" max="2" name="turn2"><br>
              <input type="text" name="process_title2"><br>
              <input type="file" name="process_image2"><br>
              <textarea name="process_make2" id="" cols="30" rows="10"></textarea><br>
            </div>
            <input type="button" value="表示" onclick="document.getElementById('process2').style.display = 'block';">
            <input type="button" value="非表示" onclick="document.getElementById('process2').style.display = 'none';">  
          </div>
          <div class="process03">
            <div class="process3" id="process3">
              <input type="number" value="3" min="3" max="3" name="turn3"><br>
              <input type="text" name="process_title3"><br>
              <input type="file" name="process_image3"><br>
              <textarea name="process_make3" id="" cols="30" rows="10"></textarea><br>
            </div>
            <input type="button" value="表示" onclick="document.getElementById('process3').style.display = 'block';">
            <input type="button" value="非表示" onclick="document.getElementById('process3').style.display = 'none';">  
          </div>
          <div class="process04">
            <div class="process4" id="process4">
              <input type="number" value="4" min="4" max="4" name="turn4"><br>
              <input type="text" name="process_title4"><br>
              <input type="file" name="process_image4"><br>
              <textarea name="process_make4" id="" cols="30" rows="10"></textarea><br>
            </div>
            <input type="button" value="表示" onclick="document.getElementById('process4').style.display = 'block';">
            <input type="button" value="非表示" onclick="document.getElementById('process4').style.display = 'none';">  
          </div>
          <div class="process05">
            <div class="process5" id="process5">
              <input type="number" value="5" min="5" max="5" name="turn5"><br>
              <input type="text" name="process_title5"><br>
              <input type="file" name="process_image5"><br>
              <textarea name="process_make5" id="" cols="30" rows="10"></textarea><br>
            </div>
            <input type="button" value="表示" onclick="document.getElementById('process5').style.display = 'block';">
            <input type="button" value="非表示" onclick="document.getElementById('process5').style.display = 'none';">  
          </div>
        </div>
        <button type="submit">編集</button>
      </div>
  </form>
</body>
</html>
@endsection