@extends('layouts.dashboard')
@section('content')
    @foreach ($restaurants as $restaurant)
    {{$restaurant->name }}
    @endforeach
@endsection
