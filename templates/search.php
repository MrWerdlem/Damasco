<?php 
require_once './DAL/PDOConnection.php';
?>
<style>
.home {
	background-color: #e5e5e5;
	box-shadow: 0 3px 8px rgba(0, 0, 0, 0.125) inset;
	color: #555;
	text-decoration: none;
}
.panel-success {
	width:49%;
}
</style>

  <div class="panel panel-success" style="float:left">
    <div class="panel panel-heading">
      <h3 style="text-align:center">Product Search</h3>
    </div>
    <div class="panel-body">
      <form action="index.php" method="post" id="Search">
        <div id="search" style="text-align:center">
          <input type="text" style="margin-bottom:10px" class="txt_box" name="search_product" tabindex="1"/>
          <br />
          <button type="submit" class="btn btn-large btn-success" name="submit">Search</button>
          <input type="hidden" name="doSearch" value="1">
        </div>
      </form>
    </div>
  </div>
  <div class="panel panel-success" style="float:right">
    <div class="panel panel-heading">
      <h3 style="text-align:center">Location / Notes Search</h3>
    </div>
    <div class="panel-body">
      <form action="index.php" method="post" id="Search" >
        <div id="search" style="text-align:center">
          <input type="text" style="margin-bottom:10px" class="txt_box" name="search_location" tabindex="2">
          <br />
          <button type="submit" class="btn btn-large btn-success" name="submit" value="Search">Search</button>
          <input type="hidden" name="doSearch" value="2">
        </div>
      </form>
    </div>
  </div>



<?php
if(isset($_POST['doSearch'])){
	
	if($_POST['doSearch']==1)
		{
			if ($_POST['search_product'] == ""){ die ('<div class="alert alert-danger" role="alert" style="float:left; width:100%; text-align: center">Oops, it would appear you have not entered a product to searh for!! <br />Please try again!</div>');}else{
			$productDal = new products;
			$Search = $_POST['search_product'];
			$Search = $productDal->search($Search);
			foreach($Search as $Result){
				
				$id = $Result['product'];
				$p_id = $Result['product_id'];
			header("location:?action=update_product&id=".$Result['product']."&p_id=".$Result['product_id']);
			//include 'update_product.php';
		}
		}
		}
	elseif($_POST['doSearch']==2)
		{
			$productDal = new products;			
			$Search = $_POST['search_location'];	
			$Search = $productDal->SearchLocation($Search);
}



?>
<?php if (!isset($_POST['doSearch']) || $_POST['doSearch']) { ?>
<div class="panel panel-primary" style="width:100%; float:left">
<div class="panel panel-heading"><h3>Search Results</h3></div>
<div class="panel-body" style="margin-top:-20px">
<?php foreach ($Search as $result){ 
	  echo "<div style='border-bottom: 1px dashed #777; padding-bottom:5px; margin-bottom:10px; width:100%; float:left'> "?>
      
      <div class="alert alert-info" role="alert" style="width:40%; float:right; height:85px; font-size:46px; color:#C00; text-align:center"><?php echo $result['location'];?></strong></div>
 

<p>Product: <a href="?action=update_product&id=<?php echo $result['product']; ?>&p_id=<?php echo $result['product_id']; ?>"><?php echo $result['product'];?></a>

  <?php 
				//PRODUCT EDIT AND LOCATION ASSIGN				
				if ($result['product'] == null){ echo("<a href='?action=add_product&id=".$result['id']."'>Add</a>");}				
				elseif ($result['location']<0){ 
				echo "<a href='?action=product_detail&l_id=".$result['product']."'style='color:red'>assign</a>";}				
				?>
  &nbsp; | &nbsp;
  Location: <?php echo $result['location'];?></strong>
  <?php 
				// lOCATION ADD PRODUCT AND ASSIGN PRODUCT
				if ($result['id']>0){ 
				echo "<a href='?action=add_product&id=".$result['id']."'>Assign</a>";}
				else{ 
				//echo "<a href='?action=product_detail&l_id=".$result['product']."'style='color:red'>assign</a> ";
				}
				?>
</p>
<p>Last Ordered: <?php echo $result['last_ordered']?></p>
<p>Notes: <?php echo $result['description']?></p>

<?php 
if(!$result['product']){
	die;
	}
 
if (!$result['location']){
	echo "<a href='?action=delete&delete_product=".$result['product']."'>Delete Product</a>";
	}
else

echo '<a href="?action=delete&delete='.$result['id'].'">Delete</a>';?>
| <a href="?action=test_send&product=<?php echo $result['product'];?>&id=<?php echo $result['product_id'];?>">Order</a>
<?php if ($result['product']>0){ 
  echo "| <a href='?action=update_product&id=".$result['product']."&p_id=". $result['product_id']."'>Details</a>";}
  
  else{
	 
	 
 }
			echo '</div>';		
		}
	
}
}

?>

