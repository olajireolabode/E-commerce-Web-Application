<?php

require_once 'models/TrainerModel.php';

class TrainerController {
    private $db;
    private $trainerModel; // Add this property

    public function __construct($db) {
        $this->db = $db;
        // Initialize the TrainerModel in the constructor
        $this->trainerModel = new TrainerModel($this->db);
    }

    public function insertForm() {
        require 'views/admin/insert_trainer.php';
    }
    
    // public function insert() {
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_trainer'])) {
    //         $trainerName = $_POST['trainer_name'];
    //         $trainerQualification = $_POST['trainer_qualification'];
    
    //         // Insert into the database (use your actual method from the TrainerModel)
    //         $this->trainerModel->insertTrainer($trainerName, $trainerQualification);
    
    //         // Redirect to the trainers details page
    //         header('Location: index.php?controller=trainer&action=displayDetails');
    //         exit;
    //     } else {
    //         echo 'Invalid request.';
    //     }
    // }

    public function insert() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_trainer'])) {
            $trainerName = $_POST['trainer_name'];
            $trainerQualification = $_POST['trainer_qualification'];
            $locationNumber = $_POST['location_number'];
            $streetName = $_POST['street_name'];
            $city = $_POST['city'];
            $zip = $_POST['zip'];
            $phoneNumber = $_POST['phone_number'];
            $email = $_POST['email'];

            // Insert into the database (use your actual method from the TrainerModel)
            $this->trainerModel->insertTrainer($trainerName, $trainerQualification, $locationNumber, $streetName, $city, $zip, $phoneNumber, $email);

            // Redirect to the trainers details page
            header('Location: index.php?controller=trainer&action=displayDetails');
            exit;
        } else {
            echo 'Invalid request.';
        }
    }


    public function displayDetails() {
        $trainers = $this->trainerModel->getAllTrainers();
        include 'views/admin/display_trainers.php';
    }

    // Add other methods for adding, editing, and deleting trainers

    private function getTrainers() {
        $query = 'SELECT * FROM trainers';
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function editForm() {
        // Get the trainer_id from the URL
        $trainer_id = $_GET['trainer_id'] ?? null;

        // Check if the trainer_id is provided
        if ($trainer_id) {
            // Get trainer details from the database
            $trainer = $this->trainerModel->getTrainerById($trainer_id);

            if ($trainer) {
                // Display the edit form
                require 'views/admin/edit_trainer.php';
            } else {
                echo 'Trainer not found.';
            }
        } else {
            echo 'Invalid request.';
        }
    }

    // public function update() {
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_trainer'])) {
    //         $trainer_id = $_POST['trainer_id'];
    //         $trainerName = $_POST['trainer_name'];
    //         $trainerQualification = $_POST['trainer_qualification'];

    //         // Update trainer in the database
    //         $success = $this->trainerModel->updateTrainer($trainer_id, $trainerName, $trainerQualification);

    //         if ($success) {
    //             // Redirect to trainers details page
    //             header('Location: index.php?controller=trainer&action=displayDetails');
    //             exit;
    //         } else {
    //             echo 'Failed to update trainer.';
    //         }
    //     } else {
    //         echo 'Invalid request.';
    //     }
    // }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_trainer'])) {
            $trainer_id = $_POST['trainer_id'];
            $trainerName = $_POST['trainer_name'];
            $trainerQualification = $_POST['trainer_qualification'];
            $locationNumber = $_POST['location_number'];
            $streetName = $_POST['street_name'];
            $city = $_POST['city'];
            $zip = $_POST['zip'];
            $phoneNumber = $_POST['phone_number'];
            $email = $_POST['email'];

            // Update trainer in the database
            $success = $this->trainerModel->updateTrainer($trainer_id, $trainerName, $trainerQualification, $locationNumber, $streetName, $city, $zip, $phoneNumber, $email);

            if ($success) {
                // Redirect to trainers details page
                header('Location: index.php?controller=trainer&action=displayDetails');
                exit;
            } else {
                echo 'Failed to update trainer.';
            }
        } else {
            echo 'Invalid request.';
        }
    }

    public function delete() {
        // Get the trainer_id from the URL
        $trainer_id = $_GET['trainer_id'] ?? null;

        // Check if the trainer_id is provided
        if ($trainer_id) {
            // Delete the trainer from the database
            $success = $this->trainerModel->deleteTrainer($trainer_id);

            if ($success) {
                // Redirect to trainers details page
                header('Location: index.php?controller=trainer&action=displayDetails');
                exit;
            } else {
                echo 'Failed to delete trainer.';
            }
        } else {
            echo 'Invalid request.';
        }
    }
}

?>
