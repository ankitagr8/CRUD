<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <div class="container">
  	<div class="row">
  		<div class="col-xl-4">
  			<form method="post" id="my">
  				@csrf
          <input type="hidden" name="id" value="{{$data->id}}">
  				<div class="form-group">
  					<label>Name</label>
  					<input type="text" name="name" class="form-control" value="{{$data->name}}">
  				</div>
  				<div class="form-group">
  					<label>Email</label>
  					<input type="text" name="email" class="form-control" value="{{$data->email}}">
  				</div>
          <div class="form-group">
            <label>Gender</label>
            <input type="radio" name="gender" value="male" {{$data->gender=='male' ? 'checked' : ''}}>Male
            <input type="radio" name="gender" value="female" {{$data->gender=='female' ? 'checked' : ''}}>Female
          </div>
          @php
          $qual=explode(",",$data->qualification);
          @endphp
  				
  				<div class="form-group">
  					<label>Qualification</label>
  					<input type="checkbox" name="qualification[]" value="10th" {{in_array("10th",$qual) ? 'checked' : ''}}>10th
  					<input type="checkbox" name="qualification[]" value="12th" {{in_array("12th",$qual) ? 'checked' : ''}}>12th
  					<input type="checkbox" name="qualification[]" value="bca" {{in_array("bca",$qual)} ? 'checked' : ''}>BCA
  				</div>
  				
  				<input type="submit" name="update" value="update" class="btn btn-info">
  			</form>
  		</div>
  	</div>
  </div>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script>
  	$("#my").submit(function(e){
  		e.preventDefault();
  		//alert('data');

  		$.ajax({
  			url:'/updatedata',
  			type:'POST',
  			data:new FormData(this),
  			contentType:false,
  			processData:false,
  			success:function(data)
  			{
  				alert(data);
  			}
  		});
  	});
  </script>
</body>
</html>