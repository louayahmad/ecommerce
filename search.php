<?php
	include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Seacrh</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<header>
<h1><b>Colognes and Perfumes Co. Product Search</b></h1>
</header>
<br>

<div>
<?php
    $searchtype = $_POST['searchtype'];
    $search = $_POST['search'];
    
    echo $searchtype." ".$search.":";
    
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
		$sql = "SELECT * FROM products WHERE name LIKE '%$search%' OR price LIKE '%$search%' OR description LIKE '%$search%'";
		$result = mysqli_query($connect, $sql);
		$queryResult = mysqli_num_rows($result);

		echo " Number of Products: ".$queryResult;



		if ($queryResult > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<a href='product-detail.php?details_id=".$row['id']."'><div>
          <br>
          <h3>Name: ".$row['name']."</h3>
		  <p>Price: ".$row['price']."</p>
		  <p>Description: ".$row['description']."</p>
          <br>
				</div></a>";
			}
		} else {
			echo "There are no results matching your search!";
		}
}
?>
</div>