<?php

class Controller {
    public Model $model;
    protected string $modelName;
    protected string $viewFolder;
    
    public function __construct(){
        require_once('Models/'.$this->modelName.'.php');

        $this->model = new $this->modelName();   
    }
    
    protected function display(string $viewName, array $variables)
    {
        // Creation of variables with the names contained in compact()
        extract($variables);

        require_once('views/header.phtml');
        require_once('views/'.$this->viewFolder.'/'.$viewName.'.phtml');
        require_once('views/footer.phtml'); 
    }
    
    
}
