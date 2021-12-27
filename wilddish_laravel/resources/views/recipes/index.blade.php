@extends('layouts.app')

@section('content')

@foreach($recipes as $recipe)

<img src="{{ Storage::url($recipe->recipe) }}">

@endforeach
@endsection