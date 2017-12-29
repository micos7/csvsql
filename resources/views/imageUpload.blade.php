<html>
<head>
	<title>CSV to SQL</title>
	<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="content">
			<h1>File Upload</h1>
			<form action="{{ URL::to('upload') }}" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label>Select image to upload:</label>
					<input type="hidden" value="{{ csrf_token() }}" name="_token">
					<input type="file" name="csvfile" id="file">
				</div>
				@if ($errors->has('image'))
	            	<span class="help-block">
	                	<strong>{{ $errors->first('image') }}</strong>
	            	</span>
	        	@endif
				<input type="submit" value="Upload" class="btn btn-default" name="submit">
			</form>
		</div>
	</div>
</body>
</html>