<?php

include_once('db.php');
$medikamente = getMedikamente();
$vorbelastungen = getVorbelastungen();

for($i = 0; $i < count($medikamente); ++$i) {
	if(($medikamente[$i]['ID']) == $_POST['medikament']) {
		$medikament = $medikamente[$i]['Name'];
	}
}

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
		<link   href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet">

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
		<div class="form-group">
			<div class="container">
				<div class="row">
					<div class="col col-sm-9">
						<div class="panel">
						<h1 style="text-align: center;">Statistik für <?php echo $medikament ;?> </h1>
							<br>
							<div id="wirkung" style="min-width: 100%; height:100%; margin: 0 auto;  "></div>
							<div id="nebenwirkung" style="min-width: 100%; height: 100%; margin: 0 auto;  "></div>
							<div style="clear:both;"></div>
						</div>
					</div>

				</div>
			</div>
		</div>

		<!-- script references -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		
		<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/modules/exporting.js"></script>

		<script src="js/bootstrap.min.js"></script>
		<script src="js/scripts.js"></script>
		<script>
			$(function() {
				$('#wirkung').highcharts({
					chart : {
						plotBackgroundColor : null,
						plotBorderWidth : null,
						plotShadow : false,
						type : 'pie'
					},
					title : {
						text : 'Wirkung'
					},
					tooltip : {
						pointFormat : '{series.name}: <b>{point.percentage:.1f}%</b>'
					},
					plotOptions : {
						pie : {
							allowPointSelect : true,
							cursor : 'pointer',
							dataLabels : {
								enabled : false
							},
							showInLegend : true
						}
					},
					credits : {
						enabled : false
					},
					series : [{
						name : 'Wirkung',
						colorByPoint : true,
						data : [{
							name : 'Stufe 1',
							y : 56.33
						}, {
							name : 'Stufe 2',
							y : 24.03,
						}, {
							name : 'Stufe 3',
							y : 10.38
						}, {
							name : 'Stufe 4',
							y : 4.77
						}, {
							name : 'Stufe 5',
							y : 0.91
						}, {
							name : 'Stufe 6',
							y : 0.2
						}]
					}]
				});
				$('#nebenwirkung').highcharts({
					chart : {
						plotBackgroundColor : null,
						plotBorderWidth : null,
						plotShadow : false,
						type : 'pie'
					},
					title : {
						text : 'Nebenwirkungen'
					},
					tooltip : {
						pointFormat : '{series.name}: <b>{point.percentage:.1f}%</b>'
					},
					plotOptions : {
						pie : {
							allowPointSelect : true,
							cursor : 'pointer',
							dataLabels : {
								enabled : false
							},
							showInLegend : true
						}
					},
					credits : {
						enabled : false
					},
					series : [{
						name : 'Nebnewirkung',
						colorByPoint : true,
						data : [{
							name : 'Bl\u00e4hungen',
							y : 10
						}, {
							name : 'Atemnot',
							y : 3,
						}, {
							name : 'Schmierblutungen',
							y : 1
						}, {
							name : 'Unterleibsschmerzen',
							y : 5
						}, {
							name : 'Akne',
							y : 6
						}, {
							name : 'Erektionsst\u00f6rungen',
							y : 12
						}]
					}]
				});
			});
		</script>

	</body>
</html>
