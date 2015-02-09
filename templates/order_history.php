<?php 
include_once('DAL/PDOConnection.php');

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

<div class="panel panel-primary" style="width:49%; float:right;">
<div class="panel-heading" style="text-align:center"><h3>Order History</h3></div>
<div class="panel-body" >

<div>
            <?php		
			$p_id = $productDal->get_history($id);
			
		foreach($p_id as $result){?>
            <p style="text-align:center;"><?php echo $result['date']; ?></p>
            <span id="notesInfo"></span>
     
      
    
       
<?php }echo '</div></div>'?>