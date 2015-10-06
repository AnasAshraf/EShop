<?php include 'nav.php';?> 

<?php include 'regModal.php';?>
<body style="margin-top:6%">
<div id="testD"></div>
<h2><img src="imgs/cart.png" style="margin-left:21%"> My Cart</h2>
<div class="container" style="margin-top: 2%; margin-left:20%">
  <div class="row">
    <div class="col-xs-8">
      <div class="panel panel-info">
        <div class="panel-heading">
          <div class="panel-title">
            <div class="row">
              <div class="col-xs-6">
              <a href="history.php">purchase history</a>  
              </div>
              <div class="col-xs-6">

                <button type="button" class="btn btn-primary btn-sm btn-block" >
                  <a href="shop.php" style="color: white"><span class="glyphicon glyphicon-share-alt" style="color: white"></span> Continue shopping</a>
                </button>
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
            $sql = "SELECT * FROM cart WHERE user = \"".$currentUser."\"";
           
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
            echo '<input id="'.$i.'add" type="text" class="form-control input-sm" value="'.$nums[$i].'">';
            echo '</div>';
            echo '<div class="col-xs-2">';
            echo '<button type="button" class="btn btn-link btn-xs">';
            echo '<span id= "'.$i.'del" class= "glyphicon glyphicon-trash" onclick= "deleteItem('.'\''.$row[0].'\')"> </span>';
            echo '</button>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            $total+=$nums[$i] * $row[2];
            $itemNames[$i] = $row[0];
            }
        ?>


          <div class="row">
            <div class="text-center">
              <div class="col-xs-9">
                <h5 class="text-right">Edited items?</h5>
              </div>
              <div class="col-xs-3">
              
              <?php
              $cart_info_json = json_encode($itemNames);
              $count_json = json_encode($count);
                echo '<button id="btn-update" type="button" class="btn btn-default btn-sm btn-block">
                  Update cart
                </button>' 
              ?>
              </div>
            </div>
          </div>
        </div>
        <div class="panel-footer">
          <div class="row text-center">
            <div class="col-xs-9">
            <?php
              echo '<h4 class="text-right">Total <strong>'.$total.' EGP</strong></h4>'
            ?>
            </div>
            <div class="col-xs-3">
              <button type="button" id="btn-confirm" class="btn btn-success btn-block" data-toggle="modal" data-target=".bs-example-modal-lg" >
                Checkout
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
  </div>
    
    <div class="row">
        <!-- Large modal -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style=" padding-right: 0px; background-color: rgba(4, 4, 4, 0.8)" >
  <div class="modal-dialog modal-lg" style=" top: 20%; width: 100%; position: absolute">
    <div class="modal-content" style=" border-radius: 0px;border: none;top: 40%">
    
      <div class="modal-body" style=" background-color: #00cc00; color: white">
     
      <H2>Congratulations!</H2>
      <h4>Your items have been purchased successfully</h4> 
      </div>
    </div>
  </div>
</div>
    </div>
    
    
</div>

 <script type="text/javascript">
  
$(document).ready(function() {
    $('#btn-update').click(function() {
      updateCart();
    });
});

$(document).ready(function() {
    $('#btn-confirm').click(function() {
      confirmCart();
    });
});






  function updateCart(){
    var quantity = new Array();
    var obj = JSON.parse('<?= $cart_info_json; ?>');
    var count = JSON.parse('<?= $count_json; ?>');

    //confirm(obj[0]);
    var xhttp = new XMLHttpRequest();
       for (var i = 0; i < count; i++) {

             quantity[i] = document.getElementById(i+"add").value;          
 }
    xhttp.open("GET","update.php?x=" + obj + "&y=" + quantity,true);
    xhttp.send(); 
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                //  window.location = "cart.php";
                  document.getElementById("testD").innerHTML = xhttp.responseText;
            }
        }
  }
 
function deleteItem(itemName){
  var xhttp = new XMLHttpRequest();
  xhttp.open("GET","delete.php?x=" + itemName,true);
  xhttp.send(); 

  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      //document.getElementById("testD").innerHTML = xhttp.responseText;
      window.location = "cart.php";
    }
  }
  }

  function confirmCart(){
        var count = JSON.parse('<?= $count_json; ?>');

      confirm("helloooo");

  var xhttp = new XMLHttpRequest();
        confirm("helloooo");

  xhttp.open("GET","confirm.php?x=" + count,true);
  xhttp.send(); 
        confirm("helloooo");

  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("testD").innerHTML = xhttp.responseText;
            confirm("helloooo");

      //window.location = "cart.php";
    }
  }
  }

</script>

</body>