<?php 
include 'menu_bar.html';
include_once('DAL/PDOConnection.php');
$productDal = new products()

?>
<title>List of Empty Locations</title>
</head>
<body>

<div id="container" style="">
<div id="inner_container">
    <h1>List All Empty Locations</h1>
<?php
    $getEmptyLocations = $productDal->EmptyLocations();
      ?>
    <table width="40%" class="listing_table">
        <thead>
        <tr class="heading">
            <th>Location</th>
            <th>Edit</th>
            
        </tr>
        </thead>
        <tbody>
        <?php foreach ($getEmptyLocations as $result)
    { ?>
        <tr>
            <td><?php echo $result['location'];?></td>
            <td>
                <a href="add_product.php?id=<?php echo $result['id'];?>"><img src='Css/images/edit.png' style='width:22px; height:20px' /></a>
            </td>
            
        </tr>
        <?php


    }
    ?>
    <tr>
            
        </tr>
</tbody>
</table>
</div>
</div>
</body>
</html>