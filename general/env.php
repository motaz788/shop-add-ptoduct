<?php

$host = "localhost";
$user = 'root';
$password = "ccredsea";
$dbName = "shop";


$conn = mysqli_connect($host, $user, $password, $dbName);

if ($conn) {
  echo 'true connectin';
} else {
  echo 'false connection';
}

?>