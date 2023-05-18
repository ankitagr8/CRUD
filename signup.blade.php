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
  			<form method="post" id="my" enctype="multipart/form-data">
  				@csrf
  				<div class="form-group">
  					<label>Name</label>
  					<input type="text" name="name" class="form-control">
  					<span class="name_err"></span>
  				</div>
  				<div class="form-group">
  					<label>Email</label>
  					<input type="text" name="email" class="form-control">
  					<span class="email_err"></span>
  				</div>
  				<div class="form-group">
  					<label>Gender</label>
  					<input type="radio" name="gender" value="male">Male
  					<input type="radio" name="gender" value="female">Female
  					<span class="gender_err"></span>
  				</div>
  				<div class="form-group">
  					<label>Qualification</label>
  					<input type="checkbox" name="qualification[]" value="10th">10th
  					<input type="checkbox" name="qualification[]" value="12th">12th
  					<input type="checkbox" name="qualification[]" value="bca">BCA
  				</div>
  				<div class="form-group">
  					<label>Image</label>
  					<input type="file" name="pic" class="form-control">
  				</div>
  				<input type="submit" name="save" value="save" class="btn btn-info">
  			</form>
  		</div>
  	</div>
  </div>
  <table class="table">
  	<tr>
  		<td>Name</td>
  		<td>Email</td>
  		<td>Gender</td>
  		<td>Qualification</td>
  		<td>Image</td>
  		<td>Edit</td>
  	</tr>
  	@foreach($data as $list)
    <tr>
    	<td>{{$list->name}}</td>
    	<td>{{$list->email}}</td>
    	<td>{{$list->name}}</td>
    	<td>{{$list->qualification}}</td>
    	<td><img src="{{asset('/image/'.$list->pic)}}" style="width:80px;"></td>
    	<td><a href="editdata/{{$list->id}}">edit</a></td>
    </tr>
  	@endforeach
  </table>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script>
  	$("#my").submit(function(e){
  		e.preventDefault();
  		//alert('data');

  		$.ajax({
  			url:'savedata',
  			type:'POST',
  			data:new FormData(this),
  			contentType:false,
  			processData:false,
  			success:function(data)
  			{

  				if(data.status=='0'){
  					
  					$.each(data.error,function(key,value){
  						$("."+key+"_err").text(value[0]);
  					});
  				}

  			}
  		});
  	});
  </script>
</body>
</html>