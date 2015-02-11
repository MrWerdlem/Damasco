<head>
    <title>Add New Product</title>
    </head>
<body>
<?php include_once('DAL/PDOConnection.php');



	   
	   ?>
<div id="container">
<div id="inner_container">
    <h1>Add New Product</h1>
    <form method="post" id="productDetail">
        <div>
            <label for="product">Product</label>
            <input id="product" name="product" type="text" />
            <span id="notesInfo"></span>
        </div>
        <div>
            <label for="notes">Notes</label>
            <input id="notes" name="notes" type="text" />
        </div>
        <div>
            <label for="quantity">Quantity</label>
            <input id="quantity" name="quantity" type="text" />
             </div>
             <div>
            <label for="description">Description</label>
            <input id="description" name="description" type="text" />
            </div>
        <a href="?action=update" id="add" name="add" class="btn btn-large btn-primary" >Add</a>
        </form>
        </div>
        </div>
        
     <?php   if(isset($_POST['add'])){
	
$product = $_POST['product'];
$notes = $_POST['notes'];
$quantity = $_POST['quantity'];
$description = $_POST['description'];

$productDal = new products();  

$add_product = $productDal->AddProduct($product, $notes, $quantity, $description);
//header("location: index.php");
}?>

</body>
</html>