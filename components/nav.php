<ul id="dropdown1" class="dropdown-content">
  <li><a href="/index.php">Accueil</a></li>
  <li><a href="/formulaire.php">Nouvelle réservation</a></li>
</ul>
<div class="navbar-fixed">
  <nav>
    <div class="nav-wrapper grey lighten-2">
    <?php
      if(!strstr($_SERVER['SCRIPT_FILENAME'],'index'))
      {
        echo '<a class="waves-effect waves-light retour" href="index.php"><i class="material-icons left">arrow_left</i>Retour</a>';
      }
    ?>
      <a href="/index.php" class="brand-logo center"><img  class="logo"src="/assets/img/Ritz.png"/></a>
      <ul class="right">
        <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Menu<i class="material-icons right">arrow_drop_down</i></a></li>
      </ul>
    </div>
  </nav>
</div>
