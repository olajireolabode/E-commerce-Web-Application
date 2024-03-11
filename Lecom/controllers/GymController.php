<?php

require_once 'models/GymModel.php';

class GymController {
    private $db;
    private $gymModel; // Update to GymModel

    public function __construct($db) {
        $this->db = $db;
        // Initialize the GymModel in the constructor
        $this->gymModel = new GymModel($this->db); // Update to GymModel
    }

    public function insertForm() {
        require 'views/admin/insert_gym.php';
    }
    
    // public function insert() {
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_gym'])) {
    //         $gymName = $_POST['gym_name'];
    //         //$gymLocation = $_POST['gym_location'];
    
    //         // Insert into the database (use your actual method from the GymModel)
    //         $this->gymModel->insertGym($gymName);
    
    //         // Redirect to the gyms details page
    //         header('Location: index.php?controller=gym&action=displayDetails');
    //         exit;
    //     } else {
    //         echo 'Invalid request.';
    //     }
    // }

    public function insert()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_gym'])) {
            $gymName = $_POST['gym_name'];
            $locationNumber = $_POST['location_number'];
            $streetName = $_POST['street_name'];
            $city = $_POST['city'];
            $zip = $_POST['zip'];
            $officeNumber = $_POST['office_number'];
            $email = $_POST['email'];

            $this->gymModel->insertGym($gymName, $locationNumber, $streetName, $city, $zip, $officeNumber, $email);

            header('Location: index.php?controller=gym&action=displayDetails');
            exit;
        } else {
            echo 'Invalid request.';
        }
    }

    public function displayDetails() {
        // Use the gymModel property to fetch gyms
        $gyms = $this->gymModel->getAllGyms();
        include 'views/admin/display_gyms.php';
    }

    // Add other methods for adding, editing, and deleting gyms
    // Add an edit method
    public function editForm() {
        // Get the gym_id from the URL
        $gym_id = $_GET['gym_id'] ?? null;

        // Check if the gym_id is provided
        if ($gym_id) {
            // Fetch gym details by gym_id
            $gym = $this->gymModel->getGymById($gym_id);

            if ($gym) {
                // Load the edit form view
                include 'views/admin/edit_gym.php';
            } else {
                echo 'Gym not found.';
            }
        } else {
            echo 'Invalid request.';
        }
    }

    // public function update() {
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_gym'])) {
    //         $gym_id = $_POST['gym_id'];
    //         $gym_name = $_POST['gym_name'];

    //         // Update gym in the database
    //         $success = $this->gymModel->updateGym($gym_id, $gym_name);

    //         if ($success) {
    //             // Redirect to gyms details page
    //             header('Location: index.php?controller=gym&action=displayDetails');
    //             exit;
    //         } else {
    //             echo 'Failed to update gym.';
    //         }
    //     } else {
    //         echo 'Invalid request.';
    //     }
    // }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_gym'])) {
            $gym_id = $_POST['gym_id'];
            $gym_name = $_POST['gym_name'];
            $location_number = $_POST['location_number'];
            $street_name = $_POST['street_name'];
            $city = $_POST['city'];
            $zip = $_POST['zip'];
            $office_number = $_POST['office_number'];
            $email = $_POST['email'];
    
            // Update gym in the database
            $success = $this->gymModel->updateGym($gym_id, $gym_name, $location_number, $street_name, $city, $zip, $office_number, $email);
    
            if ($success) {
                // Redirect to gyms details page
                header('Location: index.php?controller=gym&action=displayDetails');
                exit;
            } else {
                echo 'Failed to update gym.';
            }
        } else {
            echo 'Invalid request.';
        }
    }

    private function getGyms() {
        $query = 'SELECT * FROM gyms';
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function delete() {
        // Get the gym_id from the URL
        $gym_id = $_GET['gym_id'] ?? null;

        // Check if the gym_id is provided
        if ($gym_id) {
            // Delete gym from the database
            $success = $this->gymModel->deleteGym($gym_id);

            if ($success) {
                // Redirect to gyms details page
                header('Location: index.php?controller=gym&action=displayDetails');
                exit;
            } else {
                echo 'Failed to delete gym.';
            }
        } else {
            echo 'Invalid request.';
        }
    }
}

?>


