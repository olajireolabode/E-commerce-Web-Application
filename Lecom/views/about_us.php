<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>About Us - SilverLight</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>
  /* Your existing style */
  .title-box {
    text-align: center;
    margin-top: 10px; 
  }

  .box {
    margin: 20px auto;
    padding: 20px;
    background-color: #f9f9f9;
    width: 80%;
    box-sizing: border-box;
    border: 2px solid navy;
    border-radius: 8px;
  }

  .box p {
    background-color: lightgrey;
    padding: 10px;
    margin: 0;
  }

  /* Remove outline around box */
  .box:focus, .box:active {
    outline: none;
  }
</style>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light about-us-navbar">
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
        </div>
    </nav>

<div class="title-box">
  <header>
    <h1>About Us - SilverLight</h1> 
  </header>
</div>

<!-- Paragraphs in boxes -->
<div class="box">
  <p>“SilverLight Protein” also aims to provide fitness enthusiasts, athletes, and health-conscious individuals with a convenient platform to access and purchase premium gym-related items. The project aims to provide a comprehensive platform for fitness enthusiasts to access supplements, services, and resources to support their fitness journeys.</p>
</div>

<div class="box">
  <p>With a user-friendly interface, secure transactions, and a robust database, “SilverLight Protein” will cater to the needs of users seeking to improve their health and fitness. We look forward to the opportunity to bring this project to life and help people on their path to a healthier lifestyle.</p>
</div>

<div class="box">
  <p>The “SilverLight Protein” project aims to create a transactional website that caters to fitness enthusiasts, offering a wide range of products and services including supplements (protein powders, snacks, food, and vegan products), personal training, gym apparel, books (cookbooks and training regimens), and a BMI calculator. This website will provide users with a one-stop-shop for all their fitness needs, ensuring convenience and access to quality fitness-related products and services.</p>
</div>

</body>
</html>