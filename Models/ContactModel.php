<?php

// Import dept => 'Model' 
require_once 'Model.php';

class ContactModel extends Model
{
    /**
     * Allows you to save messages and contact details in the database
     * 
     * @param mixed $nom, $prenom, $email, $message
     * @return void
     */
    public function saveMessages(string $nom, string $prenom, string $email, string $message) 
    {
        // Preparation of the request
        $requete = $this->db->prepare('
            INSERT INTO contacts SET
            nom     = :nom,
            prenom  = :prenom,
            email   = :email,
            message = :message,
            created_at = now()
        ');

        // Execution of the request
        try {
            $requete->execute([
                ':nom'      => $nom,
                ':prenom'   => $prenom,
                ':email'    => $email,
                ':message'  => $message
            ]);

            return true;
        } catch (Exception $e) {
            echo 'Exception reçue : ',  $e->getMessage(), "\n";

            return false;
        }
    }
}
