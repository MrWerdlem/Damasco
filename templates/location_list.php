<?php

//require_once('./DAL/PDOconnection.php');


$productsDal = new products;

//$id= $_GET['id'];
//$p_id = $_GET['p_id'];

$p_id = $productsDal->fetchProductbyId($p_id);
?>

<div class="panel panel-primary" style="width:24%; float:right">
<div class="panel-heading" style="text-align:center"><h3>List of Locations</h3></div>
<div class="panel-body">

<form method="post" id="update_location">
<table class="table" style="margin-bottom:0px">
<?php if (!$p_id) {echo"<div class='alert alert-danger' role='alert'>No Locations</div>";} else { foreach ($p_id as $results){?>
<tr><td style="vertical-align:middle"><?php echo $results['location']; ?></td>
<?php //echo $id; echo $results['product_id'];?>
<input id="product_id" name="product_id" type="hidden" readonly  value="<?php echo $productDetail['product_id']; ?>"/>
<input id="product" class="form-control" name="product" type="hidden" readonly  value="<?php echo $productDetail['product']; ?>"/>
<td><button id="X" class="btn btn-primary" name="X" type="submit" style="float:right;" value="<?php echo $results['id']; ?>" >X</button></td>


            <span id="notesInfo"></span>
	
	<?php } }echo '</tr></table>';?>
      </form>
	 </div></div>
     
     <?php
   
 if (isset($_POST['X'])){
	
   		$product = $_POST['product'];
		$product_id = $_POST['product_id'];
		$id = $_POST['X'];
	$productDal->Delete($id);
	header("Location: ?action=update_product&id=".$product."&p_id=".$product_id."&l_id=".$id);
	}

  ?>
    