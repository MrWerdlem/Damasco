<?php include 'menu_bar.html' ?>
<?php
include_once('DAL/PDOConnection.php');
$productDal = new product();

if(isset($_GET['delete'])){
    $productDal->deleteProduct($_GET['delete']);
    header("Status: 200");
    header("Location: productList.php");
}
?>
<br />

            <a href="add_location.php?add"><img src="images/location.png" style="width:100px; height:40px "></a>
        


    <title>List of Products</title>
 
</head>
<body>

<div id="container">
<div id="inner_container">
    <h1>List All Products</h1>

    <table width="100%" class="listing_table">
        <thead>
        <tr class="heading">
            <th>Location</th>
            <th>Product</th>
            <th>notes</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php
    $get_all_products = $productDal->getProducts();
    foreach ($get_all_products as $result)
    {

        ?>
        <tr>
            <td><?php echo $result['location'];?></td>
            <td><?php echo $result['product'];?></td>
            <td><?php echo $result['notes'];?></td>
            <td>
                <a href="product_detail.php?id=<?php echo $result['id'];?>">Edit</a>
            </td>
            <td>
                <a href="productList.php?delete=<?php echo $result['id']; ?>">Delete</a>
            </td>
        </tr>
        <?php
	}
    ?>
   
</tbody>
</table>
</div>
</div>
</body>
</html>