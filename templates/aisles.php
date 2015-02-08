<?php
require_once('./DAL/PDOConnection.php');
$productDal = new products;
?>
  <title>Racking</title>
      
<div class="panel panel-primary">
<div class="panel-heading" style="text-align:center; font-size:15px">Select Aisle Number</div>
<div class="panel-body">
<div style="text-align:center">
<a href="?action=aisles&Aisle=2" class="btn btn-large btn-info">Aisle 2</a>
<a href="?action=aisles&Aisle=3" class="btn btn-large btn-info">Aisle 3</a>
<a href="?action=aisles&Aisle=4" class="btn btn-large btn-info">Aisle 4</a>
<a href="?action=aisles&Aisle=5" class="btn btn-large btn-info">Aisle 5</a>
<a href="?action=aisles&Aisle=6" class="btn btn-large btn-info">Aisle 6</a>
<a href="?action=aisles&Aisle=7" class="btn btn-large btn-info">Aisle 7</a>
<a href="?action=aisles&Aisle=8" class="btn btn-large btn-info">Aisle 8</a>
</div>
 <input type="hidden" name="Aisle2" value="2">
</div></div>

<?php
  $Aisle = $_GET['Aisle']; ?>
  
<div class="panel panel-info" style="width:60%; float:left">
  <!-- Default panel contents -->
  <div class="panel-heading" style="text-align:center; font-size:18px">Aisle No: <?php echo $Aisle; ?></div>
  
   

    <table class="table">
        <thead>
        <tr class="heading">
            <th>Location</th>
            <th>Product</th>
            <th></th>
            <th></th>
           <th></th>
        </tr>
        </thead>
        <tbody>
        <?php
	$Aisles = $productDal->GetAisle($Aisle);	
    foreach ($Aisles as $result)
    {
		?>
        <tr>
            <td><a href="edit_location.php?id=<?php echo $result['id']; ?>" style='color:black'><?php echo $result['location'];?></a></td>
            <td><?php echo $result['product'];?></td>
            <td>
            <?php if ($result['product'] > null){ ?>
               
            <a href="?action=update_product&id=<?php echo $result['product']; ?>&p_id=<?php echo $result['product_id'];?>">Details</a>
            </td>
            
            <td>
                <a href="?action=delete&delete=<?php echo $result['id']; ?>">Delete</a>
            </td>
            
            <?php } else{
				echo
				"<td><a href='?action=add_product&id=". $result['id']."'>Insert</a></td>
				";
				}?>
            
        </tr>
        <?php
	}
	
	?>
    
   
</tbody>
</table>
</div>

<?php include 'empty_Location.php';