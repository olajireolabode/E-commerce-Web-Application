<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- Link to Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">    

    <!-- Link to the external CSS file -->
    <link rel="stylesheet" href="css/style.css">
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
                <li class="nav-item">
                    <a class="nav-link" href="index.php?controller=user&action=login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?controller=contact&action=contactUs">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?controller=about&action=aboutUs">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?controller=cart&action=viewCart">Cart</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="center-container">
        <div class="register-container">
            <h1>Register</h1>
            <form action="index.php?controller=user&action=register" method="post">
                <label for="username">Username:</label>
                <input type="text" name="username" required>
                <br>

                <label for="email">Email:</label>
                <input type="email" name="email" required>
                <br>

                <label for="password">Password:</label>
                <input type="password" name="password" required>
                <br>

                <!-- <label for="role">Role:</label>
                <select name="role" required>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select> -->
                <br>

                <button type="submit">Register</button>
            </form>
            <br>

            <p>Already have an account? <a href="index.php?controller=user&action=login">Login here</a>.</p>
        </div>
    </div>



    <!-- Link to Bootstrap JS (Optional: Required for dropdowns, toggles, etc.) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>        
</body>
</html>
