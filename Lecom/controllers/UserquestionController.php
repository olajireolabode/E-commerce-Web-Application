<?php
require_once 'models/UserQuestionModel.php';

class UserquestionController {

    private $db;
    private $userModel;

    public function __construct($db) {
        $this->db = $db;
        //echo "UserController constructed with database connection.";
        $this->userModel = new UserQuestionModel($this->db);

    }    


    public function addquestion() {
        // Other registration logic...

        // Get user input
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $username = $_POST['username'];
        // Insert the user into the database
        $this->userModel->insert_user_question($name, $email, $message, $username);

        header('Location: index.php?controller=home&action=contactUs');

        // Other logic...
    }
    public function get_user_question(){
        $username = $_SESSION['user']['username'];
        $question_qs = $this->userModel->get_question_answer_by_username($username);

    }
}

?>









