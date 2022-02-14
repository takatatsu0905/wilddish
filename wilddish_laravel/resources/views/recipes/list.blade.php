@extends('layouts.app')

@section('content')

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
