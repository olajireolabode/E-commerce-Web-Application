<!-- views/admin/edit_product.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <!-- Include any necessary styles or scripts -->
</head>
<body>
    <h2>Edit Product</h2>

    <form action="index.php?controller=product&action=updateProduct" method="post">
        <input type="hidden" name="product_id" value="<?php echo $existingProduct['product_id']; ?>">
        
        <label for="product_name">Name:</label>
        <input type="text" id="product_name" name="product_name" value="<?php echo $existingProduct['product_name']; ?>" required>
        <br>
        <label for="product_description">Description:</label>
        <textarea id="product_description" name="product_description" required><?php echo $existingProduct['product_description']; ?></textarea>
        <br>
        <label for="product_price">Price:</label>
        <input type="number" id="product_price" name="product_price" value="<?php echo $existingProduct['product_price']; ?>" required>
        <br>
        <label for="product_quantity">Quantity:</label>
        <input type="number" id="product_quantity" name="product_quantity" value="<?php echo $existingProduct['product_quantity']; ?>" required>
        <br>
        <button type="submit" name="update_product">Update Product</button>
    </form>

    <p><a href="index.php?controller=product&action=displayDetails">Back to Product Details</a></p>

</body>
</html>
