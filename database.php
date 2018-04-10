
<?php
//index.php
$connect = mysqli_connect("localhost", "root", "", "moonbuggy");

$Temp = rand(0,130);
$Humidity = rand(0,100);
$Vibration = rand(0,30);
$LatCoordinates =rand(18.2127354,19);
$LongCoordinates = rand(-67.1459692, -67);
$LatLot = "'".$LatCoordinates.":".$LongCoordinates."'";
$Battery = rand(0,100);
$senal = rand(0,100);
$Tension = rand(0,130);
$Fecha = gmstrftime("Time: %I:%M: %S %p Date: %D");


//$sqi = "INSERT INTO buggy3 (temperatura, vibracionDI, vibracionDS,vibracionIS)
  //      VALUES ($Temp,$Vibration ,$Vibration,$Vibration)";

//mysqli_query( $connect, $sqi);

$query = "SELECT * FROM buggy3";
$result = mysqli_query($connect, $query);

//counts the number of rows in the database
$count = mysqli_num_rows($result);

if($count > 30) {
   $query = "SELECT * FROM buggy3 ORDER BY id DESC LIMIT 20";
    $result = mysqli_query($connect, $query);
}

$array_data = array();
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
   $data = array(
    'temp'  => $row["temperatura"],
    'VDI'  => $row["vibracionDI"],
    'VDS'  => $row["vibracionDS"],
    'VIS'  => $row["vibracionIS"]
   );
array_push($array_data, $data);
// $chart_data .= "{ temp:'".$row["temperatura"]."', VDI:".$row["vibracionDI"].", VDS:".$row["vibracionDS"].", VIS:".$row["vibracionIS"]."}, ";
}

//$chart_data = substr($chart_data, 0, -2);
echo json_encode($array_data);

//echo json_encode($chart_data);

/*
    $data = array(
   'temp' => $Temp,
   'humidity'  => $Humidity,
   'vibration'  => $Vibration,
   'lat'  => $LatCoordinates,
   'lng'  => $LongCoordinates,
   'battery'  => $Battery,
   'senal'  => $senal,
   'tension'  => $Tension,
   'fecha'  => $Fecha
    );
*/
// echo json_encode($data);
 ?>
