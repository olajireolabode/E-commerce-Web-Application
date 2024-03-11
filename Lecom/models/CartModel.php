<?php
class CartModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllProducts() {
        $query = "SELECT * FROM cart";
        $result = $this->db->query($query);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function add_to_cart($product_id,$quantity,$username) {
        $query = "INSERT INTO cart(product_id, quantity, username) VALUES (:product_id, :quantity, :username)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':product_id', $product_id);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
    }

    public function deleteItemByID($itemid) {
        $query = 'DELETE FROM cart WHERE pk = :pk';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':pk', $itemid, PDO::PARAM_INT);
        $stmt->execute();

    }
    public function updateItemByID($pk,$quantity) {
        
        $query = "UPDATE cart SET quantity = :quantity WHERE pk = :pk";
        // Prepare and execute the query
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
        $stmt->bindParam(':pk', $pk, PDO::PARAM_INT);
        $stmt->execute();

    }
    public function get_user_cart($username) {
        $query = "SELECT * FROM cart as c JOIN products as p on p.product_id = c.product_id  WHERE username = :username";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
