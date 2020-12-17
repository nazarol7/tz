@extends('layouts.app')

@section('content')
	<br>
	<h1>Edit pair</h1>
	{!! Form::open(['action' => ['App\Http\Controllers\PairsController@update', $pair->id], 'method' => 'POST']) !!}
	<div class="form-group">
		{{Form::label('key', 'Key')}}
		{{Form::text('key', $pair->key, ['class' => 'form-control', 'placeholder' => 'Key'])}}
	</div>
		<div class="form-group">
		{{Form::label('value', 'Value')}}
		{{Form::text('value', $pair->value, ['class' => 'form-control', 'placeholder' => 'Value'])}}
	</div>
	{{Form::hidden('_method', 'PUT')}}
	{{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
	{!! Form::close() !!}
@endsection