@extends("layouts.index")

@section("content")
<Profile :character="{{$character}}"></Profile>
@endsection