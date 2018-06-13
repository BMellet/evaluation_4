<?php
    require_once('./components/head.php');
    require_once('./classes/bdd.class.php');
    require_once('./classes/reservation.class.php');
?>
<body>
<?php
    require_once('./components/nav.php');
    if(isset($_POST['save']))
    {
        $client = intval($_POST['client']);
        $chambre = intval($_POST['chambre']);
        $entree = $_POST['date_entree'];
        $sortie = $_POST['date_sortie'];
        $status = $_POST['statut'];
        Reservation::createReservation($client,$chambre,$entree,$sortie,$status);
    }
?>
<?php
    require_once('./components/script.php');
?>
</body>
</html>