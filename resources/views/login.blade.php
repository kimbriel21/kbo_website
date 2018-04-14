@extends('layout')

<link rel="stylesheet" type="text/css" href="/assets/css/login_style.css">


@section('content')
<div class="d-flex flex-column align-items-center justify-content-center" style="background-color: #4F535C; height: 100vh;">

	<div class="login-form card" >
		<!-- <div class="d-flex pb-3 align-items-center justify-content-center">
			<img src="/assets/imgs/logo.png" width="100">
		</div> -->
		
		<h4 class="text-center">Login Form</h3>
		<h5 class="text-center" style="color: #8892AD;">Fill out form below to login</h4>
		<div class="form-group">
			<form method="post" action="/login">
				{{csrf_field()}}
				@if (session()->has("success"))
				  <div class="alert alert-success">
				    <label>{{session("success")}}</label>
				  </div>
		      	@endif
		      	@if (session()->has("error"))
				  <div class="alert alert-danger">
				    <label>{{session("error")}}</label>
				  </div>
		      	@endif
				<div class="form-box" style="border-radius: 5px;border: 2px solid #AAABAD; margin-top: 20px;">
					<input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" style="border-radius: 0; -webkit-appearance: none;" required>
					<input name="password" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Password" style="border-radius: 0; -webkit-appearance: none;" required>
				</div>
				<button type="submit" class="btn btn-success" style="width: 100%; margin-top: 10px;">Log In</button>
			</form>
		</div>
		<p>dont have account? <a href="/register">Sign Up Here</a></p>
		
	</div>
</div>
@endsection