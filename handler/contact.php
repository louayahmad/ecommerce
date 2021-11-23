<?php
include("../connect.php");
$email = $_POST['email'];
$message = $_POST['msg'];

if (!$email || !$message) {
    echo "You have not entered all the required fields!<br/>"
    ."Please go back and try again!";
    exit;
}

if(mysqli_connect_errno()) {
    echo "Error, could not connect to the database. Please try again later.";
    exit;
}

$sql= "INSERT INTO `contact`(`email`, `msg`) VALUES ('$email','$message')";

$result = $connect->query($sql);
if($result) {
    echo 'Message sent successfully!';
}
else {
    echo 'An error has occured, item was not added!';
}
?>