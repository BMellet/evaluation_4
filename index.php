<?php
    require_once('./components/head.php');
    require_once('./classes/bdd.class.php');
    require_once('./classes/reservation.class.php');
?>
<body>
<?php
    require_once('./components/nav.php');
   
?>
    <h1>Gestion des réservations</h1>
    <div class="container">
        <table class="striped centered">
            <thead>
                <tr>
                    <th><a class="<?php echo (isset($_GET['sort']) &&  $_GET['sort'] == "id" ?  'blue-text' :   'white-text') ?>" href="/index.php?sort=id">ID</a></th>
                    <th><a class="<?php echo (isset($_GET['sort']) &&  $_GET['sort'] == "clientId" ?  'blue-text' :   'white-text') ?>" href="/index.php?sort=clientId">Client</a></th>
                    <th><a class="<?php echo (isset($_GET['sort']) &&  $_GET['sort'] == "chambreId" ?  'blue-text' :   'white-text') ?>" href="/index.php?sort=chambreId">Numéro de chambre</a></th>
                    <th><a class="<?php echo (isset($_GET['sort']) &&  $_GET['sort'] == "dateEntree" ?  'blue-text' :   'white-text') ?>" href="/index.php?sort=dateEntree">Dates</a></th>
                    <th class=" statut <?php echo (isset($_GET['sort']) &&  $_GET['sort'] == "statut" ?  'blue-text' :   'white-text') ?>"><a class="white-text" href="/index.php?sort=statut">Statut</a></th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(!isset($_GET['sort']))
                {
                    $sort = "id";
                }
                else
                {
                    $sort=$_GET['sort'];
                }                
                if(!isset($_GET['page']))
                {
                    $page = 1;
                    Reservation::listeReservations($page,$sort);
                }
                elseif(isset($_GET['page'])) 
                {
                    $page = intval($_GET['page']);
                    Reservation ::listeReservations($page,$sort);
                }
                ?>
            </tbody>
        </table>
        <div class="pagination">
        <?php
        $response = Reservation::getTotal();
        $totalLigne = intval(($response->fetch())[0]);
        $totalPage = $totalLigne/5;
        if($page == 1)
        {
            echo '<a class="btn blue" href="index?page='.$page.'&sort='.$sort.'"><i class="material-icons left">arrow_back</i>'.($page).'</a>';
            echo '<a class="btn blue disabled" href="">'.$page.'</a>';
            echo '<a class="btn blue" href="index?page='.($page+1).'&sort='.$sort.'"><i class="material-icons right">arrow_forward</i>'.($page+1).'</a>';
        }
        else
        {
            
            echo '<a class="btn blue" href="index?page='.($page-1).'&sort='.$sort.'"><i class="material-icons left">arrow_back</i>'.($page-1).'</a>';
            echo '<a class="btn blue disabled" href="">'.$page.'</a>';
            if($totalPage < $page)
            {
                echo '<a class="btn blue" href="index?page='.$page.'&sort='.$sort.'"><i class="material-icons left">arrow_forward</i>'.($page+1).'</a>';
            }
            else
            {
                echo '<a class="btn blue" href="index?page='.($page+1).'&sort='.$sort.'"><i class="material-icons left">arrow_forward</i>'.($page+1).'</a>';
            }
        }
        ?>
        </div>
    </div>
<?php
    require_once('./components/script.php');
?>
</body>
</html>