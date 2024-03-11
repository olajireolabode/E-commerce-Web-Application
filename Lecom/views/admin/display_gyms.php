<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gyms Details</title>
    <link rel="stylesheet" href="css/displaygyms.css"> <!-- Include the CSS file -->
</head>
<body>
    <h2>Gyms Details</h2>

    <!-- Button to add a new gym -->
    <p class="add-button"><a href="index.php?controller=gym&action=insertForm">Add New Gym</a></p>

    <!-- Display gyms data in a table -->
    <table class="gym-table">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Location Number</th>
            <th>Street Name</th>
            <th>City</th>
            <th>ZIP Code</th>
            <th>Office Number</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php foreach ($gyms as $gym): ?>
            <tr>
                <td><?php echo $gym['gym_id']; ?></td>
                <td><?php echo $gym['gym_name']; ?></td>
                <td><?php echo $gym['location_number']; ?></td>
                <td><?php echo $gym['street_name']; ?></td>
                <td><?php echo $gym['city']; ?></td>
                <td><?php echo $gym['zip']; ?></td>
                <td><?php echo $gym['office_number']; ?></td>
                <td><?php echo $gym['email']; ?></td>
                <td>
                    <a class="edit-link" href="index.php?controller=gym&action=editForm&gym_id=<?php echo $gym['gym_id']; ?>">Edit</a>
                    <a class="delete-link" href="index.php?controller=gym&action=delete&gym_id=<?php echo $gym['gym_id']; ?>" onclick="return confirm('Are you sure you want to delete this gym?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <!-- Go back to Admin Dashboard link -->
    <p class="back-button"><a href="index.php?controller=admin&action=dashboard">Back</a></p>

</body>
</html>
