<?php include 'nav.php';?> 

<?php include 'regModal.php';?>

<h2><img src="imgs/cart.png" style="margin-left:21%"> My Cart</h2>

<div class="container" style="margin-top: 2%; margin-left:20%">
  <div class="row">
    <div class="col-xs-8">
      <div class="panel panel-info">
        <div class="panel-heading">
          <div class="panel-title">
            <div class="row">
              <div class="col-xs-6">
                
              </div>
              <div class="col-xs-6">
                <button type="button" class="btn btn-primary btn-sm btn-block" >
                  <a href="shop.php"><span class="glyphicon glyphicon-share-alt"></span> Continue shopping</a>
                </button>
              </div>
            </div>
          </div>
        </div>
          <div class="panel-body">
        <?php 
        $num = 0;
        $arr = array(1,2,3,4);
          foreach ($arr as $q => $x) {
            $num++;
          }
          for ($i=0; $i < $num; $i++) { 
          
        
          echo '<div class="row">';
            echo '<div class="col-xs-2"><img class="img-responsive" src="http://placehold.it/100x70">';
            echo '</div>';
            echo '<div class="col-xs-4">';
              echo '<h4 class="product-name"><strong>Product name</strong></h4><h4><small>Product description</small></h4>';
            echo '</div>';
            echo '<div class="col-xs-6">';
              echo '<div class="col-xs-6 text-right">';
                echo '<h6><strong>25.00 <span class="text-muted">x</span></strong></h6>';
              echo '</div>';
              echo '<div class="col-xs-4">';
                echo '<input type="text" class="form-control input-sm" value="1">';
              echo '</div>';
              echo '<div class="col-xs-2">';
                echo '<button type="button" class="btn btn-link btn-xs">';
                  echo '<span class="glyphicon glyphicon-trash"> </span>';
                echo '</button>';
              echo '</div>';
            echo '</div>';
          echo '</div>';
          
            }
        ?>


          <div class="row">
            <div class="text-center">
              <div class="col-xs-9">
                <h6 class="text-right">Added items?</h6>
              </div>
              <div class="col-xs-3">
                <button type="button" class="btn btn-default btn-sm btn-block">
                  Update cart
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="panel-footer">
          <div class="row text-center">
            <div class="col-xs-9">
              <h4 class="text-right">Total <strong>$50.00</strong></h4>
            </div>
            <div class="col-xs-3">
              <button type="button" class="btn btn-success btn-block">
                Checkout
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>