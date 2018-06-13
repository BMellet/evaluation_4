<?php
    require_once('./components/head.php');
    require_once('./classes/bdd.class.php');
    require_once('./classes/reservation.class.php');
    require_once('./classes/client.class.php');
    require_once('./classes/chambre.class.php');
?>
<body>
   
<?php
    require_once('./components/nav.php');
    if(isset($_GET['id']))
    {
        $reservation = Reservation::getInformations($_GET['id']);
    }
?>
    <!-- -MODIFICATION- -->

<?php if(isset($reservation)):?>
<?php echo  '<h1>Modifier la réservation</h1>';?>
<div class="container">
    <form method="post" action="modifier.php?id=<?php echo $reservation['id']?>">
            <div class="col s12">
                <span>Client:</span>
                <div class="input-field inline">
                    <select name="client">
                        <?php
                                Client::listeClient(intval($reservation['clientId']));
                                ?>
                    </select>
                </div>
            </div>
            <div class="col s12">
                <span>Chambre:</span>
                <div class="input-field inline">
                    <select name="chambre">
                        <?php 
                            Chambre::listeChambre(intval($reservation['chambreId']));
                            ?>
                    </select>
                </div>
            </div>
            <div class="col s12">
                <span>Date d'arrivée:</span>
                <div class="input-field inline">
                    <input type="date" name="date_entree" value="<?php echo substr($reservation['dateEntree'],0,10); ?>">    
                </div>
            </div>
            <div class="col s12">
                <span>Date de départ:</span>
                <div class="input-field inline">
                    <input type="date" name="date_sortie"   value="<?php echo substr($reservation['dateSortie'],0,10); ?>">     
                </div>
            </div>
            <div class="col s12">
                <span>Status:</span>
                <div class="input-field inline">
                    <select name="statut">
                        <option  value ="<?php echo $reservation['statut']?>" disabledselected><?php echo $reservation['statut']?></option>
                        <option value="attente">attente</option>
                        <option value="refus">refus</option>
                        <option value="valide">valide</option>
                    </select>     
                </div>
            </div> 
            <button class="btn grey lighten-5 black-text" name="save">Sauvegarder</button>
        </form>
    </div>
    <?php endif?>
    
    <!-- -CREATION- -->

    <?php if(!isset($reservation)):?>
    <?php echo  '<h1>Créer une réservation</h1>';?>
    <div class="container">
        <form method="post" action="creer.php?">
            <div class="col s6">
                <span>Client:</span>
                <div class="input-field inline">
                    <select name="client">
                        <option disabled selected>Selectionnez un client</option>
                        <?php
                                Client::listeClient();
                                ?>
                    </select>
                </div>
            </div>
            <div class="col s6">
                <span>Chambre:</span>
                <div class="input-field inline">
                    <select name="chambre">
                    <option disabled selected>Selectionnez une chambre</option>
                        <?php 
                            Chambre::listeChambre();
                        ?>
                    </select>
                </div>
            </div>
            <div class="col s6">
                <span>Date d'arrivée:</span>
                <div class="input-field inline">
                    <input type="date" name="date_entree">    
                </div>
            </div>
            <div class="col s6">
                <span>Date de départ:</span>
                <div class="input-field inline">
                    <input type="date" name="date_sortie">     
                </div>
            </div>
            <div class="col s6">
                <span>Status:</span>
                <div class="input-field inline">
                <select name="statut">
                    <option disabled selected>statut de la réservation</option>
                    <option value="attente">attente</option>
                    <option value="refus">refus</option>
                    <option value="valide">valide</option>
                </select>     
                </div>
            </div> 
            <button class="btn grey lighten-5 black-text" name="save">Sauvegarder</button>
        </form>
    </div>
<?php endif?>



<?php
    require_once('./components/script.php');
?>
</body>
</html>