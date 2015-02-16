<?php require_once('DAL/Production_PDOConnection.php');

$productDal = new products();

if (isset($_POST['post'])){
if ($_POST['add'] > 0){
	$id = $_POST['add'];
	$date = date('d-m-Y');
	$product_id = $_GET['product'];
	$qty = $_POST['add'];
	$id = $productDal->stock_In($date, $product_id, $qty);
	}
	else{
		if($_POST['subtract']> 0){
		$id_out = $_POST['subtract'];
	$date = date('d-m-Y');
	$product_id = $_GET['product'];
	$qty_out = $_POST['subtract'];
	$id_out = $productDal->stock_Out($date, $product_id, $qty_out);
		}
	} 
}


if (!isset($_GET['product'])){
	
	die('please select a product');
	
	}
else {
	$product = $_GET['product'];
	}
	
	$product = $productDal->GetProductDetails($product)
?>



<?php foreach ($product as $Result){?>
<form  method="post">
        <input id="product_id" name="product_id" type="hidden" value="<?php echo $Result['product_id'];?>" />
        
        <div style="width:49%; float:left; text-align:center">
     <label for="add">Add</label>
        <input id="add" name="add" type="text" autocomplete="off" class="form-control"/> 
        </div>
        <div style="width:49%; float:right; text-align:center">
        <label for="subtract">Subtract</label>
        <input id="subtract" name="subtract" type="text" autocomplete="off" class="form-control" />
      </div>    
   
       <span id="notesInfo"></span> 
       
<?php }?>
<br />
<button type="submit" id="post" name="post" class="btn btn-primary">Post</button>
</form>
