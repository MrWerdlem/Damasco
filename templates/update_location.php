<?php

require_once './DAL/PDOConnection.php';


$productDal = new products();

$isEditing = isset($_GET['id']);

if(isset($_POST['add'])){
   $result = $_POST['location'];
   		$product = $_POST['product'];
		$product_id = $_POST['product_id'];
        $productDal->UpdateLocation($product_id, $result);
		header("location:?action=update_product&id=".$product."&p_id=".$product_id);
		echo '<div class="alert alert-success" role="alert">Product Successfully updated to Location</div>';	
}



if ($_GET['p_id']==''){
	$id = $_GET['id'];
	$id = $productDal->GetProducts($id);
	}
else{
  $id = $_GET['p_id'];  

    $id = $productDal->GetProductsId($id);
}
foreach($id as $productDetail){

?>

<script src="./Jquery/jquery.min.js" type="text/javascript"></script> 
<script src="./Jquery/jquery-ui.min.js" type="text/javascript"></script>  
    <title>Product Update</title>
    </head>
    
	<script type="text/javascript">   
	$(document).ready
	(function(){ var ac_config = { source: "autoSelectLocation.php", select: function(event, ui){ 
	$("#location").val(ui.item.location); 
	$("#id").val(ui.item.id); },
	minLength:1 }; 
	$("#location").autocomplete(ac_config);}); 
    </script>
    
 <div class="panel panel-primary" style="width:24%; float:right; margin-right:13px">
<div class="panel-heading" style="text-align:center"><h3>Update Location</h3></div>
<div class="panel-body">
    <form method="post" id="update_location"
          action="?action=update_location&<?php echo ($isEditing ? "?id=$id" : ""); ?>">
        <div>
            <label for="product">Product</label>
            <input id="product" class="form-control" name="product" type="text" readonly  value="<?php echo $productDetail['product']; ?>"/>
            <input id="product_id" name="product_id" type="hidden" readonly  value="<?php echo $productDetail['product_id']; ?>"/>
            <span id="productInfo"></span>
        </div>
        <br />
        <div>
            <label for="location">Location</label>
            <input id="location" name="location" class="form-control" type="text" value=""/>
            <input id="id" name="id" class="auto" type="hidden" value=""/></p>
            <span id="notesInfo"></span>
        </div>
      
        <button id="add" class="btn btn-primary" name="add" type="submit" >
		
		<?php echo ($isEditing ? "Update" : "Add"); ?></button>
        
        </form>
         
      </div>
      <?php }?>
      </div>
     
     
	  
    