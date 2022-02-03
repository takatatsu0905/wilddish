@extends('layouts.app')

@section('content')
<form action="{{ route('recipe') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
        {{ csrf_field() }}
    <div class="container">
      <div class="title">
        <h1>レシピの名前</h1>
        <input type="text" name="title">
      </div>
      <div class="tool">
        <h1>使う調理器具</h1>
        <p>
          @foreach($tools as $tool)
          <label>
              <input type="checkbox" name="tools" value="{{ $tool->id }}">{{ $tool->name }}
          </label>
          @endforeach
        </p>
      </div>
      <div class="ingredients">
        <h1>材料</h1>
        <textarea name="ingredients" id="" cols="30" rows="10"></textarea>
      </div>
      <div class="image_name">
        <h1>レシピ画像</h1>
        <input type="file" name="image_name">
      </div>
      <button type="submit">登録</button>
    </div>
</form>

@endsection
