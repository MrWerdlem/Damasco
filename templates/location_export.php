<?php
error_reporting(null);
include_once 'DAL/PDOConnection.php';
$productsDAL = new products;
?>
<form method="get" action="location_export.php" >
<button type="submit" name="Aisle" value="2">Aisle 2</button> 
<button type="submit" name="Aisle" value="3">Aisle 3</button> 
<button type="submit" name="Aisle" value="4">Aisle 4</button> 
<button type="submit" name="Aisle" value="5">Aisle 5</button>
<button type="submit" name="Aisle" value="6">Aisle 6</button> 
<button type="submit" name="Aisle" value="7">Aisle 7</button> 
<button type="submit" name="Aisle" value="8">Aisle 8</button>
</form>
<?php


$loc = $_GET['Aisle'];
$aisles = $productsDAL->exportLocation($loc);
return $aisles;
header("Content-Type: application/csv");
