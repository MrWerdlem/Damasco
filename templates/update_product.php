<?php

include 'search.php';

require_once('DAL/PDOConnection.php');

$productDal = new products();


$id = $_GET['id'];
$p_id = $_GET['p_id'];

if(isset($_POST['update'])){
    //form submitted
    $product = $_POST['product'];
    $notes = nl2br($_POST['notes']);
	$quantity = nl2br($_POST['quantity']);
	$description = nl2br($_POST['description']);
	

        //update Product
        $productDal->UpdateProduct($id,$product,$notes,$quantity,$description);
		header("location:?action=update_product&id=".$product."&p_id=".$p_id);
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
        <label for="description">Description</label>
        <textarea id="description" name="description" type="text" class="form-control" rows="1"><?php echo  str_replace('<br />','',$productDetail['description']); ?></textarea>
      </div>
      <div>
        <label for="last_ordered">Last Ordered</label>
        <input id="last_ordered" name="last_ordered" type="text" class="form-control" readonly="readonly" value="<?php echo $productDetail['last_ordered']; ?>"/>
      </div>
      <div>
        <label for="quantity">Quantity</label>
        <textarea id="quantity" name="quantity" type="text" class="form-control" rows="1"><?php echo str_replace('<br />',"", $productDetail['quantity']);?></textarea>
      </div>
      <div>
        <label for="notes">Notes</label>
        <textarea id="notes" name="notes" type="text" class="form-control" rows="8"><?php echo str_replace('<br />',"", $productDetail['notes']); ?></textarea>
      </div>
      <br/>
       <button id="update" class="btn btn-large btn-primary" name="update" type="submit">Update</button>
       <a href="?action=send&product=<?php echo $productDetail['product'];?>&id=<?php echo $productDetail['product_id'];?>" class="btn btn-large btn-primary">Order</a>
    </form>
  </div>
<?php }?>
</div>

<?php
include 'location_list.php';
include 'update_location.php';
include 'order_history.php'; 


