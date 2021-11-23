<?php
include("../connect.php");
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$id = $_POST['id'];
$title = $_POST['title'];

$sql= "INSERT INTO employees (firstname, lastname, email, id, title) VALUES ('$firstname', '$lastname', '$email', '$id', '$title')";

$connect->query($sql);

?>
