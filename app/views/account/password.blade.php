@extends('layout.main')

@section('content')
	{{ Form::open(array('route' => 'account-change-password-post', 'class' => 'form-horizontal')) }}
		
		<div class="form-group">
			{{ Form::label('old_password', 'Old password', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-10">
				{{ Form::password('old_password', array('class' => 'form-control custom-input')) }}
				@if($errors->has('old_password'))
					<span class="text-danger">{{ $errors->first('old_password') }}</span>
				@endif			
			</div>
		</div>

		<div class="form-group">
			{{ Form::label('password', 'New password', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-10">
				{{ Form::password('password', array('class' => 'form-control custom-input')) }}
				@if($errors->has('password'))
					<span class="text-danger">{{ $errors->first('password') }}</span>		
				@endif			
			</div>
		</div>

		<div class="form-group">
			{{ Form::label('password_again', 'Confirm', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-10">
				{{ Form::password('password_again', array('class' => 'form-control custom-input')) }}
				@if($errors->has('password_again'))
					<span class="text-danger">{{ $errors->first('password_again') }}</span>
				@endif
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				{{ Form::submit('Change', array('class' => 'btn btn-default')) }}
			</div>
		</div>
	{{ Form::close() }}
@stop