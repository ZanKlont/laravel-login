@extends('layout.main')

@section('content')
	{{ Form::open(array('route' => 'account-sign-in-post', 'class' => 'form-horizontal')) }}
		<div class="form-group">
			{{ Form::label('email', 'Email: ', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-10">
				{{ Form::email('email', null, array('class' => 'form-control custom-input')) }}
				@if($errors->has('email'))
					<span class="text-danger">{{ $errors->first('email') }}</span>
				@endif			
			</div>
		</div>

		<div class="form-group">
			{{ Form::label('password', 'Password: ', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-10">
				{{ Form::password('password', array('class' => 'remember form-control custom-input')) }}
				@if($errors->has('password'))
					<span class="text-danger">{{ $errors->first('password') }}</span>
				@endif			
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
  				<div class="checkbox">
  					<label for="remember">
  						<input type="checkbox" name="remember" id="remember"> Remember me.
  					</label>
  				</div>
  			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				{{ Form::submit('Sign in', array('class' => 'btn btn-default')) }}
			</div>
		</div>
	{{ Form::close() }}
@stop