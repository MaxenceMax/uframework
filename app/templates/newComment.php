<!DOCTYPE HTML>
<html>
	<head>
		<title>New Locations</title>
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
			<h2 class="mbl">New Location</h2>
			<div class="sf_admin_content">
				<div class="sf_admin_form">
					<form action="/comments/" method="post" class="form-horizontal">
						<input type="hidden" name="location_id" value="<?= $location_id?>">
						<fieldset class="sf_fieldset">
							<legend>Usefull informations</legend>
								<div class="control-group sf_admin_form_row sf_admin_text">
									<label class="control-label">User Name</label>
									<div class="controls">
										<input type="text" name="username" />
									</div>
								</div>
								<div class="control-group sf_admin_form_row sf_admin_text" >
									<label class="control-label">Comment</label>
									<div class="controls">
										<textarea rows="4" cols="30" style="width:377px;height:168px" name="body"></textarea>
									</div>
								</div>
						</fieldset>
						<div class="form-actions">
								<a href="/locations/<?= $location_id?>" class="btn mlm"><i class="icon-list-alt"></i> Back to Location</a>
								<button class="btn btn-primary mlm" type="submit"><i class="icon-ok icon-white"></i> Save</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
