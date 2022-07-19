@extends('layouts.masterhome')

<!----hero ------->

@section('hero')
	@include('home.hero')
@endsection

<!---hero end---->
@section('categories')
	@include('home.categories')
@endsection

@section('featured')
    @include('home.featured')   
@endsection

@section('banner')
	@include('home.banner')
@endsection

@section('latestproduct')
 	@include('home.latestproduct')
@endsection

@section('blog')
 	@include('home.blog')
@endsection