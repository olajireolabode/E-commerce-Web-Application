<?php
require_once 'models/ProductModel.php';
require_once 'models/GymModel.php'; // Include the GymModel
require_once 'models/TrainerModel.php'; // Include the TrainerModel
require_once 'models/UserQuestionModel.php'; // Include the TrainerModel

class HomeController {
    private $productModel;
    private $gymModel; // Add this property
    private $trainerModel; // Add this property
    private $userquestionModel;

    public function __construct($db) {
        $this->productModel = new ProductModel($db);
        $this->gymModel = new GymModel($db); // Initialize the GymModel
        $this->trainerModel = new TrainerModel($db);
        $this->userquestionModel = new UserQuestionModel($db);
    }

    public function index() {
        $searchTerm = $_GET['search'] ?? null;

        if ($searchTerm !== null) {
            $products = $this->productModel->searchProducts($searchTerm);
        } else {
            $products = $this->productModel->getAllProducts();
        }

        require 'views/home.php';
    }

    public function aboutUs() {
        include 'views/about_us.php';
    }

    public function contactUs() {
        try {
            // Fetch user details from the database
            $username = $_SESSION['user']['user_name'] ?? null;
            $user_question = $this->userquestionModel->get_question_answer_by_username($username);
            foreach ($user_question as &$qs) {
                $question_ans = $this->userquestionModel->get_user_question_answer($qs['pk']);
                $qs['question_ans'] = $question_ans;
                // Your code inside the loop
            }
            // Load the view to display the admin dashboard
            // include 'views/admin/usermessage.php';
            include 'views/contact_us.php';
    
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    
        
    public function cart() {
        include 'views/cart.php';
    }
    public function bmiCalculator() {
        include 'views/bmi_calculator.php';
    }

    public function calculateBMI() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $weight = $_POST['weight'] ?? 0;
            $height = $_POST['height'] ?? 0;

            // Perform BMI calculation
            $bmi = $weight / (($height / 100) ** 2);

            // Provide recommendations based on BMI
            $recommendations = $this->getBMIRecommendations($bmi);

            // Store results in session variables
            $_SESSION['bmiResult'] = $bmi;
            $_SESSION['recommendations'] = $recommendations;

            // Redirect back to the BMI calculator page
            header('Location: index.php?controller=home&action=bmiCalculator');
            exit;
        } else {
            echo 'Invalid request.';
        }
    }

    private function getBMIRecommendations($bmi) {
        // Recommendations based on BMI categories
        if ($bmi < 18.5) {
            return 'You are underweight. Consider consulting with a healthcare professional.';
        } elseif ($bmi >= 18.5 && $bmi < 24.9) {
            return 'Your BMI is in the normal range. Keep up the good work!';
        } elseif ($bmi >= 25 && $bmi < 29.9) {
            return 'You are overweight. Consider adopting a healthier lifestyle with balanced nutrition and regular exercise.';
        } else {
            return 'You are obese. It is recommended to consult with a healthcare professional for personalized advice.';
        }
    }

    public function otherServices() {
        // Fetch gyms and trainers from the database (use your actual methods from GymModel and TrainerModel)
        $gyms = $this->gymModel->getAllGyms();
        $trainers = $this->trainerModel->getAllTrainers();

        include 'views/other_services.php';
    }
}
?>
