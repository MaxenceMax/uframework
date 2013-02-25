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
			<h2 class="mbl">New Party</h2>
			<div class="sf_admin_content">
				<div class="sf_admin_form">
					<form action="/party/" method="post" class="form-horizontal">
						<fieldset class="sf_fieldset">
							<legend>Party's location</legend>
								<div class="control-group sf_admin_form_row sf_admin_text">
									<label class="control-label">Location Name</label>
									<div class="controls">
										<select name="location_id" class="input-large" >
											<?php foreach ($locations as $location) :?>
												<option value="<?= $location->getId()?>"><?= $location->getName()?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
						</fieldset>
						<fieldset class="sf_fieldset">
							<legend>Party's information</legend>
							<div class="control-group sf_admin_form_row sf_admin_text" >
									<label class="control-label">Party Time</label>
										<div class="controls">
            								<select class="input-mini" name="day">
												<option value="1">01</option>
												<option value="2">02</option>
												<option value="3">03</option>
												<option value="4">04</option>
												<option value="5">05</option>
												<option value="6">06</option>
												<option value="7">07</option>
												<option value="8">08</option>
												<option value="9">09</option>
												<option value="10">10</option>
												<option value="11">11</option>
												<option value="12">12</option>
												<option value="13">13</option>
												<option value="14">14</option>
												<option value="15">15</option>
												<option value="16">16</option>
												<option value="17">17</option>
												<option value="18">18</option>
												<option value="19">19</option>
												<option value="20">20</option>
												<option value="21">21</option>
												<option value="22">22</option>
												<option value="23">23</option>
												<option value="24">24</option>
												<option value="25">25</option>
												<option value="26">26</option>
												<option value="27">27</option>
												<option value="28">28</option>
												<option value="29">29</option>
												<option value="30">30</option>
												<option value="31">31</option>
												</select>/
												<select class="input-mini" name="month">
													<option value="1">01</option>
													<option value="2">02</option>
													<option value="3">03</option>
													<option value="4">04</option>
													<option value="5">05</option>
													<option value="6">06</option>
													<option value="7">07</option>
													<option value="8">08</option>
													<option value="9">09</option>
													<option value="10">10</option>
													<option value="11">11</option>
													<option value="12">12</option>
													</select>
												/<select class="input-mini" name="year">
													<option value="2013">2013</option>
													<option value="2014">2014</option>
													<option value="2015">2015</option>
													<option value="2016">2016</option>
													<option value="2017">2017</option>
													<option value="2018">2018</option>
													<option value="2019">2019</option>
													<option value="2020">2020</option>
													<option value="2021">2021</option>
													<option value="2022">2022</option>
												</select> &nbsp;&nbsp;&nbsp;Time :
												<select class="input-mini" name="hour">
													<?php for($i = 0; $i<24; $i++):?>
														<option value="<?=$i?>"><?= $i?></option>
													<?php endfor;?>
												</select>:
												<select class="input-mini" name="hour">
													<?php for($i = 0; $i<60; $i++):?>
														<option value="<?=$i?>"><?= $i?></option>
													<?php endfor;?>
												</select>
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
								<a href="/parties" class="btn mlm"><i class="icon-list-alt"></i> Back to list</a>
								<button class="btn btn-primary mlm" type="submit"><i class="icon-ok icon-white"></i> Save</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
