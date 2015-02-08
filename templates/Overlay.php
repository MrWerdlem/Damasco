
 <script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script>
<style>

  /* some styling for triggers */
  #triggers {
  text-align:center;
  }

  #triggers img {
  cursor:pointer;
  margin:0 5px;
  background-color:#fff;
  border:1px solid #ccc;
  padding:2px;

  -moz-border-radius:4px;
  -webkit-border-radius:4px;

  }

    /* styling for elements inside overlay */
  .details {
  position:absolute;
  top:15px;
  right:15px;
  font-size:11px;
  color:#fff;
  width:150px;
  }

  .details h3 {
  color:#aba;
  font-size:15px;
  }
.simple_overlay {
 
    /* must be initially hidden */
    display:none;
 
    /* place overlay on top of other elements */
    z-index:10000;
 
    /* styling */
    background-color:#333;
 
    width:675px;
    min-height:200px;
    border:1px solid #666;
 
    /* CSS3 styling for latest browsers */
    -moz-box-shadow:0 0 90px 5px #000;
    -webkit-box-shadow: 0 0 90px #000;
}
 
/* close button positioned on upper right corner */
.simple_overlay .close {
    background-image:url(/media/img/overlay/close.png);
    position:absolute;
    right:-15px;
    top:-15px;
    cursor:pointer;
    height:35px;
    width:35px;
}

CSS
Here is the simple styling for the .details element inside the overlay that shows the description of the image:

  /* styling for elements inside overlay */
  .details {
  position:absolute;
  top:15px;
  right:15px;
  font-size:11px;
  color:#fff;
  width:150px;
  }
 
  .details h3 {
  color:#aba;
  font-size:15px;
  }
  
</style>
<?php 
include_once 'DAL/PDOConnection.php';
$search = '126';

$results = new products;

$search = $results->search($search)
?> <?php  foreach($search as $results){ ?>
<img src="Css/images/dam.png" style="width:90px; height:50px" rel="#mies1">
<h1 rel="#mies1">Product: <?php echo $results ?></h1>
</div>

<div class="simple_overlay" id="mies1">
  <!-- large image -->
  <img src="Css/images/dam.png" />
  <!-- image details -->
  <div class="details">
 
    <h3>The Barcelona Pavilion</h3>
    <h4>Barcelona, Spain <?php echo $results['location']; ?></h4>
    <p>The content ...</p>
  </div>
</div>
<?php } ?>
<script>
  $(document).ready(function() {
      $("h1[rel]").overlay();
    });
</script>