<?php

class UserQuestionModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
        //echo "UserModel constructed with database connection.";
    }

    public function insert_user_question($name, $email, $message, $username)
    {
        // Use prepared statements with placeholders
        $stmt = $this->db->prepare('INSERT INTO user_question (name, email, message, username) VALUES (:name, :email, :message, :username)');

        // Bind values to placeholders
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':message', $message);
        $stmt->bindParam(':username', $username);

        // Execute the statement
        $stmt->execute();
    }

    public function insert_question_answer($pk, $message, $username = null)
    {
        // Use prepared statements with placeholders
        if ($username == null) {
            $stmt = $this->db->prepare('INSERT INTO question_answer_table (message, q_id) VALUES (:message, :q_id)');
        } else {
            $stmt = $this->db->prepare('INSERT INTO question_answer_table (message, q_id,sender) VALUES (:message, :q_id,:sender)');
            $stmt->bindParam(':sender', $username);
        }
        // Bind values to placeholders
        $stmt->bindParam(':message', $message);
        $stmt->bindParam(':q_id', $pk);

        // Execute the statement
        $stmt->execute();
    }


    public function get_all_user_question()
    {
        $query = 'SELECT * FROM user_question ORDER BY PK DESC';
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function get_user_question_answer($pk)
    {
        $query = 'SELECT * FROM question_answer_table  WHERE `q_id` = :q_id ORDER BY pk DESC';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':q_id', $pk);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function get_question_answer_by_username($username)
    {

        $stmt = $this->db->prepare('SELECT * FROM `user_question` WHERE `username` = :username');
        $stmt->bindParam(':username', $username);
        $stmt->execute();


        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getQuestionById($pk)
    {

        $stmt = $this->db->prepare('SELECT * FROM `user_question` WHERE `pk` = :pk');
        $stmt->bindParam(':pk', $pk);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);

    }
}
