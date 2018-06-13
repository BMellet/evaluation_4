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
        Reservation::deleteReservation($id);
    }
?>
<?php
    require_once('./components/script.php');
?>
</body>
</html>