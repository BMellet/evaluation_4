<?php
require_once('bdd.class.php');
class Chambre 
{
    public function listeChambre($id = "NULL")
    {
                
        foreach(Database::getDB()->query('SELECT * from chambres') as $row) 
        {
            if($id == $row['id'])
            {
                echo '<option  value ="'.$row['id'].'" selected> N° '.$row['numero'].' :  '.$row['nom'].'</option>';                
            }
            else
            {
                echo '<option value ="'.$row['id'].'"> N° '.$row['numero'].' :  '.$row['nom'].'</option>';
            }
        }
    }

    public function getRoomNumber($id)
    {
        $query = Database::getDB()->query("SELECT * from chambres WHERE id=$id");
        $result = $query->fetch();
        return $result['numero'];
    }
}