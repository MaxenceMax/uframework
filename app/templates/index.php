<!DOCTYPE HTML>
<html>
	<head>
		<title>Home</title>
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
		<div class="container-fluid">
			<h2 class="mbl">Welcome !</h2>
			<div class="mod dash">
				<div class="inner">
					<div class="hd">
						<h3 class="plm">Last locations</h3>
					</div>
					<div class="bd">
						<div class="table mtm">
							<table class="table table-bordered table-striped mbn">
								<tr>
									<th>Name</th>
									<th>Address</th>
								</tr>
								<? if(!is_null($locations)):?>
									<?php foreach($locations as $loc) : ?>
									<tr>
										<td><a href="/locations/<?=$loc->getId() ?>"><?=$loc->getName() ?></a></td>
										<td><?=$loc->getAdresse(); ?></td>
									</tr>
									<?php endforeach?>
								<? endif;?>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="mod dash">
				<div class="inner">
					<div class="hd">
						<h3 class="plm">Next Parties</h3>
					</div>
					<div class="bd">
						<div class="table mtm">
							<table class="table table-bordered table-striped mbn">
								<tr>
									<th>Date</th>
									<th>Messages</th>
								</tr>
								<?php if(!is_null($parties)):?>
									<?php foreach($parties as $party) : ?>
										<td><a href="/parties/<?=$party->getId() ?>"><?=$party->getMessage() ?></a></td>
										<td><?= date("D j M G:i Y", strtotime($party->getCreatedAt())); ?></td>
									<?php endforeach?>
								<?php endif;?>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
