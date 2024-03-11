<?php

class ContactUsModel {

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
    public function insertcontact() {
            echo "12121"; 
            $query = 'INSERT INTO contact_us (name, email, message) VALUES (:name, :email, :message)';
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':name, :email, :message', PDO::PARAM_STR);
            echo $stmt;
            return $stmt->execute();
        }
    
        public function getcontact()
        {
            $query = 'SELECT * FROM contact_us';
            $stmt = $this->db->prepare($query);
            $stmt->execute();
    
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
