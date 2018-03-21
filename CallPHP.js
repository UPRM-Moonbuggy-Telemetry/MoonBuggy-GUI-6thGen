var xhttp = new XMLHttpRequest();

xhttp.open("GET", "database.php", true);
xhttp.send();

function callPHP() {
     	
     	var latitude = parseFloat("<?php echo $LatCoordinates; ?>");
     	var longitude = parseFloat("<?php echo $LongCoordinates; ?>");
     	var vibracionDI = parseFloat("<?php echo $vibracionDI; ?>");
     	var vibracionDS = parseFloat("<?php echo $vibracionDS; ?>");
     	var vibracionIS = parseFloat("<?php echo $vibracionIS; ?>");
     	var vibracionII = parseFloat("<?php echo $vibracionII; ?>");
     	var bateria = parseFloat("<?php echo $Battery; ?>");
     	var senal = parseFloat("<?php echo $senal; ?>");
     	var temperature = parseFloat("<?php echo $Temp; ?>");
     	var humedad = parseFloat("<?php echo $Humidity; ?>");
     	var tensionDI = parseFloat("<?php echo $TensionDI; ?>");
     	var tensionDS = parseFloat("<?php echo $TensionDS; ?>");
     	var tensionIS = parseFloat("<?php echo $TensionIS; ?>");
     	var tensionII = parseFloat("<?php echo $TensionII; ?>");
		var fecha = parseFloat("<?php echo $Fcha; ?>");
     	
     	//keys for var calling 
     	var dataphp = {
     		lat:latitude, 
     		lng:longitude, 
     		VDI:vibracionDI, 
     		VDS:vibracionDS, 
     		VIS:vibracionIS, 
     		VII:vibracionII, 
     		bateria:bateria,
     		senal:senal,
     		temperature:temperature,
     		humedad:humedad,
     		TDI:tensionDI,
     		TDS:tensionDS,
     		TIS:tensionIS,
     		TII:tensionII,
     		fecha:fecha
     		
     	};
     	
     	
     	return dataphp;
     
     	
     }