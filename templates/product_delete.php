<head>
<?php 
include 'menu_bar.html';
require_once 'DAL/PDOConnection.php';
?>
    <title>Product & location Search</title>
   
</head>
<div id="container">
<div id="inner_container">
<form action="product_delete.php" method="post" id="Search" >
 	<h1>Product Search</h1>
		Search Product: <input type="text" name="search_product" tabindex="1" />
		<input type="submit" name="submit" value="Search" />
		<input type="hidden" name="doSearch" value="1">
</form>
</div>
</div>
<?php
if(isset($_POST['doSearch'])){
	
	if($_POST['doSearch']==1)
		{
			$productDal = new products;
			$Search = $_POST['search_product'];
			$Search = $productDal->search($Search);
		}
	
}
else{die;}	
?>


<?php //if (!isset($Search) || !$Search) { ?>
        <div id="container">
        <div id="inner_container">
<h1>Search Results</h1>
<form method="POST" action="send.php">
    <table width="100%" class="listing_table">   
        <?php foreach ($Search as $result){?>
      <thead style="text-align:left">
        <tr class="heading"</tr>
        	<tr><th style="font-weight:normal">Product:&nbsp;
            	<strong style="color:#00F"><?php echo $result['product'];?></strong></th></tr>
           <tr> <th style="font-weight:normal">Location:&nbsp;
            	<strong style="color:#00F"><?php echo $result['location'];?></strong></th></tr>
           <tr> <th style="font-weight:normal">Notes:&nbsp;
		   		<strong style="color:#00F"><?php echo $result['notes'];?></strong></th></tr>
           <tr> <th style="font-weight:normal">Quantity: &nbsp;
		  		<strong style="color:#00F"><?php echo $result['quantity'];?></strong></th></tr>
           <tr> <th style="font-weight:normal">Last Ordered: &nbsp;
		   		<strong style="color:#00F"><?php echo $result['last_ordered'];?></strong></th></tr>
           <tr><td>
		   
		   <?php if ($result['location'] == 0){
			   echo "<a href='product_detail.php?l_id=".$result['product']."'>Add</a> |";}
			   else{
				   echo "<a href='product_detail.php?id=".$result['id']."'>Edit</a> |";
				   } ?>
            <a href="delete.php?delete_product=<?php echo $result['product'];?>">Delete</a> | 
           
           	</tr>
            
            </tr>
            

 <?php			
		}
?>
</thead>  
          </div>
          </div>
 </tbody>
          </table>
          </form>
<?php //} // if (!isset($Search) || !$Search) ?>