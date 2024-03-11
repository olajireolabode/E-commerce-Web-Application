<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>

    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Link to the external CSS file -->
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="css/Cart.css">


</head>

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
                <li class="nav-item">
                    <a class="nav-link" href="index.php?controller=cart&action=viewCart">Cart</a>
                </li>
                <li class="nav-item">
                    <!-- If the user is login in, show the logout button -->
                    <?php if(isset($_SESSION['user']))  { ?>
                    <a class="nav-link" href="logout.php">Logout</a>
                        <?php } ?>
                </li>
            </ul>
        </div>
    </nav>
    <section class="h-100" style="background-color: #eee;">
        <div class="container h-100 py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-10">

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
                    </div>

                    <?php foreach ($user_cart as $cart_item) : ?>
                        <div class="card rounded-3 mb-4">
                            <div class="card-body p-4">
                                <div class="row d-flex justify-content-between align-items-center">
                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                        <img class="img-fluid rounded-3" src="images/<?php echo $cart_item['product_image']; ?>" alt="<?php echo $cart_item['product_name']; ?>">

                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xl-3">
                                        <p class="lead fw-normal mb-2"><?php echo $cart_item['product_name']; ?></p>
                                        <p><span class="text-muted">
                                                <?php
                                                $description = $cart_item['product_description'];
                                                echo strlen($description) > 50 ? substr($description, 0, 50) . '...' : $description;
                                                ?>
                                            </span></p>
                                        <!-- <p><span class="text-muted">Size: </span>M <span class="text-muted">Color: </span>Grey</p> -->
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                        <button class="btn btn-link px-2" onclick="updateQuantity(-1,'form<?php echo $cart_item['pk']; ?>',<?php echo $cart_item['pk']; ?>,<?php echo $cart_item['product_price']; ?>)">
                                            <i class="fas fa-minus"></i>
                                        </button>

                                        <input id="form<?php echo $cart_item['pk']; ?>" min="0" name="quantity" value="<?php echo $cart_item['quantity']; ?>" type="number" class="form-control form-control-sm" />

                                        <button class="btn btn-link px-2" onclick="updateQuantity(1,'form<?php echo $cart_item['pk']; ?>',<?php echo $cart_item['pk']; ?>,<?php echo $cart_item['product_price']; ?>)">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                        <h5 id="totalAmount<?php echo $cart_item['pk']; ?>" class="mb-0">$<?php echo $cart_item['product_price'] * $cart_item['quantity']; ?></h5>
                                    </div>

                                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                        <a href=index.php?controller=cart&action=deleteItem&id=<?php echo $cart_item['pk']; ?> class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>


                    <div class="card">
                        <div class="card-body">
                            <a href="index.php?controller=cart&action=checkout" class="btn btn-warning btn-block btn-lg">Check out</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    function updateQuantity(change, id, no, product_price) {
        var quantityInput = document.getElementById(id);
        var currentQuantity = parseInt(quantityInput.value, 10);
        var newQuantity = currentQuantity + change;

        // Ensure the quantity is not less than 0
        newQuantity = Math.max(newQuantity, 0);
        quantityInput.value = newQuantity;

        // Update the total amount
        var itemPrice = product_price; // Replace with the actual price
        var totalAmount = newQuantity * itemPrice;
        var totalAmount_id = 'totalAmount' + no;
        // Update the total amount in the HTML
        document.getElementById(totalAmount_id).textContent = '$' + totalAmount.toFixed(2);
        url = 'index.php?controller=cart&action=updateCount&id='+no+"&quantity="+newQuantity
        console.log('url',url)
        $.ajax({
            url: url, // Replace with your actual API endpoint
            method: 'GET',
            dataType: 'json', // Change this based on the expected data type
            success: function(data) {
                // Handle successful response
                $('#result').html('Data loaded successfully: ' + JSON.stringify(data));
            },
            error: function(xhr, status, error) {
                // Handle errors
                $('#result').html('Error: ' + status + ' - ' + error);
            }
        });
    }
</script>

</html>