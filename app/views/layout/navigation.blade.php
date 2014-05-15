<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		    </button>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li><a href="{{ URL::route('home') }}">Home</a></li>
				@if(Auth::check())
					<li><a href="{{ URL::route('account-sign-out') }}">Sign out</a></li>
					<li><a href="{{ URL::route('account-change-password') }}">Change password</a></li>
				@else
					<li><a href="{{ URL::route('account-sign-in') }}">Sign in</a></li>
					<li><a href="{{ URL::route('account-create') }}">Register</a></li>
					<li><a href="{{ URL::route('account-forgot-password') }}">Forgot password</a></li>
				@endif	
			</ul>
		</div>
	</div>
</nav>