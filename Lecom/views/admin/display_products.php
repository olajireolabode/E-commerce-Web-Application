<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Details</title>
    <link rel="stylesheet" href="css/displayproducts.css"> <!-- Include the CSS file -->
</head>
<body>

    <h2>Products Details</h2>

    <!-- Button to add a new product -->
    <p class="add-button"><a href="index.php?controller=product&action=insertForm">Add New Product</a></p>

    <!-- Display products data in a table -->
    <table class="product-table">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Action</th>
        </tr>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo $product['product_id']; ?></td>
                <td><?php echo $product['product_name']; ?></td>
                <td><?php echo $product['product_description']; ?></td>
                <td><?php echo $product['product_price']; ?></td>
                <td><?php echo $product['product_quantity']; ?></td>
                <td>
                    <a href="index.php?controller=product&action=editProductForm&id=<?php echo $product['product_id']; ?>" class="edit-link">Edit</a>
                    <a href="index.php?controller=product&action=deleteProduct&id=<?php echo $product['product_id']; ?>" class="delete-link">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <!-- Go back to Admin Dashboard link -->
    <p class="back-button"><a href="index.php?controller=admin&action=dashboard">Back</a></p>
</body>
</html>
