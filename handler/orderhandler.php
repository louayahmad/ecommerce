<?php
session_start();
include('../connect.php');
$total = $_POST['total'];
$phone = $_POST['phone'];
$address = $_POST['address'];

if (!$phone || !$address) {
    echo "You have not entered all the required fields!<br/>"
    ."Please go back and try again!";
    exit;
}

$customerid=$_SESSION['customerid'];

$sql="INSERT INTO orders (customer_id, address, phone, total) VALUES ('$customerid', '$address', '$phone', '$total')";
$connect->query($sql);

$sql2= "Select id from orders order by id DESC limit 1";
$result = $connect->query($sql2);
$final = $result->fetch_assoc();
$orderid = $final['id'];

foreach ($_SESSION['cart'] as $key => $value) {
  $proid=$value['item_id'];
  $quantity=$value['quantity'];

  $sql3 = "INSERT INTO order_details(order_id, product_id, quantity) VALUES ('$orderid','$proid', '$quantity')";
  $connect->query($sql3);
}
date_default_timezone_set('US/Eastern');

echo "<script> alert('Perfumes & Colognes - Order is placed! Order processed at ".date('l jS \of F Y h:i:s A')." - The total is:' + ' '+'$'+ $total + '.' + ' ' + 'Order Id:'+ ' ' + $orderid + ' ' + 'Quantity:' + ' ' + $quantity);
window.location.href = '../home.php';
</script>";
?>