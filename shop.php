 <?php include 'nav.php';?> 

<?php include 'regModal.php';?> 
<h1 style="margin-left: 15%"><img src="imgs/tag.png"> Shop </h1>


<?php 

$conn = new mysqli("localhost", "root", "", "EshopDB");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        echo "error";
    }

if(! $conn )
   {
      die('Could not connect: ' . mysql_error());
   }+
   
   

   $sql = 'SELECT  * FROM products';
   $items = array();
   $result =mysqli_query($conn, $sql);

  if($result === FALSE) { 
      die("not working"); // TODO: better error handling
  }

  $row = mysqli_fetch_array( $result, MYSQL_NUM);
  
  $count=mysqli_num_rows($result);
 
?> 
<link rel="stylesheet" type="text/css" href="shop-stylesheet.css"/>


<body style="margin-top:6%">
<div id="test"></div>
<div id="myCarousel" class="carousel slide" data-ride="carousel" >
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <!-- <li data-target="#myCarousel" data-slide-to="2"></li> -->
    <!--<li data-target="#myCarousel" data-slide-to="3"></li> -->
  </ol>

  <!-- Wrapper for slides -->
      <!--row begin-->
      <div class="carousel-inner" style=" margin: auto; height: 100% "  role="listbox">
      <div class="item active" style=" margin: auto; height: 100% ">
        
        <?php 
          for ($i=0; $i <$count ; $i++) {
 
          
          if ($i % 4 == 0){ // or wselna l a5er element
            if($i != 0){
              echo '</div>';
              if($i % 8 == 0)
              echo '<div class="item" style=" margin: auto; height: 100% ">';
            }
            //l stop condition.. a5er wa7da mafihash.
              if($i != 15)
              {
              echo '<div class="row" style="margin:auto; width:75%;">'; 
              } 
          }
              echo '<div class="col-xs-6 col-sm-4 col-md-3" >';    
                  echo '<div class="thumbnail" >';
                    echo '<div class="caption">';
                    echo '<p> <small>'.$row[0].'</small> </p>';
                    echo '<p> <small>'.$row[1].' available </small> </p>';
                    echo '<p> <small>'.$row[2].' EGP </small></p>';
                    if($row[1] > 0){
                      echo "<p><button class=\"label label-danger\"  onclick= 'addToCart(\"".$row[0]."\")' >Add to Cart</button>";
                    } else {
                      echo '<p> <small> Sold Out </small></p>';
                    }
                    echo '</div>';
                    echo '<img src="imgs/'.$row[3].'">';
                echo '</div>';
                echo '</div>';
                if($i % 8 == 7)
                {
                  echo '</div>';
                }
                if($i == $count-1){
                  
                  echo '</div>';

                }
                $row = mysqli_fetch_array( $result, MYSQL_NUM);
          }

          

        ?>
<!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>  
</div>
</div>

<!-- Latest compiled and minified JavaScript -->
    <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


<script type="text/javascript">
  function addToCart(itemName){
  var xhttp = new XMLHttpRequest();
  xhttp.open("GET","itemname.php?x=" + itemName,true);
  xhttp.send(); 


      xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
     document.getElementById("test").innerHTML = xhttp.responseText;
    }
  }

  }

</script>

</body>


