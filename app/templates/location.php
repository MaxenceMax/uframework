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
		

		<form action="/locations/<?= $location[0] ?>" method="POST">
		    <input type="hidden" name="_method" value="DELETE">
		    <input type="submit" value="Delete">
		</form>
		<a href="/locations/">Back</a>
	</body>
</html>
