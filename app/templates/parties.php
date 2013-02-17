<!DOCTYPE HTML>
<html>
	<head>
		<title>Parties</title>
		<link rel="stylesheet" type="text/css" href="/css/bootstrap.css" media="screen">
		<link rel="stylesheet" type="text/css" href="/css/bootstrap-responsive.css" media="screen">
		<link rel="stylesheet" type="text/css" href="/css/style.css" media="screen">
		<link rel="stylesheet" type="text/css" href="/css/doc.css" media="screen">
	</head>
	
	<body>
		<div class="navbar navbar-fixed-top prod">
			<div class="navbar-inner">
				<div class="container-fluid">
					<a class="brand" href="/home">Home</a>
					<a class="brand" href="/locations">Locations</a>
					<a class="brand" href="/parties">Parties</a>
				</div>
			</div>
		</div>
	<body>
		<ul>
			<?php if($locations != null):?>
				<?php foreach($parties as $party): ?>
					<li><a href="/parties/<?= $location->getId() ?>"><?= $party->getMessage() ?></a></li>
				<?php endforeach;?>
			<?php endif;?>
		</ul>
		
		<form action="/locations/" method="post">
			<input type="text" name="locationName" />
			<input type="submit" value="Add New" />
		</form>
	</body>
</html>
