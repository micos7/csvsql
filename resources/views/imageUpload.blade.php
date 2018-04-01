<html>
<head>
	<title>CSV to SQL</title>
	<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row">
		<div class="col-md-6 offset-md-2">
			<div class="content card">
				<h1 class="text-center">File Upload</h1>
			<form action="{{ URL::to('upload') }}" method="post" enctype="multipart/form-data">
				<div class="form-group">
						<label>Select csv file to upload:</label>
					<input type="hidden" value="{{ csrf_token() }}" name="_token">
					<input type="file" name="csvfile" id="file">
				</div>
				<div class="form-group">
					<label>First row contains the column names</label>
					<input type="checkbox" id="columnnames" name="columnnames">
				</div>
				@if ($errors->has('image'))
	            	<span class="help-block">
	                	<strong>{{ $errors->first('image') }}</strong>
	            	</span>
	        	@endif
				@if (!empty($keys) AND $columnnames ) 

					<div class="form-group">
					@foreach ($keys as $key)
					<label>{{ $key}}</label>
					<input type="checkbox" id="{{ $key}}" name="interest" value="{{ $key }}">

					@endforeach
					</div>
				@endif
				<input type="submit" value="Upload" class="btn btn-default" name="submit">
			</form>
		</div>
	</div>
		</div>
	</div>
</body>
</html>