<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainers Details</title>
    <link rel="stylesheet" href="css/displaygyms.css">
</head>
<body>
    <h2>Trainers Details</h2>

    <p class="add-button"><a href="index.php?controller=trainer&action=insertForm">Add New Trainer</a></p>

    <!-- Display trainers data in a table -->
    <table class="gym-table">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Qualification</th>
            <th>Location</th>
            <th>Street Name</th>
            <th>City</th>
            <th>ZIP</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php foreach ($trainers as $trainer): ?>
            <tr>
                <td><?php echo $trainer['trainer_id']; ?></td>
                <td><?php echo $trainer['trainer_name']; ?></td>
                <td><?php echo $trainer['trainer_qualification']; ?></td>
                <td><?php echo $trainer['location_number']; ?></td>
                <td><?php echo $trainer['street_name']; ?></td>
                <td><?php echo $trainer['city']; ?></td>
                <td><?php echo $trainer['zip']; ?></td>
                <td><?php echo $trainer['phone_number']; ?></td>
                <td><?php echo $trainer['email']; ?></td>
                <td>
                    <a class="edit-link" href="index.php?controller=trainer&action=editForm&trainer_id=<?php echo $trainer['trainer_id']; ?>">Edit</a>
                    <a class="delete-link" href="index.php?controller=trainer&action=delete&trainer_id=<?php echo $trainer['trainer_id']; ?>" onclick="return confirm('Are you sure you want to delete this trainer?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <p class="back-button"><a href="index.php?controller=admin&action=dashboard">Back</a></p>

</body>
</html>
