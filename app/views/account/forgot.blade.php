@extends('layout.main')

@section('content')
	{{ Form::open(array('class' => 'form-horizontal')) }}
	
		<div class="form-group">
			{{ Form::label('email', 'Your email: ', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-10">
				{{ Form::email('email', null, array('class' => 'form-control custom-input')) }}
				@if($errors->has('email'))
					<span class="text-danger">{{ $errors->first('email') }}</span>		
				@endif
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				{{ Form::submit('Send new', array('class' => 'btn btn-default')) }}
			</div>
		</div>
		
	{{ Form::close() }}
@stop
