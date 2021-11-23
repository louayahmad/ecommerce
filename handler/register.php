<?php
include('../connect.php');
$email=$_POST['email'];
$password = $_POST['password'];
$password2=$_POST['password2'];

if (!$email || !$password || !$password2) {
    echo "You have not entered all the required fields!<br/>"
    ."Please go back and try again!";
    exit;
}

if(mysqli_connect_errno()) {
    echo "Error, could not connect to the database. Please try again later.";
    exit;
}

if($password==$password2) {
  $sql="INSERT INTO customers(username, password) VALUES('$email', '$password')";
  $connect->query($sql);
  echo "<script>alert('Registered!');
  window.location.href='../home.php';
  </script>";

}
else {
  echo "<script>alert('Password did not match');
  window.location.href='../home.php';
  </script>";
}
?>