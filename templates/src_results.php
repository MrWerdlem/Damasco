<?php

include 'DAL/PDOConnection.php';
$product = new products;
$product_id = $_GET['product'];
$search = $product->getProductByProductId($product_id);
//$search = $_GET['product'];
//$search = $product->GetLocationById($search);

foreach($search as $result){
?>
<style>
#location_box div, #location_box img {
	width: 100%;
	height: 100%;
}
</style>
<p style="font-weight:bold; color: black">Product:&nbsp; <font style="color: #000; font-weight:normal"><?php echo $result['product'];?></font></p>
<p style="font-weight:bold; color: black">Notes:&nbsp; <font style="color:#000; font-weight:normal"><?php echo $result['notes'];?></font></p>
<p style="font-weight:bold; color: black">Quantity: &nbsp; <font style="color:#000; font-weight:normal"><?php echo $result['quantity'];?></font></p>
<p style="font-weight:bold; color: black">Description: &nbsp; <font style="color:#000; font-weight:normal"><?php echo $result['description'];?></font></p>
<p style="font-weight:bold; color: black">Last Ordered: &nbsp; <font style="color:#000; font-weight:normal"><?php echo $result['last_ordered'];?></font></p>
<div id="location_box" style="width:300px; height:130px; background-image:url(Css/images/aisle.png); background-size: 100% 100%; text-align:center"> 
  <!--<img src="Css/images/aisle.png" style="max-height:100%; max-width:100% position:absolute;left:0;top:0;" />-->
<p style="font-weight:normal;"> <strong style="color:#00F z-index:100;color:white;font-size:75px;font-weight:bold; vertical-align:middle; line-height:130px"><?php echo $result['location'];?></strong></p>
</div>
<?php }?>
