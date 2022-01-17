@extends('layouts.app')

@section('content')

<div class="container">
  <div class="title">
    <h1>レシピの名前</h1>
    <div>{{$recipe->title}}</div>
  </div>
  <div class="tool">
    <h1>使う調理器具</h1>
    <div>{{$recipe->tool_id}}</div>
  </div>
  <div class="ingredients">
    <h1>材料</h1>
    <div>{{$recipe->ingredients}}</div>
  </div>



<img src="/storage/{{ $recipe->image_name }}" width="200px" height="200px">
</div>
@endsection