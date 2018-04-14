@extends('layout')
@section('content')
<div class="d-flex align-items-center justify-content-center" style="background-color: #4F535C; height: 100vh;">
	<div class="login-form card" style="min-width: 350px; min-height: 305px; background-color: #fff; padding: 20px;">

		<h4 class="text-center">Register Form</h3>
		<h5 class="text-center" style="color: #8892AD;">Fill out form below to register</h4>
		@if (count($errors) > 0)
		  <div class="alert alert-danger">
		      <ul>
		          @foreach ($errors as $error)
		              <li>{{ $error }}</li>
		          @endforeach
		      </ul>
		  </div>
		@endif
		<div class="form-group">
			<form method="post" action="/register">
				<div class="form-box" style="border-radius: 5px;border: 2px solid #AAABAD; margin-top: 20px;">

					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<input name="full_name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Full Name" style="border-radius: 0; -webkit-appearance: none;" required>
					<input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" style="border-radius: 0; -webkit-appearance: none;" required>
					<!-- <input name="contact_number" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="contact number" style="border-radius: 0; -webkit-appearance: none;" required> -->
					<input name="password" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Password" style="border-radius: 0; -webkit-appearance: none;" required>
					<input name="confirm_password" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Confirm Password" style="border-radius: 0; -webkit-appearance: none;" required>
				</div>
				<button type="submit" class="btn btn-success" style="width: 100%; margin-top: 10px;">Register</button>
			</form>
		</div>
		<p><a href="/login"><- Go back to login page</a></p>
		
	</div>
</div>
@endsection