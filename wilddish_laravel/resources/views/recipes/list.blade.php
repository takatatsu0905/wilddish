@extends('layouts.app')

@section('content')

@foreach($recipes as $recipe)

  <div class="image_name">
    <img src="/storage/{{ $recipe->image_name }}" width="200px" height="200px">
  </div>
  <div class="title">
    {{$recipe->title}}
  </div>
  <div class="tool_id">
    {{$recipe->tool_id}}
  </div>
  <div class="ingredients">
    {{$recipe->ingredients}}
  </div>

@endforeach

@endsection
