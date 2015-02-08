<?php include 'menu_bar.html';

include_once('DAL/PDOConnection.php');

$productDal = new products();

$isEditing = isset($_GET['id']);

if(isset($_POST['add'])){
   		$location_id = $_POST['id'];
		$location = $_POST['location'];
        $productDal->update_location($location_id, $location);
		header("location: aisles.php?Aisle=2");
}

  $id = $_GET['id'];  
    $id = $productDal->GetLocation($id);{
		
foreach($id as $productDetail);
	
?>
<head>

    <title>Location Update</title>
    </head>
    
<body><div id="container">
<div id="inner_container">
    <h1>Location Update Centre</h1>
    <form method="post" id="productDetail"
          action="edit_location.php<?php echo ($isEditing ? "?id=$id" : ""); ?>">
        <div>
            <label for="location">Location</label>
            <input id="location" class="txt_box" name="location" type="text"  value="<?php echo $productDetail['location']; ?>"/>
            <input id="id" name="id"  readonly type="hidden"  value="<?php echo $productDetail['id']; ?>"/>
            <span id="productInfo"></span>
        </div>
        <input id="add" name="add" type="submit" value="<?php echo ($isEditing ? "Update" : "Add");} ?>"/>
        </form>
        
      