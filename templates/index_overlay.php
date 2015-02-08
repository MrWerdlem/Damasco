<?php 
include 'menu_bar.html';
require_once 'DAL/PDOConnection.php';
?>
    <title>Product & location Search</title>
<div id="container">
<div id="inner_container">
<form action="index.php" method="post" id="Search" >
 	<h1>Product Search</h1>
    <div id="search" style="text-align:center">
		 <input type="text" class="txt_box" name="search_product" tabindex="1"/></br>
		<input type="submit" name="submit" value="Search" />
		<input type="hidden" name="doSearch" value="1">
        </div>
</form>
<br />
<form action="index.php" method="post" id="Search" >
	<h1>Location/Notes Search</h1>
    <div id="search" style="text-align:center">
		<input type="text" class="txt_box" name="search_location" tabindex="2" /></br>
		<input type="submit" name="submit" value="Search" />
		<input type="hidden" name="doSearch" value="2">
        </div>
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
	elseif($_POST['doSearch']==2)
		{
			$productDal = new products;			
			$Search = $_POST['search_location'];	
			$Search = $productDal->SearchLocation($Search);
}



?>


<?php if (!isset($_POST['doSearch']) || $_POST['doSearch']) { ?>
        <div id="container">
        <div id="inner_container">
<h1>Search Results</h1>
<form method="POST" action="send.php">
    <table width="100%" class="listing_table">   
        <?php foreach ($Search as $result){?>
      <thead style="text-align:left">
        <tr class="heading"</tr>
        	
            <tr><th style="font-weight:normal">Product:&nbsp;
            	<strong style="color:#00F"><?php echo $result['product'];?></strong> 
                &nbsp;
				<?php 
				//PRODUCT EDIT AND LOCATION ASSIGN
				if ($result['product'] == null){ echo("<a href='add_product.php?id=".$result['id']."'>Add</a></th></tr>");}
				
				elseif ($result['location']>0){ 
				echo "<a href='update_product.php?id=".$result['product']."' >edit</a></th></tr>";}
				
				else
				{echo "<a href='product_detail.php?l_id=".$result['product']."'>assign</a></th></tr>";}
				
				?>
          
           <tr> <th style="font-weight:normal">Location:&nbsp;
            	<strong style="color:#00F"><?php echo $result['location'];?></strong> 
                &nbsp;
				<?php 
				// lOCATION ADD PRODUCT AND ASSIGN PRODUCT
				if ($result['id']>0){ 
				echo "<a href='add_product.php?id=".$result['id']."'>edit</a></th></tr>";}
				else{ 
				echo "<a href='product_detail.php?l_id=".$result['product']."'>assign</a> ";
				}
				?>           
           
           <tr> <th style="font-weight:normal">Notes:&nbsp;
		   		<strong style="color:#00F"><?php echo $result['product'];?></strong></th></tr>
           
           <tr> <th style="font-weight:normal">Quantity: &nbsp;
		  		<strong style="color:#00F"><?php echo $result['quantity'];?></strong></th></tr>
                
         <tr> <th style="font-weight:normal">Description: &nbsp;
		  		<strong style="color:#00F"><?php echo $result['description'];?></strong></th></tr>
           
           <tr> <th style="font-weight:normal">Last Ordered: &nbsp;
		   		<strong style="color:#00F"><?php echo $result['last_ordered'];?></strong></th></tr>
           
           <tr><td>
		   
		  
            <a href="delete.php?delete=<?php echo $result['id'];?>">Delete</a> | 
           <a href="send.php?product=<?php echo $result['product']; ?>">Order</a>
           	
<?php			
		}
}
?>
</tr>
            </td>
            </table>
          </form>
</thead>  
</tbody>
</div>
</div>

          
<?php } // if (!isset($Search) || !$Search) ?>