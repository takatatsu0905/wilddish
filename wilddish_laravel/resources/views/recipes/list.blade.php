@extends('layouts.app')

@section('content')

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
