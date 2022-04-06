<?php

$controllerName = "homepage";
$action ="homepage";

if(!empty($_GET['action'])){
    $action = $_GET['action'];
} 

if(!empty($_GET['controller'])){
    $controllerName = $_GET['controller'];
} 

// Exemple : $controllerClassName = CvController
$controllerClassName = ucfirst($controllerName) . 'Controller'; 

// Exemple $controllerClassName = CvController.php
require_once("Controllers/$controllerClassName.php");

// Create new Controller()
$controller = new $controllerClassName();

// Appel de la fonction qui affiche les vues (appelation en fonction du GET action)
$controller->$action();




