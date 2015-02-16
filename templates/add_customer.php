<head>
    <title>Add Customer</title>
    </head>
<body>
<?php include_once('DAL/Production_PDOConnection.php');
$productDal = new products(); 
	   ?>
<div class="panel panel-primary" style="width:35%; float:left; margin-left:13px">
<div class="panel-heading" style="text-align:center;"><h3>Add Product</h3></div>
<div class="panel-body">
    <form method="post" id="add">
        <div>
            <label for="customer">Customer Name</label>
            <input id="customer" name="customer" class="form-control" type="text" />
            <span id="notesInfo"></span>
        </div>
        <br />
         <button type="submit" class="btn btn-primary" name="add_customer" >Add</button>
        </form>
        </div>
        </div>
        
     <?php 
	 if(isset($_POST['add_customer'])){  		 

$customer = strtoupper($_POST['customer']);

//$productDal = new products();  

$add_customer = $productDal->AddCustomer($customer);
	 }?>

</body>
</html>