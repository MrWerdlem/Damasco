
<?php
//include 'search.php';
require_once('DAL/Production_PDOConnection.php');

$productDal = new products();

$id = '';

$select = $productDal->GetCustomer($id);
?>

<div class="panel panel-primary" style="width:35%; float:left">
<div class="panel-heading" style="text-align:center;"><h3>Customer</h3></div>
<div class="panel-body">

<?php foreach ($select as $Result){?>
    <p> <a href="?action=production_stock&id=<?php echo $Result['customer_id'];?>" class="btn btn-large btn-primary"><?php echo $Result['customer_name']; ?></a></p>
<?php }?>
</div>
</div>

<div class="panel panel-primary" style="width:20%; float:left; margin-left:13px">
<div class="panel-heading" style="text-align:center;"><h3>Product</h3></div>
<div class="panel-body">

<?php 
if ($_GET['id'] == ''){
	
	die('please select a customer');
	
	}
else {
	$id = $_GET['id'];
	}
	
	$id = $productDal->GetProduct($id)
?>

<?php foreach ($id as $Result){?>

     <p><a href="?action=production_stock&id=<?php echo $Result['customer_id'];?>&product=<?php echo $Result['product_id'];?>" class="btn btn-large btn-primary"><?php echo $Result['product']; ?></a></p>
    
<?php }?>
</div>
</div>



<div class="panel panel-primary" style="width:40%; float:left; margin-left:13px">
<div class="panel-heading" style="text-align:center;"><h3>Product Details</h3></div>
<div class="panel-body">

<?php 

if (!isset($_GET['product'])){
	
	die('please select a product');
	
	}
else {
	$product = $_GET['product'];
	}
	
	$product = $productDal->GetProductDetails($product)
?>



<?php foreach ($product as $Result){?>
<div>
     <label for="product">Product</label>
        <input id="product" name="product" type="text" class="form-control" value="<?php echo $Result['product']; ?>"/>
        <span id="notesInfo"></span> </div>
     
      <div>
   
      
<?php }?>
</div>

<?php include 'updateStock.php';?>

<?php
if (!isset($_GET['product'])){
	
	die('please select a product');
	
	}
else 

{
	$product = $_GET['product'];
	}
	
	$product = $productDal->GetStockMovment($product)
?>




<div>
    <table class="table">
    <h4 style="text-align:center">Movment</h4>
    <tr class="heading">
    <td>Qty In</td>
    <td>Qty Out</td>
    <td>Date</td>
    </tr>
    <tr>
     <?php foreach ($product as $Result){?>
       <td><?php echo $Result['qty_in']?></td>
       <td><?php echo $Result['qty_out']?></td>
       <td><?php echo $Result['date']?></td>
       </tr>
        <span id="notesInfo"></span> </div>
      
      
<?php }?>




