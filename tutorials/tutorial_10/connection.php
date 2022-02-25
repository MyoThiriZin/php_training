<?php

$dbhost="localhost";
$dbuser="root";
$dbpass="1234";
$dbname="new_schema";

$conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if (!$conn) {
  die("failed to connect!");
}
?>