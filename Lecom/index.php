<?php
session_start();

// Connect to the database (replace with your database credentials)
$db = new PDO('mysql:host=localhost;dbname=silverlight', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//echo "Database connection established successfully.";


// Load the appropriate controller and action based on the URL

$controllerName = $_GET['controller'] ?? 'home';
$action = $_GET['action'] ?? 'index';

$controllerClassName = ucfirst($controllerName) . 'Controller';
$controllerFile = 'controllers/' . $controllerClassName . '.php';

if (file_exists($controllerFile)) {
    require $controllerFile;

    // Check if the user is logged in
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        
        // Check the user's group for routing
        // if ($user['user_group'] === 'admin' && $controllerName !== 'admin') {
        //     header('Location: index.php?controller=admin&action=landingPage');
        //     exit;
        // }
    }

    $controller = new $controllerClassName($db);

    if (method_exists($controller, $action)) {
        $controller->$action();
    } else {
        echo 'Action not found.';
    }
} else {
    echo 'Controller not found.';
}
?>
