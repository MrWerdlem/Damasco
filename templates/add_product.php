<?php

require_once './DAL/PDOConnection.php';

$productDal = new products();

$isEditing = isset($_GET['id']);

if(isset($_POST['add'])){
   $result = $_POST['location'];
		$product_id = $_POST['product_id'];
        $productDal->UpdateLocation($product_id, $result);
		header("location: ?action=search");	
}

  $id = $_GET['id'];  
    $id = $productDal->GetProductsLocation($id);{
		
foreach($id as $productDetail);
	
?><head>

<script src="./Jquery/jquery.min.js" type="text/javascript"></script> 
<script src="./Jquery/jquery-ui.min.js" type="text/javascript"></script>  
    <title>Product Update</title>
    </head>
    
	<script type="text/javascript">   
	$(document).ready
	(function(){ var ac_config = { source: "autoSelect.php", select: function(event, ui){ 
	$("#product").val(ui.item.product); 
	$("#product_id").val(ui.item.product_id); },
	minLength:1 }; 
	$("#product").autocomplete(ac_config);}); 
    </script>
    
 <div class="panel panel-primary">
<div class="panel-heading" style="text-align:center; font-size:15px">Update Location</div>
<div class="panel-body">
    <form method="post" id="productDetail"
          action="?action=add_product&<?php echo ($isEditing ? "?id=$id" : ""); ?>">
        <div>
            <label for="location">Location</label>
            <input id="location" class="form-control" name="location" type="text" readonly  value="<?php echo $productDetail['location']; ?>"/>
            <input id="location_id" name="location_id" type="hidden" readonly  value="<?php echo $productDetail['id']; ?>"/>
            <span id="productInfo"></span>
        </div>
        <br />
        <div>
            <label for="product">Product</label>
            <input id="product" name="product" class="form-control" type="text" value=""/>
            <input id="product_id" name="product_id" class="auto" type="hidden" value=""/></p>
            <span id="notesInfo"></span>
        </div>
      
        <button id="add" class="btn btn-primary" name="add" type="submit"><?php echo ($isEditing ? "Update" : "Add");} ?></button>
        </form>
        
      </div>