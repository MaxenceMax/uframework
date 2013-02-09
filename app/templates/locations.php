<!DOCTYPE HTML>
<html>
	<head>
		<title>Locations list</title>
	</head>
	<body>
		<ul>
			<?php if($locations != null):?>
				<?php foreach($locations as $location): ?>
					<li><a href="/locations/<?= $location->getId() ?>"><?= $location->getName() ?></a></li>
				<?php endforeach;?>
			<?php endif;?>
		</ul>
		
		<form action="/locations/" method="post">
			<input type="text" name="locationName" />
			<input type="submit" value="Add New" />
		</form>
	</body>
</html>
