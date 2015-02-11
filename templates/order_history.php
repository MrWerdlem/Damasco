<?php 
//include_once('DAL/PDOConnection.php');

$productDal = new products();
if ($_GET['p_id'] == ''){
	$id = $_GET['id'];
	$id = $productDal->GetProducts($id);
	foreach ($id as $result){
		$id = $result['product_id'];
		}
	}

else
{
$id = $_GET['p_id'];
}

?>

<div class="panel panel-primary" style="width:24%; float:left; margin-left:13px">
<div class="panel-heading" style="text-align:center"><h3>Order History</h3></div>
<div class="panel-body" style="margin-bottom:-34px" >

<div>
  <?php		
			$p_id = $productDal->get_history($id); ?>
<table class="table" style="text-align:center">
<thead><tr class="heading">
<th style="text-align:center"> Date Ordered</th>
        
			<?php echo '<tr>';
		foreach($p_id as $result){?>
            <td><?php echo $result['date']; ?></td>
           </tr></thead>
            <span id="notesInfo"></span>
     
      
    
       
<?php }echo '</table></div></div></div>'?>
