<?php
session_start();

if(isset($_POST['login'])) {

include('../connect.php');

$email=$_POST['email'];
$password = $_POST['password'];
$sql="SELECT * from admins Where username = '$email' AND password='$password'";
$results=$connect->query($sql);
$final=$results->fetch_assoc();

$_SESSION['email']=$final['username'];
$_SESSION['password']=$final['password'];

$_SESSION['customerid']=$final['id'];

if (!$email || !$password) {
    echo "You have not entered all the required fields!<br/>"
    ."Please go back and try again!";
    exit;
}

if(mysqli_connect_errno()) {
    echo "Error, could not connect to the database. Please try again later.";
    exit;
}

if($email=$final['username'] AND $password=$final['password']) {
  header('location: ../admin/adminindex.php');
}
else {
  echo "<script>alert('Wrong credentials!');
  window.location.href = '../index.php';
  </script>";
}
}
?>