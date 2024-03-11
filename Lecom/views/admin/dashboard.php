<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Include any necessary styles or scripts for the dashboard -->
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Admin Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <!-- Link to go back to the admin landing page -->
                <li class="nav-item">
                    <a class="nav-link" href="index.php?controller=admin&action=landingPage">Go back to Admin Landing Page</a>
                </li>         
                <!-- Link to Display Product Details -->
                <li class="nav-item">
                    <a class="nav-link" href="index.php?controller=product&action=displayDetails">Products</a>
                </li>
                <!-- Link to View Gyms -->
                <li class="nav-item">
                    <a class="nav-link" href="index.php?controller=gym&action=displayDetails">Gyms</a>
                </li>
                <!-- Link to View Trainers -->
                <li class="nav-item">
                    <a class="nav-link" href="index.php?controller=trainer&action=displayDetails">Trainers</a>
                </li>                
                <!-- Link to View UserMessage -->
                <li class="nav-item">
                    <a class="nav-link" href="index.php?controller=admin&action=usermessage">UserMessage</a>
                </li>                
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>                
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <h1>Welcome to the Admin Dashboard!</h1>

        <!-- table of users -->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">User Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo $user['user_name']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['user_group']; ?></td>
                        <td>
                            <?php if ($user['user_group'] !== 'admin'): ?>
                                <!-- Display the promote button/form only for non-admin users -->
                                <form method="post" action="index.php?controller=admin&action=promoteUser">
                                    <input type="hidden" name="username" value="<?php echo $user['user_name']; ?>">
                                    <button type="submit" class="btn btn-primary">Promote to Admin</button>
                                </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Add more dashboard components as needed -->
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
