<?php
require_once 'models/UserModel.php';

class UserController {

    private $db;

    public function __construct($db) {
        $this->db = $db;
        //echo "UserController constructed with database connection.";

    }    
    
    public function login() {
        require 'views/login.php';
    }


    public function authenticate() {
        // ... (existing authentication logic)
            // Get user input
        $usernameOrEmail = $_POST['usernameOrEmail'];
        $password = $_POST['password'];

        // Authenticate user
        $userModel = new UserModel($this->db);
        $user = $userModel->getUserByUsernameOrEmail($usernameOrEmail);

        var_dump($user); // Debugging output

        if ($user && password_verify($password, $user['password'])) {
            // Authentication successful
            // Store user information in the session
            $_SESSION['user'] = $user;

            // Redirect to the admin landing page
            if ($user['user_group'] === 'admin') {
                header('Location: index.php?controller=admin&action=landingPage');
            } else {
                header('Location: index.php?controller=home&action=index');
            }

            exit;
        } else {
            // Authentication failed
           header('location: index.php?controller=user&action=login&error="Username and/or Password Invalid"');
        }
    }

    public function registerForm() {
        // Check if the user is an admin (you need to implement this logic)
        //$isAdmin = $this->checkIfUserIsAdmin();

        // Load the register view, passing the $isAdmin variable
        require 'views/register.php';
    }

    public function register() {
        // Other registration logic...

        // Get user input
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password

        // Set default role to 'user'
        $role = 'user';

        // Check if a role is selected in the registration form
        if (isset($_POST['role'])) {
            $role = $_POST['role'];
        }

        // Insert the user into the database
        $userModel = new UserModel($this->db);
        $userModel->insertUser($username, $email, $password, $role);

        header('Location: index.php?controller=user&action=login');

        // Other logic...
    }

}

?>









