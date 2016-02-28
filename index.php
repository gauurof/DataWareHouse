<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Alcatas</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
	</head>
	<body>
<nav class="navbar navbar-static">
    <div class="container">
      <a class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
        <span class="glyphicon glyphicon-chevron-down"></span>
      </a>
      <div class="nav-collapse collase">
        <ul class="nav navbar-nav">  
          <li><a href="#">Statistik</a></li>
          <li><a href="#">Medikamente</a></li>
        </ul>
      </div>		
    </div>
</nav><!-- /.navbar -->

<header class="masthead">
  <div class="container">
    <div class="row">
      <div class="col col-sm-6">
        <h1><a href="#" title="scroll down for your viewing pleasure">Alcataş</a>
          <p class="lead">Hier könnte ihr Spruch stehen</p></h1>
      </div>
      <div class="col col-sm-6" style="text-align:right">
          <img src="img/logo.png">        
      </div>
    </div>
  </div>
  
  
</header>

<!-- Begin Body -->
<div class="container">
	<div class="row">
  			
      		<div class="col col-sm-9">
              <div class="panel">
              <form action="statistik.php" method="post">
              
              	<br/>
				<div class="form-group">
				  <label class="col-md-5 control-label" for="selectbasic">Medikament auswählen</label>
				  <div class="col-md-5">
				    <select id="medikament" name="medikament" class="form-control">
				      <option value="1">Viagra</option>
				      <option value="2">Aspririn</option>
				    </select>
				  </div>
				</div>
				<br/>
				<hr>
				
			<div class="form-group">
			  <label class="col-md-5 control-label" for="radios">Geschlecht</label>
			  <div class="col-md-5">
			  <div class="radio">
			    <label for="radios-0">
			      <input type="radio" name="geschlecht" id="radios-0" value="m" checked="checked">
			      Männlich
			    </label>
				</div>
			  <div class="radio">
			    <label for="radios-1">
			      <input type="radio" name="geschlecht" id="radios-1" value="f">
			      Weiblich
			    </label>
				</div>
			  </div>
			  </div>
			  
			<div class="form-group">
			  <label class="col-md-5 control-label" for="radios">Alter</label>
			  <div class="col-md-5">
			  	<input type="text" id="alter" readonly style="border:0; color:#0B5DC3; font-weight:bold;">
			  	<div id="slider-range"></div>
			  </div>
			  </div>
			  
			  <div class="form-group">
				  <label class="col-md-5 control-label" for="selectbasic">Vorbelastung auswählen</label>
				  <div class="col-md-5">
				  	<br/>
				    <select id="vorbelastung" name="vorbelastung" class="form-control">
				      <option value="1">Schnupfen</option>
				      <option value="2">Husten</option>
				    </select>
				  </div>
			</div>
			  
			  
			<div class="form-group">
			  <div class="col-md-5">
			    <button id="erstellen" name="erstellen" class="btn btn-primary">Statistik erstellen</button>
			  </div>
			</div>
			</form>
			  
	</div>
	</div>
	</div>
</div>

	<!-- script references -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  		<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

		<script src="js/bootstrap.min.js"></script>
		<script src="js/scripts.js"></script>
	  	<script>
		  $(function() {
		    $( "#slider-range" ).slider({
		      range: true,
		      min: 0,
		      max: 100,
		      values: [ 10, 90],
		      slide: function( event, ui ) {
		        $( "#alter" ).val(ui.values[0] + " - " + ui.values[1] );
		      }
		    });
		    $( "#alter" ).val( $( "#slider-range" ).slider( "values", 0 ) +
		      " - " + $( "#slider-range" ).slider( "values", 1 ) );
		  });
 	 </script>
	</body>
</html>