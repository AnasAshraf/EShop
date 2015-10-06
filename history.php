<?php include 'nav.php';?> 

<?php include 'regModal.php';?>
<body style="margin-top:6%">
<div id="testD"></div>
<h2><img src="imgs/cart.png" style="margin-left:21%"> Purchase History</h2>
<div class="container" style="margin-top: 2%; margin-left:20%">
  <div class="row">
    <div class="col-xs-8">
      <div class="panel panel-info">
        <div class="panel-heading">
          <div class="panel-title">
            <div class="row">
              <div class="col-xs-6">
              </div>
            </div>
          </div>
        </div>
          <div class="panel-body">
        <?php 
        $currentUser = SESSION['user'];
            $conn = new mysqli("localhost", "root", "", "EshopDB");
            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            echo "error";
            }
            if(! $conn){
              die('Could not connect: ' . mysql_error());
            }
            // prepare and bind
            $sql = "SELECT * FROM history WHERE user = \"".$currentUser."\"";
           
   $result =mysqli_query($conn, $sql);

  if($result === FALSE) { 
      die("not working"); // TODO: better error handling
  }
          $items =array();
          //number of pieces ordered
          $nums = array();
         // $quantity = array();
          $itemNames = array();
          $total = 0;
          $row = mysqli_fetch_array( $result, MYSQL_NUM);
          $count=mysqli_num_rows($result);
         // $names=array();
            // Array containing all info about items in cart
           for ($i=0; $i < $count ; $i++) { 
              $sql = "SELECT * FROM products WHERE item_name = \"".$row[1]."\"";
              $tempRes = mysqli_query($conn, $sql);
              $items[$i] = mysqli_fetch_array( $tempRes, MYSQL_NUM);
              // number of pieces ordered 
              $nums[$i] = $row[2];
              $row = mysqli_fetch_array( $result, MYSQL_NUM);
           }
          
          for ($i=0; $i < $count; $i++) { 
            $row = $items[$i];
            echo '<div class="row">';
            echo '<div class="col-xs-2"><img class="img-responsive" src="imgs/'.$row[3].'">';
            echo '</div>';
            echo '<div class="col-xs-4">';
            echo '<h4 class="product-name"><strong>'.$row[0].'</strong></h4>';
            echo '</div>';
            echo '<div class="col-xs-6">';
            echo '<div class="col-xs-6 text-right">';
            echo '<h6><strong>'.$row[2].' EGP<span class="text-muted">x</span></strong></h6>';
            echo '</div>';
            echo '<div class="col-xs-4">';
            echo '<p>'.$nums[$i].'</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            }
        ?>
        </div>
      </div>
    </div>
  </div>
</div>
</body>