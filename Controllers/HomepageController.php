<?php
require_once('Controller.php');

/**
 * Class that manages the display of the homepage
 */
class HomepageController extends Controller {
    protected string $viewFolder = 'content';
    protected string $modelName = 'HomepageModel';    

    /**
     * Show homepage 
     */ 
    public function homepage():void 
    {
        // Dynamic title and subtitle
        $pageTitle      = 'Omar Belaid';
        $pageSubtitle   = "Développeur Web.";
        
        // Retrieving the presentation article
        $presentation = $this->model->getContenu(1);
        // Retrieving the skill item
        $competences  = $this->model->getContenu(2);

        $message = filter_input(INPUT_GET, 'msg', FILTER_SANITIZE_STRING);

        if(!$message) {
            $message == '';
        }

        // If content is present, I use the compact () function to have as many variables as my page needs
        $variables = compact('pageTitle', 'pageSubtitle', 'presentation', 'message'); 
    
        // Show templates
        $this->display('homepage', $variables);
    }
}
