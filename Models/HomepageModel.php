<?php
require_once("Model.php");

class HomepageModel extends Model {

    /**
     * Allows you to retrieve the content of my presentation
     * 
     * @param int : content identifier
     * @return array : table content
     */
    public function getContenu(int $id){

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
}
