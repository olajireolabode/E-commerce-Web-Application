<!-- views/admin/insert_gym.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Gym</title>
    <!-- Include any necessary styles or scripts -->
</head>
<body>
    <h2>Add New Gym</h2>

    <!-- Form for inserting a new trainer -->
    <form action="index.php?controller=gym&action=insert" method="post">
        <label for="gym_name">Gym Name:</label>
        <input type="text" name="gym_name" required><br>

        <label for="location_number">Location Number:</label>
        <input type="text" name="location_number" required><br>

        <label for="street_name">Street Name:</label>
        <input type="text" name="street_name" required><br>

        <label for="city">City:</label>
        <input type="text" name="city" required><br>

        <label for="zip">ZIP Code:</label>
        <input type="text" name="zip" required><br>

        <label for="office_number">Office Number:</label>
        <input type="text" name="office_number" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <input type="submit" name="add_gym" value="Add Gym">
    </form>
</body>
</html>
