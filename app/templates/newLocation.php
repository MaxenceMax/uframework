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
					<form action="/locations/" method="post" class="form-horizontal">
						<fieldset class="sf_fieldset">
							<legend>Usefull informations</legend>
								<div class="control-group sf_admin_form_row sf_admin_text">
									<label class="control-label">Location Name</label>
									<div class="controls">
										<input type="text" name="locationName" />
									</div>
								</div>
								<div class="control-group sf_admin_form_row sf_admin_text" >
									<label class="control-label">Adress</label>
									<div class="controls">
										<input type="text" name="adress" />
									</div>
								</div>
						</fieldset>
						<fieldset class="sf_fieldset">
							<legend>Other informations</legend>
							<div class="control-group sf_admin_form_row sf_admin_text" >
									<label class="control-label">Phone number</label>
									<div class="controls">
										<input type="text" name="phone" />
									</div>
							</div>
							<div class="control-group sf_admin_form_row sf_admin_text" style="margin-top:18px">
									<label class="control-label">Description</label>
									<div class="controls">
										<textarea rows="4" cols="30" style="width:377px;height:168px" name="description"></textarea>
									</div>
							</div>
						</fieldset>
						<div class="form-actions">
								<a href="/locations" class="btn mlm"><i class="icon-list-alt"></i> Back to list</a>
								<button class="btn btn-primary mlm" type="submit"><i class="icon-ok icon-white"></i> Save</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
