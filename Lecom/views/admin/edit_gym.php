<!-- views/admin/edit_gym.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Gym</title>
    <!-- Include any necessary styles or scripts -->
</head>
<body>
    <h2>Edit Gym</h2>

    <!-- Edit Gym Form -->
    <form action="index.php?controller=gym&action=update" method="post">
        <input type="hidden" name="gym_id" value="<?php echo $gym['gym_id']; ?>">
        
        <label for="gym_name">Gym Name:</label>
        <input type="text" name="gym_name" value="<?php echo $gym['gym_name']; ?>" required>
        <br>

        <label for="location_number">Location Number:</label>
        <input type="text" name="location_number" value="<?php echo $gym['location_number']; ?>" required>
        <br>

        <label for="street_name">Street Name:</label>
        <input type="text" name="street_name" value="<?php echo $gym['street_name']; ?>" required>
        <br>

        <label for="city">City:</label>
        <input type="text" name="city" value="<?php echo $gym['city']; ?>" required>
        <br>

        <label for="zip">ZIP Code:</label>
        <input type="text" name="zip" value="<?php echo $gym['zip']; ?>" required>
        <br>

        <label for="office_number">Office Number:</label>
        <input type="text" name="office_number" value="<?php echo $gym['office_number']; ?>" required>
        <br>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $gym['email']; ?>" required>
        <br>

        <input type="submit" name="update_gym" value="Update Gym">
    </form>

    <!-- Add a link to go back to gyms details -->
    <p><a href="index.php?controller=gym&action=displayDetails">Go back to Gyms Details</a></p>
</body>
</html>
