<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<meta content="Alexander, Sebastian, Amanda, Javier" name="autor">
	<meta content="GUI de Telemetria" name="Descripcion">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <!-- El Selector universal * es lento de por si -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- bootstrap-css -->
	<link rel="stylesheet" href="/css/bootstrap.css">
	<!-- //bootstrap-css -->
	<!-- Custom CSS -->
	<link href="/graficas/Amanda/css/style.css" rel='stylesheet' type='text/css' />
	<!-- font CSS -->
	<link href='fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<!-- font-awesome icons -->
	<link rel="stylesheet" href="/graficas/Amanda/css/font.css" type="text/css"/>
	<link href="/graficas/Amanda/css/font-awesome.css" rel="stylesheet">
	<!-- //font-awesome icons -->
	<script src="/graficas/Amanda/js/jquery2.0.3.min.js"></script>
	<!-- charts -->
	<script src="/graficas/Amanda/js/raphael-min.js"></script>
	<script src="/graficas/Amanda/js/morris.js"></script>
	<link rel="stylesheet" href="/graficas/Amanda/css/morris.css">
	<!-- External JS code -->



    <style type="text/css">
	    body{
	         background-color: #696969;
           padding-bottom: 50px;
	         }

        .canvas{
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
        }

        .sponsor{
        	background-color: #DCDCDC;
    	    	color: 	#32CD32;

        }
    .navbar{

    	 padding-top: 15px;
    padding-bottom: 15px;
    padding-left: 15px;
    border: 0;
    border-radius: 0;
    margin-bottom: 0;
    font-size: 12px;
    }
    .navbar-nav li a:hover {
    	color:  #1abc9c;
    }
    .top-row{
        background-color: #00ff00;
        text-align: center;
        padding:5px;
    }

    .center-row{
    	background-color: #4d4d4d;
    	text-align: center;
        padding:5px;
    }

    .row.no-gutter {
	  margin-left: 0;
	  margin-right: 0;
		}

	.row.no-gutter [class*='col-']:not(:first-child),
	.row.no-gutter [class*='col-']:not(:last-child) {
	  padding-right: 0;
	  padding-left: 0;
	}

	.footer {
  		position: fixed;
  		width: 100%;
  		bottom: 0;
  		padding: 1rem;
  		background-color: #00ff00;
  		text-align: center;
  		overflow: hidden;
	}

	.chart-size{

		 height: 170px;
	}

	.chart-bottom{
		 background-color: #696969;
		 color: #696969;
	}
	  #map {
        height: 400px;
      }
    </style>

</head>

<body class="dashboard-page">

<!--Nav Bar-->
	<div class="row no-gutter">
        <header>
        	 <nav class="navbar navbar-inverse">
        	 	<div class="container-fluid">
        	 		<div class="navbar-header">
        	 			<button type="button" class="navbar-toggle" data-toggle="collapse" data target="#MyNavbar">
        	 			<span class="icon-bar"></span>
        	 			<span class="icon-bar"></span>
        				<span class="icon-bar"></span>
        				</button>


        			<a class="navbar-brand" href="#">UPRM Moonbuggy Project Design <br/><i>Telemetry Department</i></a>
        			<a class="navbar-right" href="#">
						<img src="graficas/Amanda/images/logoColegio.gif" height="80" width="75"></img>
						<img src="img/nasa.png" height="70" width="75"></img>
        			</a>
        			<a class="navbar-left" href="#">
        				<img src="http://static.wixstatic.com/media/3a09a9_f28a18096e4f42c9acd87e87b352217e.png/v1/fill/w_208,h_181,al_c,usm_0.66_1.00_0.01/3a09a9_f28a18096e4f42c9acd87e87b352217e.png" height="80" width="75">
        			</a>
        			</div>
        			<div class="collapse navbar-collapse" id="MyNavbar">
        				<ul class="nav navbar-nav navbar-right">
        					<li class="dropdown">
        						<button onclick="turnOnDB()" class="button_stopdb" href="#">
        							Start displaying data
        							<span class="caret"></span>
        						</button>
						        <ul class="dropdown-menu">
									<li><a href="#">3 Wheeled Buggy</a></li>
									<li><a href="#">4 Wheeled Buggy</a></li>
						        </ul>
						      </li>
        				</ul>
        			</div>
        		</div>
        	</nav>

        </header>
	</div>

