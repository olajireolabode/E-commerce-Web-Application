<?php

class TrainerModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // public function insertTrainer($trainerName, $trainerQualification)
    // {
    //     $query = 'INSERT INTO trainers (trainer_name, trainer_qualification) VALUES (:trainer_name, :trainer_qualification)';
    //     $stmt = $this->db->prepare($query);
    //     $stmt->bindParam(':trainer_name', $trainerName, PDO::PARAM_STR);
    //     $stmt->bindParam(':trainer_qualification', $trainerQualification, PDO::PARAM_STR);

    //     return $stmt->execute();
    // }

    public function insertTrainer($trainerName, $trainerQualification, $locationNumber, $streetName, $city, $zip, $phoneNumber, $email)
    {
        $query = 'INSERT INTO trainers (trainer_name, trainer_qualification, location_number, street_name, city, zip, phone_number, email) 
                  VALUES (:trainer_name, :trainer_qualification, :location_number, :street_name, :city, :zip, :phone_number, :email)';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':trainer_name', $trainerName, PDO::PARAM_STR);
        $stmt->bindParam(':trainer_qualification', $trainerQualification, PDO::PARAM_STR);
        $stmt->bindParam(':location_number', $locationNumber, PDO::PARAM_INT);
        $stmt->bindParam(':street_name', $streetName, PDO::PARAM_STR);
        $stmt->bindParam(':city', $city, PDO::PARAM_STR);
        $stmt->bindParam(':zip', $zip, PDO::PARAM_STR);
        $stmt->bindParam(':phone_number', $phoneNumber, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function getAllTrainers()
    {
        $query = 'SELECT * FROM trainers';
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Add other methods as needed (update, delete, get by ID, etc.)

    public function getTrainerById($trainer_id) {
        $query = 'SELECT * FROM trainers WHERE trainer_id = :trainer_id';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':trainer_id', $trainer_id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // public function updateTrainer($trainer_id, $trainerName, $trainerQualification) {
    //     $query = 'UPDATE trainers SET trainer_name = :trainer_name, trainer_qualification = :trainer_qualification WHERE trainer_id = :trainer_id';
    //     $stmt = $this->db->prepare($query);
    //     $stmt->bindParam(':trainer_id', $trainer_id, PDO::PARAM_INT);
    //     $stmt->bindParam(':trainer_name', $trainerName, PDO::PARAM_STR);
    //     $stmt->bindParam(':trainer_qualification', $trainerQualification, PDO::PARAM_STR);

    //     return $stmt->execute();
    // }

    public function updateTrainer($trainer_id, $trainerName, $trainerQualification, $locationNumber, $streetName, $city, $zip, $phoneNumber, $email) {
        $query = 'UPDATE trainers SET trainer_name = :trainer_name, trainer_qualification = :trainer_qualification, location_number = :location_number, street_name = :street_name, city = :city, zip = :zip, phone_number = :phone_number, email = :email WHERE trainer_id = :trainer_id';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':trainer_id', $trainer_id, PDO::PARAM_INT);
        $stmt->bindParam(':trainer_name', $trainerName, PDO::PARAM_STR);
        $stmt->bindParam(':trainer_qualification', $trainerQualification, PDO::PARAM_STR);
        $stmt->bindParam(':location_number', $locationNumber, PDO::PARAM_INT);
        $stmt->bindParam(':street_name', $streetName, PDO::PARAM_STR);
        $stmt->bindParam(':city', $city, PDO::PARAM_STR);
        $stmt->bindParam(':zip', $zip, PDO::PARAM_STR);
        $stmt->bindParam(':phone_number', $phoneNumber, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    
        return $stmt->execute();
    }

    public function deleteTrainer($trainer_id) {
        $query = 'DELETE FROM trainers WHERE trainer_id = :trainer_id';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':trainer_id', $trainer_id, PDO::PARAM_INT);

        return $stmt->execute();
    }
}
