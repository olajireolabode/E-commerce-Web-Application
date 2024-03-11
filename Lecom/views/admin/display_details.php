<!-- views/admin/display_details.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <!-- Include any necessary styles or scripts for displaying product details -->
</head>
<body>
    <h1>Product Details</h1>

    <!-- Display product details -->
    <table border="1">
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= $product['product_id'] ?></td>
                    <td><?= $product['product_name'] ?></td>
                    <td><?= $product['product_description'] ?></td>
                    <td><?= $product['product_price'] ?></td>
                    <td><?= $product['product_quantity'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Example: Link to go back to the admin dashboard -->
    <p><a href="index.php?controller=admin&action=dashboard">Go back to Admin Dashboard</a></p>
</body>
</html>