<!--Fecha, Hora,Bateria, Señal******-->
	<div class="container-fluid" height= "15px">
		<div class="row no-gutter">

		    <div class="col-md-2">
		    	<p id = "bateria" class="top-row">
		    	</p>
		    </div>

		    <script>
		    	document.getElementById("bateria").innerHTML = "<?php echo $Battery; ?> % <img src='/graficas/Amanda/images/bateria.png' width='25px'></img>";
		    </script>

	        <div class="col-md-8" >
			    <p id="fecha" class="top-row">

			    </p>
			</div>
			 <script>

			 //var myVar = setInterval(function(){time()}, 1000);
			 // //database is only pushing data when page is refreshed
			 // //TODO fix ^^
			 //function time(){
		  //  	document.getElementById("fecha").innerHTML = "<?php echo $Fecha; ?> <img src='graficas/Amanda/images/reloj.png' width='15px'></img>";
			 //

			 var myVar = setInterval(function(){ myTimer() }, 1000);

			function myTimer() {
			    var d = new Date();
			    var t = d.toLocaleTimeString();
			    var day = d.getDate();
			    var month = d.getMonth() + 1;
			    var yr = d.getFullYear()
			    document.getElementById("fecha").innerHTML = t +" <img src='graficas/Amanda/images/reloj.png' width='15px'></img> " + day + "," + month + "," + yr + "";

				//document.getElementById("fecha").innerHTML = callPHP().fecha + " <img src='graficas/Amanda/images/reloj.png' width='15px'></img>";

			}
		    </script>

			<div class="col-md-2">
				<p id= "senal" class="top-row">
				    <script>
				    document.getElementById("senal").innerHTML ="<?php echo $senal;?> dbm <img src='graficas/Amanda/images/wifi.png' width='15px'></img>";
				    </script>

				</p>
			</div>
		</div>
	</div>

<!--GPS, Camara, Buggy's************-->
	<div class="container-fluid">
	    <div class="row center-row no-gutter" height="500px">
	        <div class="col-md-4">
	         <div id="map"></div>



    <script>
      //Note: JS will eventually be moved elsewhere since this code is incredibly disorganized

      //functions is in multiple places in the file this cannot be.
      function callPHP()
		 {
	     	 var latitude = parseFloat("<?php echo $LatCoordinates; ?>");
    		var longitude = parseFloat("<?php echo $LongCoordinates; ?>");
	     	 var dataphp = {
	     				lat:latitude,
	     				lng:longitude
	     	 };
     	 return dataphp;
     }

     function callPos(){
     	var pos = {
            	//34.7111411,-86.6561125   Alabama space center
            	//18.2127354,-67.1459692,18z	lado coliseo mangual
              //lat: 18.2127354,
              //lng: -67.1459692//our data from DB will be placed here

              lat: 18.2127354,
              lng: -67.1459692
            };
     	return pos;
     }

  var lat;
  var lng;
  function setPos(int lat, int lng){
    this.lat = lat;
    this.lng = lng;
  }

  function getPos(){
    return {
      lat:this.lat,
      lng:this.lng
    };
  }

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 18.2127354, lng: -67.1459692},
          zoom: 18,
          mapTypeId: 'satellite'
        });
        var infoWindow = new google.maps.InfoWindow();

            // var pos = {
            // 	//34.7111411,-86.6561125   Alabama space center
            // 	//18.2127354,-67.1459692,18z	lado coliseo mangual
            //   lat: callPHP().lat,
            //   lng: callPHP().lng//our data from DB will be placed here

            // };

            var pos = callPos();

            var image = "buggyLogo.png";
            var marker = new google.maps.Marker({
        		position: {lat: 18.2127354, lng: -67.1459692},
        		map: map,
        		icon: image
        	});

            marker.setCenter({lat: 18.2127354, lng: -67.1459692});
            infoWindow.setPosition(pos);
            //infoWindow.setContent('Location found.');
        //    map.setCenter({lat: 18.2127354, lng: -67.1459692});
            marker.setMap(map);
      }

      //function mapIterator(){
      //	setInterval(initMap(), 1000);
      //}

    </script>
    <script async defer
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBmHnOvHlAXqMjnAlCyIDUh32QkSMzRbME&callback=initMap">
    </script>

	        </div>


	       <div class="col-md-4 col-sm-4 fluid">
	        	<!--camera-->

	        	<div class="center-row" >
	        		<video class="gif-video"  width = "700px" controls>
	        			<source src="graficas/Amanda/images/nasaLaunch.mp4" type="video/mp4">
	        			</video>

	        	<!--
	        		Camera
	        		<p><img src="graficas/Amanda/images/camara.jpg" width="250"></p>
	        		-->
	        	</div>

	        </div>
	        <div class="col-md-4 ">
	        	Buggy's
	        </div>
	    </div>

	</div>

