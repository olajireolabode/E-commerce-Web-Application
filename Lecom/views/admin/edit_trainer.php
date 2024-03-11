<!-- views/admin/edit_trainer.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Trainer</title>
    <!-- Include any necessary styles or scripts -->
</head>
<body>
    <h2>Edit Trainer</h2>

    <form action="index.php?controller=trainer&action=update" method="post">
        <input type="hidden" name="trainer_id" value="<?php echo $trainer['trainer_id']; ?>">
        <label for="trainer_name">Name:</label>
        <input type="text" name="trainer_name" value="<?php echo $trainer['trainer_name']; ?>" required><br>

        <label for="trainer_qualification">Qualification:</label>
        <input type="text" name="trainer_qualification" value="<?php echo $trainer['trainer_qualification']; ?>" required><br>

        <label for="location_number">Location Number:</label>
        <input type="text" name="location_number" value="<?php echo $trainer['location_number']; ?>" required><br>

        <label for="street_name">Street Name:</label>
        <input type="text" name="street_name" value="<?php echo $trainer['street_name']; ?>" required><br>

        <label for="city">City:</label>
        <input type="text" name="city" value="<?php echo $trainer['city']; ?>" required><br>

        <label for="zip">ZIP:</label>
        <input type="text" name="zip" value="<?php echo $trainer['zip']; ?>" required><br>

        <label for="phone_number">Phone Number:</label>
        <input type="text" name="phone_number" value="<?php echo $trainer['phone_number']; ?>" required><br>

        <label for="email">Email:</label>
        <input type="text" name="email" value="<?php echo $trainer['email']; ?>" required><br>

        <input type="submit" name="update_trainer" value="Update Trainer">
    </form>

    <!-- Add a link to go back to gyms details -->
    <p><a href="index.php?controller=trainer&action=displayDetails">Go back to Gyms Details</a></p>
</body>
</html>