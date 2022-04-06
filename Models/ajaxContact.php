<?php
// Import 
require_once '../Models/ContactModel.php';
require_once '../Controllers/ContactControllers.php';

// Init instance of contact
$contactM = new ContactModel;

// Extraction of each of the fields retrieved in the $ _POST. It creates a variable with the name and values it with the entry of the corresponding input
extract($_POST);

$contactM->saveMessages($nom, $prenom, $email, $message); 

