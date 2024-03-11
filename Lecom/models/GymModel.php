<?php

class GymModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // public function insertGym($gymName)
    // {
    //     $query = 'INSERT INTO gyms (gym_name) VALUES (:gym_name)';
    //     $stmt = $this->db->prepare($query);
    //     $stmt->bindParam(':gym_name', $gymName, PDO::PARAM_STR);

    //     return $stmt->execute();
    // }

    public function insertGym($gymName, $locationNumber, $streetName, $city, $zip, $officeNumber, $email)
    {
        $query = 'INSERT INTO gyms (gym_name, location_number, street_name, city, zip, office_number, email) VALUES (:gym_name, :location_number, :street_name, :city, :zip, :office_number, :email)';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':gym_name', $gymName, PDO::PARAM_STR);
        $stmt->bindParam(':location_number', $locationNumber, PDO::PARAM_INT);
        $stmt->bindParam(':street_name', $streetName, PDO::PARAM_STR);
        $stmt->bindParam(':city', $city, PDO::PARAM_STR);
        $stmt->bindParam(':zip', $zip, PDO::PARAM_STR);
        $stmt->bindParam(':office_number', $officeNumber, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function getAllGyms()
    {
        $query = 'SELECT * FROM gyms';
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Add other methods as needed (update, delete, get by ID, etc.)

    
    public function getGymById($gym_id) {
        $query = 'SELECT * FROM gyms WHERE gym_id = :gym_id';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':gym_id', $gym_id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // public function updateGym($gym_id, $gym_name) {
    //     $query = 'UPDATE gyms SET gym_name = :gym_name WHERE gym_id = :gym_id';
    //     $stmt = $this->db->prepare($query);
    //     $stmt->bindParam(':gym_id', $gym_id, PDO::PARAM_INT);
    //     $stmt->bindParam(':gym_name', $gym_name, PDO::PARAM_STR);

    //     return $stmt->execute();
    // }

    public function updateGym($gym_id, $gym_name, $location_number, $street_name, $city, $zip, $office_number, $email) {
        $query = 'UPDATE gyms SET 
                    gym_name = :gym_name, 
                    location_number = :location_number, 
                    street_name = :street_name, 
                    city = :city, 
                    zip = :zip, 
                    office_number = :office_number, 
                    email = :email 
                  WHERE gym_id = :gym_id';
    
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':gym_id', $gym_id, PDO::PARAM_INT);
        $stmt->bindParam(':gym_name', $gym_name, PDO::PARAM_STR);
        $stmt->bindParam(':location_number', $location_number, PDO::PARAM_INT);
        $stmt->bindParam(':street_name', $street_name, PDO::PARAM_STR);
        $stmt->bindParam(':city', $city, PDO::PARAM_STR);
        $stmt->bindParam(':zip', $zip, PDO::PARAM_STR);
        $stmt->bindParam(':office_number', $office_number, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    
        return $stmt->execute();
    }

    public function deleteGym($gym_id) {
        $query = 'DELETE FROM gyms WHERE gym_id = :gym_id';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':gym_id', $gym_id, PDO::PARAM_INT);

        return $stmt->execute();
    }
}
