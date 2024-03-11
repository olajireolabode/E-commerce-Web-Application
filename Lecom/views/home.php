<!-- views/home.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<style>
        /* Apply custom styles for body and html */
        body, html {
            background-color: #ADD8E6;
            color: navy;
        }
    </style>
<body>

    <!-- Bootstrap Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php?controller=home&action=index">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <?php if (!isset($_SESSION['user'])) {?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?controller=user&action=login">Login</a>
                </li>
                <?php } ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?controller=home&action=contactUs">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?controller=home&action=aboutUs">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?controller=home&action=otherServices">Other Services</a>
                </li>
                <?php if (isset($_SESSION['user'])) {?>                
                <li class="nav-item">
                    <a class="nav-link" href="index.php?controller=cart&action=viewCart">Cart</a>
                </li>
                <?php } ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?controller=home&action=bmiCalculator">BMI Calculator</a>
                </li>
                <li class="nav-item">
                    <!-- If the user is login in, show the logout button -->
                    <?php if(isset($_SESSION['user']))  { ?>
                    <a class="nav-link" href="logout.php">Logout</a>
                        <?php } ?>
                </li>
            </ul>

            <!-- Search Form -->
            <form class="form-inline ml-auto" method="GET" action="index.php">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search" style="background-color: lightgrey; border: 2px solid navy;">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <!-- Dropdown menu for sorting -->
<form id="sortForm" class="mt-3">
    <label for="sortOrder">Sort by:</label>
    <select name="sortOrder" id="sortOrder" class="form-control" style="width: 150px; border: 2px solid navy; background-color: lightgrey;">
        <option value="default">Default</option>
        <option value="alphabetical">Alphabetical</option>
        <option value="price_asc">Price Ascending</option>
        <option value="price_desc">Price Descending</option>
        <option value="original">Original</option>
    </select>
</form>

    <?php 
    if (isset($_GET['sort']) && $_GET['sort'] === 'alphabetical') {
    // Sort products alphabetically by product name
    usort($products, function($a, $b) {
        return strcmp($a['product_name'], $b['product_name']);
    }); 
    }

    if (isset($_GET['sort'])) {
        $sortOrder = $_GET['sort'];
        if ($sortOrder === 'alphabetical') {
            // Sort products alphabetically by product name
            usort($products, function($a, $b) {
                return strcmp($a['product_name'], $b['product_name']);
            });
        } elseif ($sortOrder === 'price_asc') {
            // Sort products by price in ascending order
            usort($products, function($a, $b) {
                return $a['product_price'] - $b['product_price'];
            });
        } elseif ($sortOrder === 'price_desc') {
            // Sort products by price in descending order
            usort($products, function($a, $b) {
                return $b['product_price'] - $a['product_price'];
            });
        }
        // 'original' option will not perform any sorting, as it will display the original order
        // You can include logic here to restore the original order if needed
    }

    ?>


    <!-- Product Container -->
    <div class="product-container">
        <?php foreach ($products as $product): ?>
            <div class="product">
                <img src="images/<?php echo $product['product_image']; ?>" alt="<?php echo $product['product_name']; ?>">
                <h2><?php echo $product['product_name']; ?></h2>
                <p><?php echo $product['product_description']; ?></p>
                <p>Price: $<?php echo $product['product_price']; ?></p>
                <p>Available Quantity: <?php echo $product['product_quantity']; ?></p>

                <!-- "Add to Cart" button for each product -->
                <form action="index.php?controller=cart&action=addProduct" method="post">
                    <input type="hidden" name="productId" value="<?php echo $product['product_id']; ?>">
                    <input type="number" name="quantity" value="1" min="1">
                    <?php if(isset($_SESSION['user']))  { ?>
                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                    <?php } ?>
                </form>
                <br>
                <a href="index.php?controller=comment&action=viewComments&product_id=<?php echo $product['product_id']; ?>" class="btn btn-primary">View Comments</a>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Link to Bootstrap JS (Optional: Required for dropdowns, toggles, etc.) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
    // JavaScript function to handle form submission and sorting
    document.getElementById('sortForm').addEventListener('change', function() {
        let sortOrder = document.getElementById('sortOrder').value;

        // Redirect to the current URL with sorting parameter
        window.location.href = window.location.pathname + '?sort=' + sortOrder;
    });
    </script>

    <script>
        document.getElementById('sortForm').addEventListener('change', function() {
        let sortOrder = document.getElementById('sortOrder').value;
        if (sortOrder === 'default') {
            window.location.href = window.location.pathname; // Go to default page URL
        } else {
            window.location.href = window.location.pathname + '?sort=' + sortOrder;
        }
    });
    </script>

<script>
    document.getElementById('sortForm').addEventListener('change', function() {
        let sortOrder = document.getElementById('sortOrder').value;
        if (sortOrder === 'default') {
            window.location.href = window.location.pathname; // Go to default page URL
        } else {
            window.location.href = window.location.pathname + '?sort=' + sortOrder;
        }
    });
</script>

</body>
</html>
