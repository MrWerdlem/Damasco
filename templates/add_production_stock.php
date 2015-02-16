<head>
    <title>Add New Product</title>
    </head>
<body>
<?php include_once('DAL/Production_PDOConnection.php');
$productDal = new products(); 
	   ?>
<div class="panel panel-primary" style="width:35%; float:left">
<div class="panel-heading" style="text-align:center;"><h3>Add Product</h3></div>
<div class="panel-body">
    <form method="post" id="add">
        <div>
            <label for="product">Product</label>
            <input id="product" name="product" class="form-control" type="text" />
            <span id="notesInfo"></span>
        </div>
      <br />
     <div>
            <label for="customer">Customer</label>
            <select id="customer" name="customer" class="form-control" type="text">
            <?php $id = $productDal->GetCustomer($id);	  
			 foreach ($id as $result){ ?>
            <option id="customer"><?php echo $result['customer_name'];?>
            </option>
            <?php }?>
            </select>
            <span id="notesInfo"></span>
        </div>
       <br />
        <div>
            <label for="details">Details</label>
            <textarea id="details" class="form-control" name="details" type="text"></textarea>
             </div>
             <br />
        <button type="submit" class="btn btn-primary" name="add" >Add</button>
        </form>
        </div>
        </div>
        
     <?php   if(isset($_POST['add'])){
		 
		 $id = $_POST['customer'];
		 
		 $id = $productDal->GetCustomerID($id);
		 foreach ($id as $customer)
		 
			
$product = strtoupper($_POST['product']);
$customer = $customer['customer_id'];
$details = $_POST['details'];


//$productDal = new products();  

$add_product = $productDal->AddProduct($product, $customer, $details);

}

include 'add_customer.php';?>

</body>
</html>