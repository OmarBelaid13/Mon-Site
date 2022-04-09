<?php
require_once('../Controllers/Controller.php');
require_once('Models/AdminModel.php');
require_once('../Models/Session.php');

/**
 * Class that manages the recording of messages / contacts
 */
class AdminController extends Controller
{
    protected string $viewFolder = 'content';
    protected string $modelName = 'AdminModel';

    public function show_admin()
    {
        // utils variables
        $messageChampsVides = '';
        // Titre et sous-titre dynamiques
        $pageTitle      = "Espace";
        $pageSubtitle   = "Administrateur";
        // Retrieving the presentation article
        $presentation = $this->model->getContenu(1);
        $contacts = $this->model->getContacts();

        $variables = compact('pageTitle', 'pageSubtitle', 'presentation', 'contacts', 'messageChampsVides');
        
        $this->display('admin', $variables);
    }

    /**
     * Connexion to admin
     * @return void
     */
    public function connexion_admin(): void
    {
        // Secure POST with filter_input()
        $params = [
            'name' => $_POST['name'],
            'password' => $_POST['password']
        ];
        if (!empty($params['name']) or !empty($params['password'])) {
            $params['name']        = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
            $params['password']     = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
            
            // Call method for connexion
            $this->model->adminConnexion($params);
        } 
    }

    /**
     * Update text received in the database
     * @return void
     */
    public function get_contacs(): void
    {
        // Call method for to update content
        $this->model->getContacts();
    }
    /**
     * Delete all messages
     * @return void
     */
    public function delete_messages(): void
    {
        // Call method for to update content
        $this->model->deleteMessages();
    }

    /**
     * Update text received in the database
     * @return void
     */
    public function update_text(): void
    {
        // Secure POST with filter_input()
        $contenu = filter_input(
            INPUT_POST,
            'contenu',
            FILTER_SANITIZE_STRING
        );
        utf8_encode($contenu);
        // Call method for to update content
        $this->model->updateText($contenu);
    } 

    /**
     * Disconnect admin 
     * @return void
     */
    public function disconnect(): void
    {
        // Call method for to update content
        $this->model->disconnectAdmin();
    }

}
