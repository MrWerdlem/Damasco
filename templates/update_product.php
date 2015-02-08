<?php

require_once('DAL/PDOConnection.php');

$productDal = new products();


$id = $_GET['id'];

if(isset($_POST['add'])){
    //form submitted
    $product = $_POST['product'];
    $notes = $_POST['notes'];
	$quantity = $_POST['quantity'];
	$description = $_POST['description'];
	

        //update Product
        $productDal->UpdateProduct($id,$product,$notes,$quantity,$description);
		header("location: index.php");
}
	

    $id = $productDal->GetProducts($id);
	foreach($id as $productDetail){

	
		
?>

   <div class="panel panel-primary" style="width:49%; float:left">
<div class="panel-heading" style="text-align:center;"><h3>Product Details</h3></div>
<div class="panel-body">
    <form method="post" id="?action=productDetail">
      <div>
        <label for="product">Product</label>
        <input id="product" name="product" type="text" class="form-control" value="<?php echo $productDetail['product']; ?>"/>
        <span id="notesInfo"></span> </div>
      <div>
        <label for="notes">Notes</label>
        <input id="notes" name="notes" type="text" class="form-control" value="<?php echo $productDetail['notes']; ?>"/>
      </div>
      <div>
        <label for="notes">Last Ordered</label>
        <input id="last_prdered" name="last_ordered" type="text" class="form-control" readonly="readonly" value="<?php echo $productDetail['last_ordered']; ?>"/>
      </div>
      <div>
        <label for="quantity">Quantity</label>
        <input id="quantity" name="quantity" type="text" class="form-control" value="<?php echo $productDetail['quantity']; ?>"/>
      </div>
      <div>
        <label for="description">Description</label>
        <input id="description" name="description" type="text" class="form-control" value="<?php echo $productDetail['description']; ?>"/>
      </div>
      <br/>
       <button id="add" class="btn btn-large btn-primary" name="add" type="submit">Update</button>
    </form>
  </div>
<?php }?>
</div>

<?php 
include 'update_location.php';
include 'order_history.php';
