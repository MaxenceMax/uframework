<!DOCTYPE HTML>
<html>
	<head>
		<title>Location</title>
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
		<h2 class="mbl">Location : <?= $location->getName() ?></h2>
		<center>
			<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.fr/maps?f=q&amp;source=s_q&amp;hl=fr&amp;geocode=&amp;q=<?= $location->getName()."+".$location->getAdresse()?>&amp;aq=&amp;sll=45.771834,3.18671&amp;ie=UTF8&amp;hq=&amp;hnear=<?= $location->getName()."+".$location->getAdresse()?>.&amp;t=m&amp;z=14&amp;output=embed"></iframe>
			<br />
			<small>
				<a href="http://maps.google.fr/maps?f=q&amp;source=embed&amp;hl=fr&amp;geocode=&amp;q=<?= $location->getName()."+".$location->getAdresse()?>&amp;aq=&amp;ie=UTF8&amp;hq=&amp;hnear=<?= $location->getName()."+".$location->getAdresse()?>&amp;t=m&amp;z=14" style="color:#0000FF;text-align:left">Agrandir le plan</a>
			</small>
		</center>
			<div class="mod dash">
				<div class="inner">
					<div class="hd">
						<h3 class="plm">Informations :</h3>
					</div>
					<div class="bd">
						<div class="table mtm">
							<table class="table table-bordered table-striped mbn">
								<tr>
									<th>Adress :</th>
									<td><?= $location->getAdresse()?></td>
								</tr>
								<tr>
									<th>Phone :</th>
									<td><?= $location->getPhone()?></td>
								</tr>
								<tr>
									<th>Presentation :</th>
									<td><?= $location->getPresentation()?></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="form-actions">
				<a href="/locations" class="btn mlm"><i class="icon-list-alt"></i> Back to list</a>
			</div>
			<div class="mod dash">
				<div class="inner">
					<div class="hd">
						<h3 class="plm">Comments :</h3>
					</div>
					<div class="bd">
						<div class="table mtm">
							<table class="table table-bordered table-striped mbn">
								<tr>
									<th>Username</th>
									<th>Comments</th>
								</tr>
								<?php if(count($location->getComments()) > 0):?>
									<?php foreach ($location->getComments() as $comment) :?>
										<tr>
											<td><?= $comment->getUsername()." (".$comment->getCreatedAt()->format("D j M G:i Y").")"?></td>
											<td><?= $comment->getBody()?></td>
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
					<a href="/comments/new?location_id=<?= $location->getId()?>" class="btn btn-success"><i class="icon-plus icon-white"></i>New</a>
				</div>
			</div>
		</div>
			
		<?php if($location->getComments() != null):?>
		<table>

		<?php endif;?>
	</body>
</html>
