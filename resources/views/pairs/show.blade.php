@extends('layouts.app')

@section('content')
	<br><a href="/pairs" class="btn btn-primary">Go back</a><br><br>
	<h1>{{$pair->key}}</h1>
	<h3>{{$pair->value}}</h3>
	<hr>

	@if(!Auth::guest())
	<a href="/pairs/{{$pair->id}}/edit" class="btn btn-primary">Edit</a>

	{!!Form::open(['action' => ['App\Http\Controllers\PairsController@destroy' , $pair->id], 'method' => 'POST', 'class' => 'float-right'])!!}
		{{Form::hidden('_method', 'DELETE')}}
		{{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
	{!!Form::close()!!}
	@endif
@endsection