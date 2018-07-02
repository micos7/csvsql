<html>
<head>
	<title>CSV to SQL</title>
	<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row">
		<div class="col-md-12 col-lg-12 col-sm-12">
			<div class="content card">
				<h1 class="text-center">File Upload</h1>
			<form action="{{ URL::to('upload') }}" method="post" enctype="multipart/form-data">
				<div class="form-group">
						<label for="csvfile">Select csv file to upload:</label>
					<input type="hidden" value="{{ csrf_token() }}" name="_token">
						<input class="form-control" type="file" name="csvfile" id="csvfile">
				</div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" id="columnnames" name="columnnames">
						<label  for="columnnames">First row contains the column names</label>
				</div>
				@if ($errors->has('image'))
	            	<span class="help-block">
	                	<strong>{{ $errors->first('image') }}</strong>
	            	</span>
	        	@endif
				@if (!empty($keys) AND $columnnames ) 

						<div class="form-check">
					@foreach ($keys as $key)
						
						<input class="form-check-input" type="checkbox" id="{{ $key}}" name="interest" value="{{ $key }}">
					<label>{{ $key}}</label>
					@endforeach
					</div>
				@endif
					<textarea class="form-control" name="" id="csvTextArea" rows="10"></textarea>
					<div class="form-group">
						<input  type="submit" value="Upload" class="btn btn-default" name="submit">
					</div>
			</form>
		</div>
	</div>
		</div>
	</div>
</body>
</html>
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/4.5.0/papaparse.min.js"></script>
<script>
	var response = [];
	 $(function() {
     $("#csvfile").change(function (){

	   var fileName = document.getElementById('csvfile').files[0];
	   
	    Papa.parse(fileName, {
			header: true,
			dynamicTyping: true,
			complete: function(results) {
				//console.log("Finished:", results.data);
				response = results.data;
				console.log(response)
				for(var i = 0;i< response.length;i++){
					response[i] = JSON.stringify(response[i])
				}
				$("#csvTextArea").val(response)
			}
		});
		console.log(response)
		// $("#csvTextArea").val(hh.join("\n"))
  
     });
  });
    



</script>