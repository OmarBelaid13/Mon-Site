<?php
require_once('Controller.php');
require_once('Models/ContactModel.php');

/**
 * Class that manages the recording of messages / contacts
 */
class ContactController extends Controller
{
    protected string $viewFolder = 'content';
    protected string $modelName = 'ContactModel';
    
    /**
     * Save the messages received in the database
     * @return void
     */
    public function save_messages():void
    {
        
        // Secure POST with filter_input()
        $nom        = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
        $prenom     = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING);
        $email      = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $message    = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

        utf8_encode($nom);
        utf8_encode($prenom);
        utf8_encode($email);
        utf8_encode($message);
        
        // Call method for to save contact's messages
        $this->model->saveMessages($nom, $prenom, $email, $message);

    }
}
