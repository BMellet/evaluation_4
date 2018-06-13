<?php
    require_once('./components/head.php');
    require_once('./classes/bdd.class.php');
    require_once('./classes/reservation.class.php');
?>
<body>
<?php
    require_once('./components/nav.php');
    
    if(isset($_GET['id']))
    {
        $id = intval($_GET['id']);
        $reservation = Reservation::getInformations($id);
        $client = Client::getFullname( intval($reservation['clientId']));
        $chambre = Chambre::getRoomNumber( intval($reservation['chambreId']));
    }  
?>
<div class="row">
    <div class="col S0 m3"></div>
    <div class="col s12 m6">
        <div class="card grey darken-1">
            <div class="card-content white-text center">
                <span class="card-title orange-text">Attention</span>
                <p>Etes-vous sur de vouloir supprimer la réservation n°<?php echo $reservation['id'] ?>: </p>
                <div class="card grey darken-2">
                    <div class="card-content white-text center">
                        <p><?php echo $client.' / Chambre n°'.$chambre;?></p>
                        <p>du <?php echo date("d-m-Y", strtotime($reservation['dateEntree']));?></p>
                        <p> au <?php echo date("d-m-Y", strtotime($reservation['dateSortie']));?></p>
                    </div>
                </div>
            </div>
            <div class="card-action center">
                <a class="white-text" href="/index.php">Annuler</a>
                <a class="orange-text" href="/supprimer.php?id=<?php echo $id; ?>">Confirmer</a>
            </div>
        </div>
    </div>
    <div class="col S0 m3"></div>
</div>
<?php
    require_once('./components/script.php');
?>
</body>
</html>