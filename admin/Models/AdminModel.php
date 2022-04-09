<?php

require_once '../Models/Model.php';
require_once '../Models/Session.php';


// Start session
$modelSession = new Session();

class AdminModel extends Model
{
    
    /**
     * Connexion admin
     * 
     * @return array : table content
     */
    public function adminConnexion(array $params)
    {
        
        $admin = $this->findByName($params['name']);
        
        if (empty($params)) {
            
            $_SESSION['error'] = "Ce nom d'utilisateur n'existe pas";

            header('Location: index.php?controller=admin&action=show_admin');
            exit();
        } else {
            
            // L'utilisateur existe bien => on vérifie si son mot de passe correspond à celui qui a été tapé
            // Est-ce que le mot de passe du formulaire correspond à celui en base de données
            if (strcmp($params['password'], $admin->password) == 0) {
                // Le mot de passe correspond => connexion de l'utilisateur
                // => Enregistrement des informations de l'utilisateur dans la session
                $_SESSION['auth'] = [
                    'id' => $admin->id,
                    'name' => $admin->name,
                    'email' => $admin->password,
                ];
                header('Location: index.php');
                exit();
            } else {
                // echo '<pre>';
                // var_dump('$_SESSION L62', $_SESSION);
                // //die();
                // echo '</pre>';
                // Le mot de passe est erroné => erreur => on renvoie l'utilisateur sur le formulaire
                $_SESSION['error'] = "Mot de passe erroné";

                header('Location: index.php');
                exit();
            }
        }
        }
    
    /**
     * Find login by name
     * 
     * @return array : table content
     */
    public function findByName(string $name): object
    {
        
        $requete = $this->db->prepare(
            'SELECT id, name, password FROM admin
            WHERE name = :name'
        );
    
        $requete->execute([':name' => $name]);
    
        $admin = $requete->fetch();
        
        if ($admin === false) {
            return [];
        } else {
            return $admin;
        }
    }

    /**
     * Display the retrieve received messages
     * 
     * @return array : table content
     */
    public function getContacts() :array
    {
        // Récupération client
        $requete = $this->db->prepare(
            'SELECT * FROM contacts'
        );
        // Execution of the request
        try {
            $requete->execute();
        } catch (Exception $e) {
            echo 'Exception reçue : ',  $e->getMessage(), "\n";
        }
        
        return $requete->fetchAll();
    }
    /**
     * Delete all messages
     * 
     * @return void 
     */
    public function deleteMessages() :void
    {
        // Récupération client
        $requete = $this->db->prepare(
            'DELETE FROM contacts'
        );
        // Execution of the request
        try {
            $requete->execute();
        } catch (Exception $e) {
            echo 'Exception reçue : ',  $e->getMessage(), "\n";
        }
        header('Location: index.php?controller=admin&action=show_admin');
        exit();
        
    }
    
    /**
     * Allows you to retrieve the content of my presentation
     * 
     * @param int : content identifier
     * @return array : table content
     */
    public function getContenu(int $id)
    {

        // Preparation of the request
        $requete = $this->db->prepare('SELECT titre, contenu, img, video FROM articles WHERE id = :id');

        // Execution of the request
        try {
            $requete->execute([
                ':id' => $id
            ]);
        } catch (Exception $e) {
            echo 'Exception reçue : ',  $e->getMessage(), "\n";
        }

        return $requete->fetch();
    }
    
    
    /**
     * Allows you to save messages and contact details in the database
     * 
     * @param $contenu
     * @return void
     */
    public function updateText(string $contenu)
    {
        // Preparation of the request
        $requete = $this->db->prepare('
            UPDATE articles 
            SET contenu = :contenu
        ');

        // Execution of the request
        try {
            $requete->execute([
                ':contenu'      => $contenu
            ]);
            return true;
        } catch (Exception $e) {
            echo 'Exception reçue : ',  $e->getMessage(), "\n";

            return false;
        }
    }

    /**
     * Disconnect admin 
     * @return void
     */
    public function disconnectAdmin(): void
    {
        $modelSession = new Session();

        $modelSession->stopSession();
        
        $_SESSION['error'] = "";
        header('Location: index.php');
        exit();
    }
}
