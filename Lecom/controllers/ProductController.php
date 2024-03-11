<?php
require_once 'models/ProductModel.php';

class ProductController {
    private $db;
    private $productModel;

    public function __construct($db) {
        $this->db = $db;
        $this->productModel = new ProductModel($this->db);
    }

    public function insertForm() {
        require 'views/insert_product.php';
    }

    public function insert() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productName = $_POST['productName'];
            $productDescription = $_POST['productDescription'];
            $productPrice = $_POST['productPrice'];
            $productQuantity = $_POST['productQuantity'];

            // Handle file upload
            //$targetDirectory = 'images/';
            $targetFile = basename($_FILES['productImage']['name']);
            move_uploaded_file($_FILES['productImage']['tmp_name'], $targetFile);

            // Insert into the database
            $this->productModel->insertProduct($productName, $productDescription, $targetFile, $productPrice, $productQuantity);

            // Redirect to the homepage
            header('Location: index.php?controller=home&action=index');
            exit;
        } else {
            echo 'Invalid request.';
        }
    }

    public function displayDetails() {
        try {
            // Fetch product details from the database
            $products = $this->getProducts();

            // Load the view to display product details
            include 'views/admin/display_products.php';
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    // Method to fetch product details from the database
    private function getProducts() {
        $query = 'SELECT * FROM products';
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        // Fetch all products
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductById($productId) {
        $query = 'SELECT * FROM products WHERE product_id = :product_id';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':product_id', $productId, PDO::PARAM_INT);
        $stmt->execute();
    
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function editProductForm() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
            $productId = $_GET['id'];
            $existingProduct = $this->productModel->getProductById($productId);

            if ($existingProduct) {
                include 'views/admin/edit_product.php';
            } else {
                // Handle product not found
                echo 'Product not found.';
            }
        } else {
            // Handle invalid request
            echo 'Invalid request.';
        }
    }

    public function updateProduct() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_product'])) {
            $productId = $_POST['product_id'];
            $productName = $_POST['product_name'];
            $productDescription = $_POST['product_description'];
            $productPrice = $_POST['product_price'];
            $productQuantity = $_POST['product_quantity'];

            // Update the product in the database
            $success = $this->productModel->updateProduct($productId, $productName, $productDescription, $productPrice, $productQuantity);

            if ($success) {
                // Redirect to the product details page or dashboard
                header('Location: index.php?controller=product&action=displayDetails');
                exit;
            } else {
                // Handle update failure
                echo 'Update failed.';
            }
        } else {
            // Handle invalid request
            echo 'Invalid request.';
        }
    }

    public function deleteProduct() {
        // Handle the logic for deleting a product
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
            $productId = $_GET['id'];
    
            // Delete the product from the database
            $success = $this->productModel->deleteProduct($productId);
    
            if ($success) {
                // Redirect to the product details page or dashboard
                header('Location: index.php?controller=product&action=displayDetails');
                exit;
            } else {
                // Handle delete failure
                echo 'Delete failed.';
            }
        } else {
            // Handle invalid request
            echo 'Invalid request.';
        }
    }
}
?>
