<?php
	$itemNames=$_GET['x'];	
		 $itemsArray = explode(',', $itemNames);
		 $itemslength = 0;
		 foreach($itemsArray as $my_Array){
   			 $itemslength++; 
		}

	$quantity=$_GET['y'];
		 $quantityArray = explode(',', $quantity);

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

	for ($i=0; $i < $itemslength; $i++) {
		$stmt = "SELECT quantity FROM products WHERE item_name = \"".$itemsArray[$i]."\"";
		$result =mysqli_query($conn2, $stmt);
		if($result === FALSE) { 
     	 die("not working"); // TODO: better error handling
  		}
  		$row = mysqli_fetch_array($result, MYSQL_NUM);

  		if($row[0] >= $quantityArray[$i]){
		$stmt2 = $conn2->prepare("UPDATE cart SET products_purchased = ? WHERE product = ?");
		$stmt2->bind_param("ss",$products_purchased ,$product );
		// set parameters and execute
	     $products_purchased =  $quantityArray[$i];
	     $product =  $itemsArray[$i];   
	     $stmt2->execute();
	 }
	 else {
	 	echo "<div class=\"alert alert-danger\" role=\"alert\">
 			 <span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>
			 <span class=\"sr-only\">Error:</span>
 			 Sorry, we do not have enough ".$itemsArray[$i]." in stock.
			 </div>";
	 }
	}
?>