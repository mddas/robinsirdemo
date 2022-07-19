@extends('layouts.master')

@section('home_content')
<div class="home_content">
	<div class="text">Dashboard</div>
	<div>{{ Auth::user()->name }}</div>
	<form method="POST" action="{{ route('logout') }}">
		@csrf

		<x-dropdown-link :href="route('logout')"
		onclick="event.preventDefault();
		this.closest('form').submit();">
		{{ __('Log Out') }}
	</x-dropdown-link>
</form>

@endsection




