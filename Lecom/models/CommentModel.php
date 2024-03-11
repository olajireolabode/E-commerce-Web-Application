<?php
class CommentModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getLatestProduct() {
        $query = 'SELECT * FROM products ORDER BY product_id DESC LIMIT 1';
        $stmt = $this->db->query($query);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getCommentsForProduct($productId) {
        $query = 'SELECT * FROM comments WHERE product_id = :product_id';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':product_id', $productId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addComment($productId, $userName, $commentText) {
        $query = 'INSERT INTO comments (product_id, user_name, comment, date_posted) VALUES (:product_id, :user_name, :comment, NOW())';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':product_id', $productId, PDO::PARAM_INT);
        $stmt->bindParam(':user_name', $userName, PDO::PARAM_STR);
        $stmt->bindParam(':comment', $commentText, PDO::PARAM_STR);

        return $stmt->execute();
    }
}
?>
