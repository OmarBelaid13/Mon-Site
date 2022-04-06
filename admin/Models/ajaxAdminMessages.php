<?php
// Import 
require_once '../Models/AdminModel.php';
require_once '../Controllers/AdminControllers.php';


// Init instance of contact
$adminM = new AdminModel;

// Extraction of each of the fields retrieved in the $ _POST. It creates a variable with the name and values it with the entry of the corresponding input
extract($_POST);

$adminM->deleteMessages();
