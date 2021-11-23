<?php
	include('../connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Search</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<header class="header-v4">
<h1><b>Colognes and Perfumes Co. Order Search</b></h1>
</header>
<br>
<div>
<?php
    $searchtype = $_POST['searchtype'];
    $search = $_POST['search'];
    
    if(!$searchtype || !$search){
        echo "You have not entered search details. Please go back and try again!";
        exit;
    }
    if(mysqli_connect_errno()) {
        echo "Error, could not connect to the database. Please try again later.";
        exit;
    }
	if (isset($_POST['submit-search'])) {
		$search = mysqli_real_escape_string($connect, $_POST['search']);
		$sql = "SELECT * FROM order_details WHERE order_id LIKE '%$search%' OR id LIKE '%$search%' OR product_id LIKE '%$search%' OR quantity LIKE '%$search%' OR created_at LIKE '%$search%'";
		$result = mysqli_query($connect, $sql);
		$queryResult = mysqli_num_rows($result);
		echo " Number of Orders: ".$queryResult."";
		if ($queryResult > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				echo "
          <br>
          <h3>Order ID: ".$row['order_id']."</h3>
		  <p>Customer ID: ".$row['id']."</p>
		  <p>Product ID: ".$row['product_id']."</p>
          <p>Quantity: ".$row['quantity']."</p>
          <p>Date: ".$row['created_at']."</p>
          <br>
				</div></a>";
			}
		} else {
			echo "There are no results matching your search!";
		}
}
?>
</div>