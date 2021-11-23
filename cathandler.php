<?php
include("../connect.php");
$categories = $_POST['name'];

$sql= "INSERT INTO categories (name) VALUES ('$categories')";

$connect->query($sql);

?>
