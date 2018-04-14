@extends('dashboard_layout')
@section('content')
<div class="container">
	  <div class="d-flex flex-wrap flex-column p-3 w-100" style="background-color: #fff; margin-top: 20px;">
	     <div class="d-flex flex-column w-100">
	     	<div class="w-100" style="text-align: center;">
		     <h2><b>Reports</b></h2>
		     
		 	</div>
	     </div>
	  </div>
	  <div class="ontainer p-3" style=" background-color: #fff; margin-top: 20px;">
	  		<table class="table myTable"  style="width:100%">
	  		  <thead>
	  		    <tr>
	  		      <th scope="col">#</th>
	  		      <th scope="col">Date Requested</th>
	  		      <th scope="col">office Branch</th>
	  		      <th scope="col">Emergency Category</th>
	  		      <th scope="col">Full Name</th>
	  		      <th scope="col">Contact #</th>
	  		      <th scope="col">Status</th>
	  		    </tr>
	  		  </thead>
	  		  <tbody>
	  		    @foreach($_request as $key => $request)
	  		    <tr>
	  		      <td scope="row">{{$request->request_id}}</td>
	  		      <td>{{$request->date_requested}}</td>
	  		      <td>{{$request->office_branch}}</td>
	  		      <td>{{$request->emergency_category}}</td>
				  <td>{{$request->first_name}} {{$request->last_name}}</td>
				  <td>{{$request->contact_number}}</td>
				  <td>{{$request->status}}</td>
	  		    </tr>
	  		    @endforeach
	  		  </tbody>
	  		</table>
	  </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
	$(document).ready(function() {
		
		$(document).ready( function () {
		    $('.myTable').DataTable();
		    
		});
		
	});
</script>
@endsection