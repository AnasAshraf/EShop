<?php 

$conn2 = new mysqli("localhost", "root", "", "EshopDB");
    // Check connection
    if ($conn2->connect_error) {
        die("Connection failed: " . $conn2->connect_error);
        echo "error";
    }

if(! $conn2 )
   {
      die('Could not connect: ' . mysql_error());
   }

// prepare and bind
$stmt = $conn2->prepare("INSERT INTO cart (user, product, products_purchased) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $currentUser, $prodName, $y);
// set parameters and execute
$currentUser = "nesreeen";
$prodName = $_GET['x'];
$y = 1;
$stmt->execute();


?>