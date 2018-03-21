<?php
    // A simple PHP script demonstrating how to connect to MySQL.
    // Press the 'Run' button on the top to start the web server,
    // then click the URL that is emitted to the Output tab of the console.

    $servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $database = "moonbuggy";
    $dbport = 3306;

    // Create connection
    $db = new mysqli($servername, $username, $password, $database, $dbport);
    
    //random values for now, needs to be changed whenever the possibility exists
    $Temp = rand(0,130);
    $Humidity = rand(0,100);
    $Vibration = rand(0,30);
    $LatCoordinates = rand(0, 130);
    $LongCoordinates = rand(0,130);
    $LatLot = "'".$LatCoordinates.":".$LongCoordinates."'";
    $Battery = rand(0,100);
    $Signal = rand(0,100);
    $Tension = rand(0,130);
   
    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    } 
    echo "Connected successfully (".$db->host_info.")";
    
    $sql = "SELECT * FROM buggy";
    $result = mysqli_query($db, $sql);
    $sql1 = "INSERT INTO buggy (
                temperatura, 
                vibracionDI, 
                vibracionDS
                vibracionIS, 
                vibracionII, 
                humedad, 
                coord_gps, 
                bateria,
                senal, 
                tensionIS, 
                tensionDS, 
                tensionII, 
                tensionDI) VALUES 
                ($Temp, 
                $Vibration,
                $Vibration,
                $Vibration,
                $Vibration, 
                $Humidity,
                $LatLot,
                $Battery, 
                $Signal, 
                $Tension,
                $Tension,
                $Tension,
                $Tension);"
    mysqli_query($db, $sql1);
    
    printf("Select returned %d rows.\n", $result->num_rows);
   
  # foreach ($result as $value) {
       print_r($result);
   #}
    

    $db->close();