<head>
    <title>Add New Product</title>
    </head>
<body>
<?php 
include_once('./DAL/PDOConnection.php');
if(isset($_GET['search'])){
$new = $_GET['search'];
}
else
{
	$new = '';
	}
 ?>

 <div class="panel panel-primary">
<div class="panel panel-heading">
<h3>Add Product</h3></div>
<div class="panel-body">
    <form method="post" id="productDetail">
        <div>
            <label for="product">Product</label>
            <input id="product" class="form-control" name="product" type="text" value="<?php echo $new; ?>"/>
            <span id="notesInfo"></span>
        </div>
        <div>
            <label for="notes">Notes</label>
            <input id="notes" class="form-control" name="notes" type="text" />
        </div>
        <div>
            <label for="quantity">Quantity</label>
            <input id="quantity" class="form-control" name="quantity" type="text" />
             </div>
             <div>
            <label for="description">Description</label>
            <input id="description" class="form-control" name="description" type="text" />
            </div>
            <br/>
            <button type="submit" class="btn btn-primary" name="add" >Add</button>
       
        </form>
       </div>
        </div>
        
     <?php   if(isset($_POST['add'])){
	
$product = strtoupper($_POST['product']);
$notes = $_POST['notes'];
$quantity = $_POST['quantity'];
$description = $_POST['description'];

$productDal = new products();  

$add_product = $productDal->AddProduct($product, $notes, $quantity, $description);
//header("location: index.php");
}?>

</body>
</html>