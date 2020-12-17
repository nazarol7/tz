@extends('layouts.app')

@section('content')
	<br>
	<h1>Create pair</h1>
	{!! Form::open(['action' => 'App\Http\Controllers\PairsController@store', 'method' => 'POST']) !!}
	<div class="form-group">
		{{Form::label('key', 'Key')}}
		{{Form::text('key', '', ['class' => 'form-control', 'placeholder' => 'Key'])}}
	</div>
		<div class="form-group">
		{{Form::label('value', 'Value')}}
		{{Form::text('value', '', ['class' => 'form-control', 'placeholder' => 'Value'])}}
	</div>
	{{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
	{!! Form::close() !!}
@endsection