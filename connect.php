<?php
$host = "localhost";
$user = "ahmadl1";
$password = "louayahmad10";
$dbname = "ahmadl1_ecommerceshop";
$connect=mysqli_connect($host, $user, $password, $dbname);
if(!$dbname)
{
    die("Connection failed: " . mysqli_connect_error());
}
else {
  echo "";
}
?>