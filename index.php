<?php

include_once('db.php');
$medikamente = getMedikamente();
$vorbelastungen = getVorbelastungen();

?>
<!DOCTYPE html>
<html lang="de">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<meta charset="utf-8">
		<title>Alcata&#351;</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">
		<link href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet">
		<link href="css/nouislider.min.css" rel="stylesheet">
	</head>
	<body>
		<nav class="navbar navbar-static">
			<div class="container">
				<a class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse"> </a>
				<div class="nav-collapse collase">
					<ul class="nav navbar-nav">
						<li>
							<a href="index.php">Statistik</a>
						</li>
					</ul>
				</div>
			</div>
		</nav><!-- /.navbar -->

		<header class="masthead">
			<div class="container">
				<div class="row">
					<div class="col col-sm-6" style="text-align:left">
						<img src="img/logo.png" alt="Firmen logo">
					</div>
				</div>
			</div>
		</header>
		<!-- Begin Body -->
		<div class="container">
			<div class="row">
				<div class="col col-sm-9">
					<div class="panel">
						<form action="statistik2.php" method="post">
							<br/>
							<div class="form-group">
								<label class="col-md-4 control-label" for="medikament">Medikament ausw&auml;hlen</label>
								<div class="col-md-5">

									<select id="medikament" name="medikament" class="form-control">
										<?php
										for($i = 0; $i < count($medikamente); ++$i) {
										echo '<option value="' . $medikamente[$i]['ID'] . '">' . $medikamente[$i]['Name'] . '</option>';
										}
										?>
									</select>
									<hr>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label" for="radios-0">Geschlecht</label>
								<div class="col-md-5">
									<div class="radio">
										<label for="radios-0">
											<input type="radio" name="geschlecht" id="radios-0" value="m" checked="checked">
											M&auml;nnlich </label>
									</div>
									<div class="radio">
										<label for="radios-1">
											<input type="radio" name="geschlecht" id="radios-1" value="f">
											Weiblich </label>
									</div>
									<hr>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Alter</label>
								<div class="col-md-5">
									<div id="slider"></div>
									<br>

									Zwischen <span class="example-val" id="slider-value-min"></span> und <span class="example-val" id="slider-value-max"></span>

									<hr>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label" for="vorbelastung">Vorbelastung ausw&auml;hlen</label>
								<div class="col-md-5">
									<select id="vorbelastung" name="vorbelastung" class="form-control">
										<?php
										for($i = 0; $i < count($vorbelastungen); ++$i) {

										echo '<option value="' . $vorbelastungen[$i]['ID'] . '">' . $vorbelastungen[$i]['Name'] . '</option>';
										}
										?>
									</select>
									<hr>
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-5">
									<button id="erstellen" name="erstellen" class="btn btn-primary" style="margin-bottom:20px">
										Statistik erstellen
									</button>
								</div>
							</div>
						</form>
						<div style="clear:both;"></div>

					</div>
				</div>
			</div>
		</div>

		<!-- script references -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/scripts.js"></script>

		<script>
			var slider = document.getElementById('slider');

			noUiSlider.create(slider, {
				start : [20, 80],
				connect : true,
				step : 1,
				range : {
					'min' : 0,
					'max' : 100
				}
			});
		</script>
		<script>
			var marginMin = document.getElementById('slider-value-min'), marginMax = document.getElementById('slider-value-max');

			slider.noUiSlider.on('update', function(values, handle) {
				if (handle) {
					marginMax.innerHTML = values[handle];
				} else {
					marginMin.innerHTML = values[handle];
				}
			});
		</script>

	</body>
</html>
