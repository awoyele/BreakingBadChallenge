
@extends("layouts.index")

@section("content")
    <Home :characters="{{$characters}}" :seasons="{!!collect($seasons)!!}"></Home>

@endsection

@section("scripts")

@endsection