<?php
require_once 'models/CartModel.php';

class CartController {
    private $db;
    private $cartModel;

    public function __construct($db) {
        $this->db = $db;
        $this->cartModel = new CartModel($this->db);
    }

    public function deleteItem() {
        $pk = $_GET['id'];
        if($pk==null){
            header('Location: index.php?controller=cart&action=viewCart');
        }
        else{
            $this->cartModel->deleteItemByID($pk);  
            $username = $_SESSION['user']['user_name'];
            $user_cart = $this->cartModel->get_user_cart($username);
            require 'views/cart.php';
        }
    }
    public function updateCount() {
        $pk = $_GET['id'];
        $quantity = $_GET['quantity'];
       
        if($pk==null || $quantity==null){
            $response = [
                'success' => false,
                'message' => 'Id or Quantity not found'
            ];
            // Set content type to JSON
            header('Content-Type: application/json');

            // Output JSON response
            echo json_encode($response);
        }
        else{
            $this->cartModel->updateItemByID($pk,$quantity);  
            $response = [
                'success' => true,
                'message' => 'Count Updated Successfully'
            ];
            // Set content type to JSON
            header('Content-Type: application/json');

            // Output JSON response
            echo json_encode($response);
        }
    }
    
    public function viewcart() {
        $username = $_SESSION['user']['user_name'];
        $user_cart = $this->cartModel->get_user_cart($username);
        require 'views/cart.php';
    }
    public function checkout() {
        $username = $_SESSION['user']['user_name'];
        $user_cart = $this->cartModel->get_user_cart($username);
        $total_item = 0;
        $total_amount = 0;
        foreach($user_cart as $cart)
        {
            $total_amount += $cart['product_price'] * $cart['quantity'];
            $total_item++;
        }
        require 'views/checkout.php';
    }
    public function addProduct() {
        $product_id = $_POST['productId'];
        $quantity = $_POST['quantity'];
        $username = $_SESSION['user']['user_name'];
        $this->cartModel->add_to_cart($product_id,$quantity,$username);

        header('Location: index.php?controller=home&action=index');
    }
}