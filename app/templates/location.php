<!DOCTYPE HTML>
<html>
	<head>
		<title>A location</title>
	</head>
	<body>
		<?= $location[1] ?>
		
		<form action="/location/" method="post">
			<input type="hidden" name="locationId" value="<?= $location[0] ?>"/>
			<input type="text" name="locationName" value="<?= $location[1] ?>"/>
			<input type="submit" value="Update it" />
		</form>
		
		<a href="/locations/">Back</a>
	</body>
</html>
