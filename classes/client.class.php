<?php
require_once('bdd.class.php');
class Client 
{
    public function listeCLient($id = NULL)
    {
                
        foreach(Database::getDB()->query('SELECT * from clients') as $row) 
        {
            if($id == $row['id'])
            {
                echo '<option value ="'.$row['id'].'" selected>'.$row['prenom'].' '.$row['nom'].'</option>';

            }
            else
            {
                echo '<option value ="'.$row['id'].'">'.$row['prenom'].' '.$row['nom'].'</option>';                
            }
        }
    }

    public function getFullName($id)
    {
        $query = Database::getDB()->query("SELECT * from clients WHERE id=$id");
        $result = $query->fetch();
        return $result['prenom'].' '.$result['nom'];
    }
}