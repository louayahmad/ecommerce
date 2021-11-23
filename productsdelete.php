<?php
include('../connect.php');

$newid = $_GET['delete_id'];

$sql = "Delete from products where id='$newid'";

if(mysqli_query($connect, $sql)) {
  header('location: adminindex.php');
}
else {
  echo "not deleted";
}


 ?>
