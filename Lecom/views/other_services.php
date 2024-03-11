<!-- other_services.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Other Services</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
                <!-- ... Your existing menu items ... -->
            </ul>
        </div>
    </nav>

    <div class="container mt-4">

    <!-- <h2 class="mb-4">Other Services</h2> -->

    <!-- Display Affiliated Gyms -->
        <div>
            <h3 class="mb-3">Affiliated Gyms</h3>
            <ul class="list-group">
                <?php foreach ($gyms as $gym): ?>
                    <li class="list-group-item">
                        <strong><?php echo $gym['gym_name']; ?></strong><br>
                        Location: <?php echo $gym['location_number'] . ', ' . $gym['street_name'] . ', ' . $gym['city'] . ' ' . $gym['zip']; ?><br>
                        Contact: <?php echo $gym['office_number'] . ', ' . $gym['email']; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <!-- Display Personal Trainers as Cards -->
        <div class="mt-4">
            <h3>Personal Trainers</h3>
            <div class="row">
                <?php foreach ($trainers as $trainer): ?>
                    <div class="col-md-4">
                        <div class="card">
                            <img src="images/profile_image.png" class="card-img-top" alt="Generic Profile Icon">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $trainer['trainer_name']; ?></h5>
                                <p class="card-text"><strong>Qualification:</strong> <?php echo $trainer['trainer_qualification']; ?></p>
                                <p class="card-text"><strong>Location:</strong> <?php echo $trainer['location_number'] . ', ' . $trainer['street_name'] . ', ' . $trainer['city'] . ' ' . $trainer['zip']; ?></p>
                                <p class="card-text"><strong>Phone:</strong> <?php echo $trainer['phone_number']; ?></p>
                                <p class="card-text"><strong>Email:</strong> <?php echo $trainer['email']; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Add more content or styling as needed -->
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
