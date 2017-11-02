@extends('layout');
@section('title', 'Home')

@section('content')
    <div style="height:300px;">
        <h2>This is section</h2>
        <a href="{{route('product')}}">Products</a>
    </div>
@endsection