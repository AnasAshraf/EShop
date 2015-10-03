<?php include 'nav.php';?> 

<?php include 'regModal.php';?>
<h1 style="margin-left: 15%"><img src="imgs/tag.png"> Shop </h1>



<div id="myCarousel" class="carousel slide" data-ride="carousel" style=" margin: auto; ">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <!-- <li data-target="#myCarousel" data-slide-to="2"></li> -->
<!--     <li data-target="#myCarousel" data-slide-to="3"></li>
 -->  </ol>



  <!-- Wrapper for slides -->
	    <!--row begin-->
	    <div class="carousel-inner" role="listbox">
	    <div class="item active">
	    	
	    	<?php 
	    		for ($i=0; $i <24 ; $i++) {
 
	    		
	    		if ($i % 4 == 0){ // or wselna l a5er element
    				if($i != 0){
    					echo '</div>';
    					if($i % 8 == 0)
    					echo '<div class="item">';
    				}
    				//l stop condition.. a5er wa7da mafihash.
    					if($i != 15)
    					echo '<div class="row" style="margin:auto; width:75%">';	
    			}
	    				echo '<div class="col-xs-6 col-sm-4 col-md-3">';    
            			echo '<div class="thumbnail">';
               			echo '<div class="caption">';
		                echo '<h4>Thumbnail Headline</h4>';
		                echo '<p>short thumbnail description</p>';
		                echo '<p><a href="" class="label label-danger">Zoom</a>';
		                echo '<a href="" class="label label-default">Download</a></p>';
                		echo '</div>';
                		echo '<img src="http://lorempixel.com/400/300/sports/2/" alt="...">';
           			echo '</div>';
           			echo '</div>';
           			if($i % 8 == 7)
           				echo '</div>';
           			if($i == 23){
           				
           				echo '</div>';

           			}
           			
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
