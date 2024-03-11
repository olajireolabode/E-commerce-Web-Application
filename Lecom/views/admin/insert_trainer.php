<!-- views/admin/insert_trainer.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Trainer</title>
    <!-- Include any necessary styles or scripts -->
</head>
<body>
    <h2>Add New Trainer</h2>

    <!-- Form for inserting a new trainer -->
    <form action="index.php?controller=trainer&action=insert" method="post">
        <label for="trainer_name">Trainer Name:</label>
        <input type="text" name="trainer_name" required><br>

        <label for="trainer_qualification">Trainer Qualification:</label>
        <input type="text" name="trainer_qualification" required><br>

        <label for="location_number">Location Number:</label>
        <input type="text" name="location_number" required><br>

        <label for="street_name">Street Name:</label>
        <input type="text" name="street_name" required><br>

        <label for="city">City:</label>
        <input type="text" name="city" required><br>

        <label for="zip">ZIP:</label>
        <input type="text" name="zip" required><br>

        <label for="phone_number">Phone Number:</label>
        <input type="text" name="phone_number" required><br>

        <label for="email">Email:</label>
        <input type="text" name="email" required><br>

        <!-- Add any other input fields as needed -->

        <input type="submit" name="add_trainer" value="Add Trainer">
    </form>
</body>
</html>
