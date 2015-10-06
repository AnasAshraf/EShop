<?php
	$item=$_GET['x'];	

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
	   
		$stmt = $conn2->prepare("DELETE FROM cart WHERE product = ? ");
		$stmt->bind_param("s",$item);
		// set parameters and execute
	     $stmt->execute();
?>