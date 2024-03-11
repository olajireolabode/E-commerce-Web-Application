<?php
class ProductModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllProducts() {
        $query = "SELECT * FROM products";
        $result = $this->db->query($query);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductById($productId) {
        $query = 'SELECT * FROM products WHERE product_id = :product_id';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':product_id', $productId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insertProduct($productName, $productDescription, $productImage, $productPrice, $productQuantity) {
        $query = "INSERT INTO products (product_name, product_description, product_image, product_price, product_quantity) 
                  VALUES (:productName, :productDescription, :productImage, :productPrice, :productQuantity)";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':productName', $productName);
        $stmt->bindParam(':productDescription', $productDescription);
        $stmt->bindParam(':productImage', $productImage);
        $stmt->bindParam(':productPrice', $productPrice);
        $stmt->bindParam(':productQuantity', $productQuantity);

        $stmt->execute();
    }

    public function searchProducts($searchTerm) {
        $query = "SELECT * FROM products WHERE product_name LIKE :searchTerm";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':searchTerm', '%' . $searchTerm . '%', PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateProduct($productId, $productName, $productDescription, $productPrice, $productQuantity) {
        $query = 'UPDATE products SET 
                    product_name = :productName,
                    product_description = :productDescription,
                    product_price = :productPrice,
                    product_quantity = :productQuantity
                  WHERE product_id = :productId';

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
        $stmt->bindParam(':productName', $productName);
        $stmt->bindParam(':productDescription', $productDescription);
        $stmt->bindParam(':productPrice', $productPrice);
        $stmt->bindParam(':productQuantity', $productQuantity);

        return $stmt->execute();
    }

    // update  product qty
    // TODO finish update function
    public function updateProductQTY() {
        $SQL = "UPDATE products SET product_quantity=: product_quantity WHERE product_id";
        $STMT = $this->db->prepare($SQL);
        $STMT->execute([]);
    }

    public function deleteProduct($productId) {
        $query = 'DELETE FROM products WHERE product_id = :product_id';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':product_id', $productId, PDO::PARAM_INT);
    
        // Execute the query
        $stmt->execute();
    
        // Check if the deletion was successful
        return $stmt->rowCount() > 0;
    }
}
?>
