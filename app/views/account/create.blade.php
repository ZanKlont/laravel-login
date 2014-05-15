@extends('layout.main')

@section('content')
	{{ Form::open(array('route' => 'account-create-post', 'class' => 'form-horizontal')) }}
		<div class="form-group">
			{{ Form::label('email', 'Email: ', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-7">
				{{ Form::email('email', null, array('class' => 'form-control custom-input')) }}
				@if($errors->has('email'))
					<span class="text-danger">{{ $errors->first('email') }}</span>
				@endif
			</div>
		</div>

		<div class="form-group">
			{{ Form::label('username', 'Username: ', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-10">
				{{ Form::text('username', null, array('class' => 'form-control custom-input')) }}
				@if($errors->has('username'))
					<span class="text-danger">{{ $errors->first('username') }}</span>
				@endif
			</div>
		</div>

		<div class="form-group">
			{{ Form::label('password', 'Password: ', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-10">
				{{ Form::password('password', array('class' => 'form-control custom-input')) }}
				@if($errors->has('password'))
					<span class="text-danger">{{ $errors->first('password') }}</span>
				@endif
			</div>
		</div>

		<div class="form-group">
			{{ Form::label('password_again', 'Confirm Password: ', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-10">
				{{ Form::password('password_again', array('class' => 'form-control custom-input')) }}
				@if($errors->has('password_again'))
					<span class="text-danger">{{ $errors->first('password_again') }}</span>	
				@endif
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				{{ Form::submit('Create Account', array('class' => 'btn btn-default')) }}
			</div>
		</div>
	{{ Form::close() }}
@stop