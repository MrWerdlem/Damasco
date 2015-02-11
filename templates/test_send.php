 <?php

 require_once 'DAL/PDOConnection.php';
 $productDal = new products();
$id=$_GET['id'];


 // Sets Date Ordered Field
 if(isset($_GET['product'])){
	date_default_timezone_set('UTC');
	$today = date('d-m-Y');
    $productDal->order($_GET['product'], $today);
	$productDal->order_history($id, $today);	
		
				echo "<div class='panel panel-danger'>
<div class='panel-heading' style='text-align:center;'><h3>Order Failure</h3></div>
<div class='panel-body'>
				'Please will you kindly order '".$_GET['product'];
			}
				echo $id;
		
			
			
	
		
 ?>
			