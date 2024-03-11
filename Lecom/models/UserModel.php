<?php

class UserModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
        //echo "UserModel constructed with database connection.";
    }

    public function insertUser($username, $email, $password, $role) {
        // Use prepared statements with placeholders
        $stmt = $this->db->prepare('INSERT INTO users (user_name, email, password, user_group) VALUES (:username, :email, :password, :role)');
        
        // Bind values to placeholders
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':role', $role);

        // Execute the statement
        $stmt->execute();
    }

    public function getUserByUsernameOrEmail($usernameOrEmail) {
        try {
            $stmt = $this->db->prepare('SELECT * FROM users WHERE user_name = :username OR email = :email');
            $stmt->bindParam(':username', $usernameOrEmail);
            $stmt->bindParam(':email', $usernameOrEmail);
            $stmt->execute();
    
            // Fetch the user data
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if (!$user) {
                // User not found
                return null;
            }
    
            return $user;
        } catch (PDOException $e) {
            // Handle database errors
            echo 'Error: ' . $e->getMessage();
            return null;
        }
    }

    public function getAllUsers() {
        $query = 'SELECT * FROM users';
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function promoteUserToAdmin($username) {
        $stmt = $this->db->prepare('UPDATE users SET user_group = :role WHERE user_name = :username');
        $role = 'admin';
        $stmt->bindParam(':role', $role);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
    }
}

?>
