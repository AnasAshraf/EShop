<?php
$count = $_GET['x'];
 $conn = new mysqli("localhost", "root", "", "EshopDB");
            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            echo "error";
            }
            if(! $conn){
              die('Could not connect: ' . mysql_error());
            }

	 $stmt = "SELECT * FROM cart WHERE user = \"nesreeen\"";
    $result =mysqli_query($conn, $stmt);
    if($result === FALSE) { 
       die("not working"); // TODO: better error handling
      }
      for ($i=0; $i < $count ; $i++) {         
        $row = mysqli_fetch_array($result, MYSQL_NUM);
        $stmt2 = $conn->prepare("INSERT INTO history (user, product, purchased_prod, time) VALUES(?,?,?,?)");
        $stmt2->bind_param("ssss", $r0 , $r1, $r2, $time);
    // set parameters and execute
        $r0= $row[0];
        $r1= $row[1];
        $r2= $row[2];
        $time = "now()";
       $stmt2->execute();
		 $quantity = mysqli_fetch_array(mysqli_query($conn, "SELECT quantity FROM products WHERE item_name = \"".$r1."\""), MYSQL_NUM);


        $stmt3 = $conn->prepare("UPDATE products SET quantity = ? WHERE item_name = ?");
        $stmt3->bind_param("ss", $quan,$r1);
        $quan = $quantity[0] - $r2;
        $stmt3->execute();
      }
      $stmt = $conn->prepare("DELETE FROM cart WHERE user = ? ");
    $stmt->bind_param("s",$name);
    // set parameters and execute
    $name = "nesreeen";
       $stmt->execute();
?>