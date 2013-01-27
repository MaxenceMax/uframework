<!DOCTYPE HTML>
<html>
	<head>
		<title>A location</title>
	</head>
	<body>
		<?= $location[1] ?>		
		<form action="/locations/<?= $location[0] ?>" method="POST">
		    <input type="hidden" name="_method" value="PUT">
		    <input type="text" name="name" value="<?= $location[1] ?>">
		    <input type="submit" value="Update">
		</form>
		
		<a href="/locations/">Back</a>
		<a href="/locations/delete/<?= $location[0]?>">delete</a>
	</body>
</html>
