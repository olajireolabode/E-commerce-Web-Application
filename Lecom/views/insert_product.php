<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product</title>
</head>
<body>
    <h1>Insert a New Product</h1>
    <form action="index.php?controller=product&action=insert" method="post" enctype="multipart/form-data">
        <label for="productName">Product Name:</label>
        <input type="text" name="productName" required><br>

        <label for="productDescription">Product Description:</label>
        <textarea name="productDescription" required></textarea><br>

        <label for="productImage">Product Image:</label>
        <input type="file" name="productImage" accept="image/*" required><br>

        <label for="productPrice">Product Price:</label>
        <input type="number" name="productPrice" required><br>

        <label for="productQuantity">Product Quantity:</label>
        <input type="number" name="productQuantity" required><br>

        <button type="submit">Insert Product</button>
    </form>

    <!-- Example: Link to go back to the admin dashboard -->
    <p><a href="index.php?controller=admin&action=dashboard">Go back to Admin Dashboard</a></p>    
</body>
</html>
