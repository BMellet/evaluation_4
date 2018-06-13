<?php
require_once('bdd.class.php');
require_once('client.class.php');
require_once('chambre.class.php');
class Reservation 
{
    public function getTotal()
    {
        return Database::getDB()->query("SELECT COUNT(*) from reservations");
    }

    public function listeReservations($page,$order)
    {
        if($page == 1)
        {
            $premiereLigne = 0;
        }
        else
        {
            $premiereLigne = ($page-1)*5;

        }
            
                
        foreach(Database::getDB()->query("SELECT * from reservations ORDER BY $order LIMIT 5 OFFSET  $premiereLigne ") as $row) 
        {
            $nom_client = Client::getFullname( intval($row['clientId']));
            $numero_chambre = Chambre::getRoomNumber( intval($row['chambreId']));
            $dateEntree = date("d-m-Y", strtotime($row['dateEntree']));
            $dateSortie = date("d-m-Y", strtotime($row['dateSortie']));
            
            echo '<tr>
                    <td>'.$row['id'].'</td>
                    <td>'.$nom_client.'</td>
                    <td>'.$numero_chambre.'</td>
                    <td class="date"> Du <span>'.$dateEntree.'</span> au <span>'.$dateSortie.'</span></td>
                    <td class="statut">'.$row['statut'].'</td>
                    <td>
                        <a class="action-button" href="/formulaire.php?id='.$row['id'].'">Editer</a>
                        <span class="action-button"> - </span>
                        <a class="action-button" href="/confirmation.php?id='.$row['id'].'">Supprimer</a>
                        <a id="dropdown-action-trigger" class="action dropdown-trigger btn" href="#" data-target="dropdown-action"><i class="material-icons">arrow_drop_down</i></a>
                        <ul id="dropdown-action" class="dropdown-content">
                            <li><a href="/formulaire.php?id='.$row['id'].'">Editer</a></li>
                            <li><a href="/confirmation.php?id='.$row['id'].'">Supprimer</a></li>
                        </ul>
                    </td>
                 </tr>';         
            
        }
    }
    public function getInformations($id)
    {
        $result = Database::getDB()->query("SELECT * from reservations WHERE id=$id");
        return $result->fetch();
    }
    public function updateReservation($id,$clientId,$chambreId,$dateEntree,$dateSortie,$statut)
    { 

        try
        {
            $update = Database::getDB()->prepare("UPDATE reservations SET clientId = :client,chambreId = :chambre ,dateEntree = :entree ,dateSortie = :sortie,statut = :statut,dateModification =  CURRENT_TIMESTAMP() WHERE id = $id");
            $update->execute(array(':client'=> $clientId,':chambre'=> $chambreId,':entree'=> $dateEntree,':sortie'=> $dateSortie,':statut'=> $statut));
            echo'<h1>Réservation modifiée</h1>';
            header("Refresh:1; url=/index.php");
            
        }
        catch(PDOException $e) {
            print "Erreur!  " . $e->getMessage() . "<br/>";
            die();
        }
    }
    
    public function createReservation($clientId,$chambreId,$dateEntree,$dateSortie,$statut)
    { 

        try
        {
            $create = Database::getDB()->prepare("INSERT INTO reservations(clientId,chambreId,dateEntree,dateSortie,statut,dateModification)
                                                         VALUES(:client,:chambre,:entree,:sortie,:statut,CURRENT_TIMESTAMP())");
            $create->execute(array(':client'=> $clientId,':chambre'=> $chambreId,':entree'=> $dateEntree,':sortie'=> $dateSortie,':statut'=> $statut));
            echo'<h1>Reservation créée</h1>';
            header("Refresh:1; url=/index.php");
            
        }
        catch(PDOException $e) {
            print "Erreur!  " . $e->getMessage() . "<br/>";
            die();
        }
    }
    public function deleteReservation($id)
    {
        try
        {
            $create = Database::getDB()->query("DELETE FROM reservations WHERE id=$id");
            echo'<h1>Réservation supprimée</h1>';
            header("Refresh:1; url=/index.php");
            
        }
        catch(PDOException $e) {
            print "Erreur!  " . $e->getMessage() . "<br/>";
            die();
        }

    }
    
}