@extends('layouts.app')

@section('content')
	<h1>Pairs</h1>
	
	@if(count($pairs) > 0)
		@foreach($pairs as $pair)
			<div class="card">
				<h3> <a href="/pairs/{{$pair->id}}">{{$pair->key}}</a></h3>
				<h4>{{$pair->value}}</h4>
			</div>
			<br>
		@endforeach
	@else
		<p>No pairs found</p>
	@endif
@endsection