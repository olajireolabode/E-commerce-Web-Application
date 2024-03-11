<!-- views/bmi_calculator.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI Calculator</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<style>
    /* Custom CSS */
    .form-control {
      background-color: lightgrey;
    }
  </style>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php?controller=home&action=index">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <!-- Add other navbar items as needed -->
            <li class="nav-item">
                <a class="nav-link" href="index.php?controller=home&action=bmiCalculator">BMI Calculator</a>
            </li>
        </ul>
    </div>
</nav>

<h2>BMI Calculator</h2>

<div class="container mt-4">
    <h2>BMI Calculator</h2>

    <!-- BMI Calculation Form -->
    <form method="POST" action="index.php?controller=home&action=calculateBMI">
        <div class="form-group">
            <label for="height">Height (cm):</label>
            <input type="text" class="form-control" name="height" required>
        </div>        
        <div class="form-group">
            <label for="weight">Weight (kg):</label>
            <input type="text" class="form-control" name="weight" required>
        </div>
        <button type="submit" class="btn btn-primary">Calculate BMI</button>
    </form>

    <!-- Display BMI Result and Recommendations -->
    <?php if (isset($_SESSION['bmiResult'])): ?>
        <div class="mt-4">
            <h3>BMI Result:</h3>
            <p><?php echo $_SESSION['bmiResult']; ?></p>
        </div>

        <?php if (isset($_SESSION['recommendations'])): ?>
            <div class="mt-4">
                <h3>Recommendations:</h3>
                <p><?php echo $_SESSION['recommendations']; ?></p>
            </div>
        <?php endif; ?>

        <?php
        // Clear session variables to prevent displaying old results on page refresh
        unset($_SESSION['bmiResult']);
        unset($_SESSION['recommendations']);
        ?>
    <?php endif; ?>
</div>

</body>
</html>
