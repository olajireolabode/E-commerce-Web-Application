<?php
require_once 'models/UserModel.php';
require_once 'models/UserQuestionModel.php';

class AdminController {
    private $userModel;
    private $userquestionModel;
    private $db;


    public function __construct($db) {
        $this->db = $db;
        // Initialize the UserModel in the constructor
        $this->userModel = new UserModel($db);
        $this->userquestionModel = new UserQuestionModel($db);
        
    }

    public function landingPage() {
        //echo 'Entering landingPage method<br>';

        // Check if the user is logged in
        if ($this->checkIfUserIsLoggedIn()) {
            // Check if the user is an admin
            if ($this->checkIfUserIsAdmin()) {
                // Display the admin landing page
                include 'views/admin/landing_page.php';
            } else {
                // Redirect non-admin users to the home page
                header('Location: index.php?controller=home&action=index');
                exit;
            }
        } else {
            // Redirect not logged in users to the login page
            header('Location: index.php?controller=user&action=login');
            exit;
        }
    }

    private function checkIfUserIsLoggedIn() {
        return isset($_SESSION['user']);
    }

    private function checkIfUserIsAdmin() {
        //echo 'Checking if user is an admin<br>';
        return isset($_SESSION['user']['user_group']) && $_SESSION['user']['user_group'] === 'admin';
    }

    public function dashboard() {
        try {
            // Fetch user details from the database
            $users = $this->userModel->getAllUsers();

            // Load the view to display the admin dashboard
            include 'views/admin/dashboard.php';
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function usermessage() {
        try {
            // Fetch user details from the database
            $user_question = $this->userquestionModel->get_all_user_question();

            // Load the view to display the admin dashboard
            include 'views/admin/usermessage.php';
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function replymessage() {
        try {
            $pk = $_GET["pk"];
            $question =  $this->userquestionModel->getQuestionById($pk);
            $answers = $this->userquestionModel->get_user_question_answer($pk);
            include 'views/admin/replymessage.php';
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function postmessagereply() {
        $pk = $_POST['pk'];
        $message = $_POST['message'];
        $this->userquestionModel->insert_question_answer($pk, $message);
        header('Location: index.php?controller=admin&action=usermessage');

    }
    public function postmessagereplysfromuser() {
        $pk = $_POST['qpk'];
        $message = $_POST['message'];
        $username = $_SESSION['user']['user_name'];
        $this->userquestionModel->insert_question_answer($pk, $message,$username);
        header('Location: index.php?controller=home&action=contactUs');
    }

    public function promoteUser() {
        // Check if the user is logged in and is an admin
        if ($this->checkIfUserIsLoggedIn() && $this->checkIfUserIsAdmin()) {
            // Get the username to be promoted from the form submission
            $username = $_POST['username'];
    
            // Update the user role to 'admin' in the database
            $this->userModel->promoteUserToAdmin($username);
    
            // Redirect back to the admin dashboard
            header('Location: index.php?controller=admin&action=dashboard');
            exit;
        } else {
            // Redirect to the login page if not logged in or not an admin
            header('Location: index.php?controller=user&action=login');
            exit;
        }
    }
}

?>
