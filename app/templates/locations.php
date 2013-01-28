<!DOCTYPE HTML>
<html>
	<head>
		<title>Locations list</title>
	</head>
	<body>
		<ul>
			<?php foreach($location as $id => $location): ?>
				<li><a href="/locations/<?= $id ?>"><?= $location ?></a></li>
			<?php endforeach;?>
		</ul>
		
		<form action="/locations/" method="post">
			<input type="text" name="locationName" />
			<input type="submit" value="Add New" />
		</form>
	</body>
</html>
