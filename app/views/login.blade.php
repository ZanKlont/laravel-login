@extends('layout.main')

@section('content') <h1>TEST</h1>
	{{ Form::open(array('class' => 'form-horizontal')) }}
		{{ Form::label('username', 'Username: ') }}
		{{ Form::text('username', null, array('placeholder' => 'Username')) }}

		{{ Form::label('password', 'Username: ') }}
		{{ Form::password('password', array('placeholder' => 'Password')) }}

		{{ Form::label('remember', 'Remember me.') }}
		{{ Form::checkbox('remember') }}
	
		{{ Form::submit('Log In') }}
	{{ Form::close() }}
@stop