<!--Graphs**************************-->
	<div class="container-fluid">
    <!--    <div class = "row no-gutter chart-bottom">-->
        	<div class="col-md-6">
				<div class="agile-Updating-grids ">
						<div class="area-grids-heading ">
							<h3>Temperature</h3>
						</div>
						<div id="graph1" class="chart-size " ></div>
				</div>
			</div>

			<div class="col-md-6">
					<div class="agile-Updating-grids">
						<div class="area-grids-heading">
							<h3>Vibrations on Wheels</h3>
						</div>
						<div id="graph2" class="chart-size"></div>
					</div>
			</div>
		</div>


	<div class="container-fluid">
		<div class="row no-gutter">
				<div class="col-md-6
				">
					<div class="agile-Updating-grids">
						<div class="area-grids-heading">
							<h3>Humidity</h3>
						</div>
						<div id="graph3" class="chart-size "></div>
					</div>
				</div>

				<div class="col-md-6">
					<div class="agile-Updating-grids">
						<div class="area-grids-heading">
							<h3>Strain</h3>
						</div>
						<div id="graph4" class="chart-size"></div>
					</div>
				</div>
		</div>
	</div>

<p style="color:#696969;font-size:5%;">
<?php include('database.php');?>
</p>
<script>

var dbOnOff = false;

