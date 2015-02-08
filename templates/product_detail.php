<?php 
include_once('DAL/PDOConnection.php');

$productDal = new products();

$isEditing = isset($_GET['id']);

if($isEditing){
$id = $_GET['id'];

}
else {$id = $_GET['l_id'];}

if(isset($_POST['add'])){
    //form submitted
    $product = $_POST['product'];
    $notes = $_POST['notes'];
	$quantity = $_POST['quantity'];
	$description = $_POST['description'];
	
	if($isEditing){
        //update Product
        $productDal->UpdateProduct($id,$product,$notes,$quantity,$description);
		header("location: index.php");
	}
	else{
		$result = $_POST['Select'];
		$product_id = $_POST['product_id'];
        $productDal->UpdateLocation($product_id, $result);
		header("location: index.php");
		exit();			
			}		
}
if($isEditing){
    $id = $productDal->GetProductsLocation($id);{
	
foreach($id as $productDetail);
	}	
}	
	else{
		$id = $_GET['l_id'];
	
	$id = $productDal->GetProducts($id);{
		foreach($id as $productDetail);
		}
	}
?>

   <div class="panel panel-primary" style="width:49%; float:left">
<div class="panel-heading" style="text-align:center;"><h3>Product Details</h3></div>
<div class="panel-body">
<form method="post" id="productDetail"
          action="?action=product_detail<?php echo ($isEditing ? "?id=$id" : ""); ?>">
        <div>
            <label for="location">Location</label><?php if($id = (isset($_GET['l_id']) ? $_GET['l_id'] : null)){?>
				<select name="Select" class='form-control' style="width:50%"><?php $lst = $productDal->EmptyLocations();
				foreach ($lst as $list){
      			echo "<option>".
		 		$list['location'];}?>
        </select>
				<?php }else { echo "
            <input id='location' name='location' class='form-control' type='text' readonly  value=" . $productDetail['location']; }?>
            <span id="productInfo"></span>
        </div>
        <div>
            <label for="product">Product</label>
            <input id="product" name="product" type="text" class="form-control" value="<?php echo $productDetail['product']; ?>"/>
            <span id="notesInfo"></span>
        </div>
            <input id="product_id" name="product_id"  type="hidden" class="form-control" value="<?php echo $productDetail['product_id']; ?>"/>
            <span id="notesInfo"></span>
        
        <div>
            <label for="notes">Notes</label>
            <input id="notes" name="notes" type="text" class="form-control" value="<?php echo $productDetail['notes']; ?>"/>
        </div>
        <div>
            <label for="quantity">Quantity</label>
            <input id="quantity" name="quantity" type="text" class="form-control" value="<?php echo $productDetail['quantity']; ?>"/>
             </div>
             <div>
            <label for="description">Description</label>
            <input id="description" name="description" type="text" class="form-control" value="<?php echo $productDetail['description']; ?>"/>
            </div>
            <br />
       <button id="add" class="btn btn-large btn-success" name="add" type="submit"> <?php echo ($isEditing ? "Update" : "Add"); ?></button>
        </form>
  </div>
  </div>
  
        
       <?php include 'templates/order_history.php';?>