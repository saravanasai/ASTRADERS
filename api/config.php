<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testemi";

$baseUrl = "http://localhost/AS_TRADERS/uploads/";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // #####  Un comment this on production server  ###########
  //  $sql="SET SESSION time_zone = '+5:30';";
  //  $stmt=$conn->prepare($sql);
  //  if( $stmt->execute())
  //  {
  //     //  echo"time seted";
  //     //  echo "Connected successfully";
  //  }

} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
