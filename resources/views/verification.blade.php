@extends('dashboard_layout')
@section('content')
<div class="container">

	  <div class="d-flex flex-wrap p-3 w-100" style="background-color: #fff; margin-top: 20px;">
	     <div class="d-flex  w-100 ">
	     	
	     	<div>
	     		<h2><b>VERIFICATION PAGE</b></h2>
	     	</div>
		     
		     <div class="ml-auto">
		     	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
		     	  Create New Verification
		     	</button>
		     </div>
		 	
	     </div>
	  </div>
	  <div class="container p-3" style=" background-color: #fff; margin-top: 20px;">
	  		<table class="table myTable"  style="width:100%">
	  		  <thead>
	  		    <tr>
	  		      <th scope="col">#</th>
	  		      <th scope="col">Station</th>
	  		      <th scope="col">Station Branch</th>
	  		      <th scope="col">Verification Code</th>
	  		     
	  		    </tr>
	  		  </thead>
	  		  <tbody>
	  		    @foreach($_verification_data as $key => $verification_data)
	  		    <tr>
	  		      <td scope="row">{{$verification_data->register_verification_id}}</td>
	  		      <td>{{$verification_data->station_type}}</td>
	  		      <td>{{$verification_data->station_branch}}</td>
	  		      <td>{{$verification_data->verification_code}}</td>

	  		    </tr>
	  		    @endforeach
	  		  </tbody>
	  		</table>
	  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
  	<form action="/create_new_verification" method="post">

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalTitle">Create Verification</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
      	<div class="input-group mb-3">
      	  <div class="input-group-prepend">
      	    <label class="input-group-text" for="inputGroupSelect01">Station</label>
      	  </div>
      	  <select class="custom-select select-station" name="station" id="inputGroupSelect01" required>
      	    <option selected>Choose...</option>
      	    <option value="Fire">Fire Station</option>
      	    <option value="Hospital">Hospital</option>
      	    <option value="Police">Police</option>
      	    <option value="Rescue">Search and Rescue</option>
      	  </select>
      	</div>
		{{csrf_field()}}
      	<div class="input-group mb-3">
      	  <div class="input-group-prepend">
      	    <label class="input-group-text" for="inputGroupSelect01">Station Branch</label>
      	  </div>
      	  <select class="custom-select station_branch" name="station_branch" id="inputGroupSelect01" required>
      	    
      	  </select>
      	</div>

       <div class="input-group mb-3">
         <div class="input-group-prepend">
           <span class="input-group-text" id="inputGroup-sizing-default">Verification Code</span>
         </div>
         <input type="text" class="form-control" name="verification_code" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="{{$verification_code}}" required>
       </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Create</button>
      </div>
    </div>
    </form>
  </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
	$(document).ready(function() {
		
		$(document).ready( function () {
		    $('.myTable').DataTable();
		    
		});

		$('.select-station').on('change',function()
		{
			change_station($(this).val());
		})

		
	});

	function change_station(station)
	{
		$('.station_branch').html('');
		    if(station == "Fire")
		    {
		        str_option = '<option selected>Choose...</option><option value="Malolos City Fire Station">Malolos City Fire Statione</option><option value="Bulacan Fire Station">Bulacan Fire Station</option><option value="Panasahan Fire Sub-Station">Panasahan Fire Sub-Station</option>';
		    }
		        
		    if(station == "Hospital")
		    {
		        str_option = '<option selected>Choose...</option><option value="Santissima Trinidad Hospital">Santissima Trinidad Hospital</option><option value="Sacred Heart Hospital-Bulacan">Sacred Heart Hospital-Bulacan</option><option value="Malolos Maternity Hospital">Malolos Maternity Hospital</option><option value="Santos General Hospital">Santos General Hospital</option><option value="Mary Immaculate Maternity Hospital">Mary Immaculate Maternity Hospital</option>';
		    }
		        
		    if(station == "Police")
		    {
		        str_option = '<option selected>Choose...</option><option value="Malolos City Police Station">Malolos City Police Station</option><option value="Headquarters Bulacan Police Provincial Office">Headquarters Bulacan Police Provincial Office</option>';
		    }
		        
		    if(station == "Rescue")
		    {
		        str_option = '<option selected>Choose...</option><option value="PDRRMC Station">PDRRMC Station</option>';
		    }
		        
		
		$('.station_branch').append(str_option);
	}

</script>
@endsection
