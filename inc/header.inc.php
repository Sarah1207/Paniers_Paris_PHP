<header id="header">

<div class="container">

  <div class="row">


    <!--LOGO-->
    <div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
      <a href="index.php"> <img src="img/Logo_blanc.png" alt="Logo Paniers Paris" id="logo"> </a>
    </div>

    <!--HAMBURGER POUR VERSION MOBILE-->
    <div>
      <img src="img/menuHamburger.png" alt="Menu" id="menuHamburger">
    </div>

    <!--NAV-->
    <div class="nav col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7">
      <nav id="navHeader" class="text-center text-nowrap">
        <a href="index.php"> <img src="img/puce_nav_blanc.png" alt="puce_nav_blanc"> Concept</a>
        <a href="paniersdumois.php"> <img src="img/puce_nav_blanc.png" alt="puce_nav_blanc"> Paniers du mois</a>
        <a href="macommande.php"> <img src="img/puce_nav_blanc.png" alt="puce_nav_blanc"> Ma Commande</a>
        <a href="communaute.php"> <img src="img/puce_nav_blanc.png" alt="puce_nav_blanc"> Communauté</a>
      </nav>
    </div>



    <!--SE CONNECTER/ CREER COMPTE-->
    <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">

      <div id="connexion" class="infoscompte">



        <?php if( userConnect() ) : ?>



          <!-- pseudo -->
          <h5> <?php echo '<i class="fas fa-user-alt"></i> ' .  $_SESSION['membre']['pseudo'];?></h5>
          <br><br>

          <!--MA COMMANDE-->
          <?php
            /************ code pour afficher le nombre de produits au niveau du header ***********/

            if (isset ($_SESSION["commande"]) ) {
              for ($i = 0; $i < count($_SESSION["commande"]["id_panier"]); $i++) {
                $quantite = $_SESSION["commande"]["quantite"][$i];
              }
            } else if (!isset ($_SESSION["commande"])) {
              $quantite = "";
            }

            if (isset($_POST["payer"])) {
            $quantite = "";
            }

            ?>

          <h5> 
            <a href="macommande.php">
              <span> <?= $quantite ?> &nbsp;</span>
              <i class="fas fa-shopping-basket"> </i> 
            </a> 
          </h5>

          <br><br>

           <!--DECONNEXION--> 
          <button><a href="?action=deconnexion" style="color:black; font-size:1.4rem;"> Deconnexion </a><br></button><br><br>

       
          <?php if( isset($_GET['action']) && $_GET['action'] == 'deconnexion' ){
            //Si il y a une 'action' dans l'URL ET que cette action est égale à 'deconnexion', alors on détruit la session
        
            deconnexion();
          
          } ?>





        <?php else : ?>


          <h5><i class="fas fa-user-alt"></i><a href="compte.php">&nbsp; Mon compte </a></h5>
          
          <form method="POST" action="compte.php">
            <input type="text" name="pseudo" id="pseudo" placeholder="Votre pseudo">
            <input type="password" name="mdp" id="mdp" placeholder="Votre mot de passe">
            <input type="submit" name="connect1" id="connect1" value="Se Connecter">
          </form>

          <?php echo $error1;?>

          <span><small> <a href="compte.php">Créer un compte <br></a>
          <a href="">Mot de passe oublié ? <br> Cliquez ici</a> </small></span>




        <?php endif; ?>


      </div>

    </div>

  </div>

</div>

</header>