function turnOnDB(){
  if (dbOnOff == false){
    dbOnOff = true;
  }
  else dbOnOff = false;

}

		function callPHP()
		 {
	     	 var vibracionDI = parseFloat("<?php echo $Vibration; ?>");
	     	 var vibracionDS = parseFloat("<?php echo $Vibration; ?>");
	     	 var vibracionIS = parseFloat("<?php echo $Vibration; ?>");
	     	 var vibracionII = parseFloat("<?php echo $Vibration; ?>");
	     	 var temperature = parseFloat("<?php echo $Temp; ?>");
	     	 var humedad = parseFloat("<?php echo $Humidity; ?>");
	     	 var tensionDI = parseFloat("<?php echo $Tension; ?>");
	     	 var tensionDS = parseFloat("<?php echo $Tension; ?>");
	     	 var tensionIS = parseFloat("<?php echo $Tension; ?>");
	     	 var tensionII = parseFloat("<?php echo $Tension; ?>");
	     	 var dataphp = {
	     			vibracionDI:vibracionDI,
	     			vibracionDS:vibracionDS,
	     			vibracionIS:vibracionIS,
	     			vibracionII:vibracionII,
	     			temperature:temperature,
	     			TDI:tensionDI,
	     			TDS:tensionDS,
	     			TIS:tensionIS,
	     			TII:tensionII,
	     			humedad:humedad,
	     	 };
     	 return dataphp;
     }
						var nReloads = 0;
						function data(offset) {
						  var dps = [];
						  for (var x = 0; x <= 200; x ++) {
							var v = (offset + x);
							dps.push({

							//esto son los datos a jalar de la base de datos
							//luego se pone que dato a que grafica
							  x: x,
							  tem: callPHP().temperature,
							  hum: callPHP().humedad,
							  vdi: callPHP().vibracionDI,
							  vds: callPHP().vibracionDS,
							  vis: callPHP().vibracionIS,
							  vii: callPHP().vibracionII,
							  tdi: callPHP().TDI,
							  tds: callPHP().TDS,
							  tis: callPHP().TIS,
							  tii: callPHP().TII,

							});
							if (dps.length >  5 )
					      	{
					      		dps.shift();
					      	}
						  }
						  return dps;
						}

						/*global Morris*/
						/*global $*/

    //        var graphData =


    var graph = Morris.Line({
      element: 'graph1',
      data: [<?php echo $chart_data; ?>],
      xkey: 'temp',
      ykeys: ['temp'],//aqui se escoge el dato a poner en la grafica
      labels: ['Temperatura'],
      parseTime: false,
      ymin: 0,
      ymax: 200,
      hideHover:'auto',
      stacked:true
    });
    var graph2 = Morris.Line({
      element: 'graph2',
      data: [<?php echo $chart_data; ?>],
      xkey: 'temp',
      ykeys: [ 'VDI', 'VDS', 'VIS'],
      labels: ['Rueda1', 'Rueda2', 'Rueda3', 'Rueda4'],
      parseTime: false,
      ymin: 0,
      ymax: 200,
      hideHover:'auto',
      stacked:true
    });
    var graph3 = Morris.Line({
      element: 'graph3',
      data: [<?php echo $chart_data; ?>],
      xkey: 'VDI',
      ykeys: [ 'temp'],
      labels: ['Humedad'],
      parseTime: false,
      ymin: 0,
      ymax: 200,
      hideHover:'auto',
      stacked:true
    });

    var graph4 = Morris.Line({
      element: 'graph4',
      data: [<?php echo $chart_data; ?>],
      xkey: 'VDS',
      ykeys: [ 'temp'],
      labels: ['Strain1', 'Strain2','Strain3','Strain4'],
      parseTime: false,
      ymin: 0,
      ymax: 200,
      hideHover:'auto',
      stacked:true
    });
    /*function update() {
      nReloads++;
      graph.setData(data(5 * nReloads));
      graph2.setData(data(5 * nReloads));
      graph3.setData(data(5 * nReloads));
      graph4.setData(data(5 * nReloads));

      $('#reloadStatus').text(nReloads + ' reloads');
    }
    setInterval(update, 10);*/

    $(document).ready(function(){
      setInterval(function(){
        if(dbOnOff == true){
        var form_data = $(this).serialize();
        $.ajax({
         url:"database.php",
         method:"GET",
         data:form_data,
         dataType:"json",
         success:function(data)
         {

      //   console.log(data);
           graph.setData(data);
           graph2.setData(data);
           graph3.setData(data);
           graph4.setData(data);

         }
        });
      }}, 3000);
    });

			</script>
	<script src="js/bootstrap.js"></script>
	<script src="js/proton.js"></script>

	</div>
	<!--Footer************************-->
		<div class="footer"><strong> Sponsored by:
		 <img src="graficas/Amanda/images/logoGM.png" height="30" width="30"></img>
		 <img src="graficas/Amanda/images/ChevronLogo.png" height="30" width="30"></img>
		 <img src="graficas/Amanda/images/logoBoeing.png" height="30" width="100"></img>
		</div>


</body>

</html>
