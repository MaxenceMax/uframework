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
									<th>Message</th>
									<th>Date</th>
								</tr>
								
								<?php if($parties != null):?>
									<?php foreach($parties as $party): ?>
									<tr>
										<td><a href="/party/<?= $party->getId() ?>"><?= $party->getMessag() ?></a></td>
										<td><?= $party->getPartyTime()?></td>
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
					<a href="/party/new" class="btn btn-success"><i class="icon-plus icon-white"></i>New</a>
				</div>
			</div>
		</div>
	</body>
</html>
