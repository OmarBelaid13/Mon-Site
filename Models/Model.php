<?php
// Principal Model
abstract class Model {
    public $db;
    private $host;
    private $dbname;
    private $user;
    private $pass;

    public function __construct() {
        
        $this->host   = 'localhost';
        $this->dbname = 'omarbelaid_site';
        $this->user   = 'root';
        $this->pass   = 'root';

        // Connection to Database
        try {
            $this->db = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname . ';charset=utf8', $this->user, $this->pass,
            [
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}