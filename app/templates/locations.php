<!DOCTYPE HTML>
<html>
	<head>
		<title>Locations</title>
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
		<div class="container-fluid">
			<div class="mod dash">
				<div class="inner">
					<div class="hd">
						<h3 class="plm">Locations</h3>
					</div>
					<div class="bd">
						<div class="table mtm">
							<table class="table table-bordered table-striped mbn">
								<tr>
									<th>Name</th>
									<th>Address</th>
									<th>Phone</th>
									<th>Presentation</th>
								</tr>
								
								<?php if($locations != null):?>
									<?php foreach($locations as $location): ?>
									<tr>
										<td><a href="/locations/<?= $location->getId() ?>"><?= $location->getName() ?></a></td>
										<td><?= $location->getAdresse()?></td>
										<td><?= $location->getPhone()?></td>
										<td><?= $location->getPresentation()?></td>
									</tr>
									<?php endforeach;?>
								<?php endif;?>
								
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="form-actions">
				<div class="fRight">
					<a href="/locations/new" class="btn btn-success"><i class="icon-plus icon-white"></i>New</a>
				</div>
			</div>
		</div>
	</body>
</html>
