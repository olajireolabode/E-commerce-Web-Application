<?php
require_once 'models/CommentModel.php';

// controllers/CommentController.php
class CommentController {
    private $db;
    private $commentModel;

    public function __construct($db) {
        $this->db = $db;
        $this->commentModel = new CommentModel($this->db);
    }

    public function viewComments() {
        // Retrieve the product ID from the request (you may need to adjust this based on your routing)
        $productId = $_GET['product_id'] ?? null;

        // Get existing comments for the product
        $comments = $this->commentModel->getCommentsForProduct($productId);

        // Load the view
        include 'views/comments/view_comments.php';
    }

    public function addComment() {
        // Retrieve form data
        $productId = $_POST['product_id'] ?? null;
        $userName = $_POST['user_name'] ?? '';
        $commentText = $_POST['comment'] ?? '';

        // Add the comment to the database
        $success = $this->commentModel->addComment($productId, $userName, $commentText);

        if ($success) {
            // Redirect back to the view comments page
            header("Location: index.php?controller=comment&action=viewComments&product_id=$productId");
            exit;
        } else {
            echo 'Failed to add comment.';
        }
    }
}

?>
