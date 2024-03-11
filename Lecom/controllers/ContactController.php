<?php
require_once 'models/ContactUsModel.php';
class ContactController{
    private $ContactUsModel;

public function addcontact(){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $success = $this->ContactUsModel->addcontact($name, $email, $message);

    echo $success;

    }
}
