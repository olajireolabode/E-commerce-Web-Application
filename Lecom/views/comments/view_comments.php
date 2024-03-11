<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Comments</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- Link to Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <!-- Bootstrap Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php?controller=home&action=index">Home</a>
    </nav>
    <br>
    <br>
    <?php if ($comments): ?>
        <h2>Comments</h2>
        <?php foreach ($comments as $comment): ?>
            <div class="comment-container">
                <p class="user">User: <?php echo $comment['user_name']; ?></p>
                <p class="comment">Comment: <?php echo $comment['comment']; ?></p>
                <!-- Other comment details... -->
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No comments found for this product.</p>
    <?php endif; ?>

    <!-- Form to add a new comment -->
    <h2>Add a Comment</h2>
    <form action="index.php?controller=comment&action=addComment" method="post">
        <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
        <label for="user_name">Your Name:</label>
        <input type="text" name="user_name" required>
        <br>
        <br>
        <label for="comment">Your Comment:</label>
        <br>
        <textarea name="comment" rows="2" required></textarea> <!-- Adjusted the rows attribute -->
        <br>
        <br>
        <button type="submit">Add Comment</button>
    </form>
</body>
</html>
