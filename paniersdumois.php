<?php require_once "inc/init.inc.php"; ?>



<?php

/********************** affichage du détail du panier 1 (Panier Léger) *****************************/
if (isset($_GET['id_panier'])  && $_GET['id_panier'] == "1") {

  $pdostatement = execute_requete("SELECT id_panier, nom_panier, description_panier, prix_panier, Composition, poids_panier AS 'Poids', stock AS 'Disponibilité' FROM paniers WHERE id_panier = '$_GET[id_panier]' ");

  $panier = $pdostatement->fetch(PDO::FETCH_ASSOC);

  foreach ($panier as $key => $value) {

    if ($key == "id_panier") {
      $panierleger .= "<p style ='display:none'> <b> $key </b> : $value </p>";
    } else if ($key == "nom_panier") {
      $panierleger .= "<p style ='display:none'> <b> $key </b> : $value </p>";
    } else if ($key == "description_panier") {
      $panierleger .= "<p style ='display:none'> <b> $key </b> : $value </p>";
    } else if ($key == "prix_panier") {
      $panierleger .= "<p class = 'prixpanier value'> $value &euro;</p>";
    } else if ($key == "Composition") {
      $panierleger .= "<p id='ensavoirplus1' class='value'>
                      <b> En savoir plus</b> &nbsp; 
                      <i class='far fa-plus-square'></i>
                      </p>";

      $r = execute_requete("SELECT nom_produit FROM detail_paniers WHERE id_panier = '$_GET[id_panier]' ");

      $panierleger .= "<ul id='descriptionpanier1'>";
      while ($produits = $r->fetch(PDO::FETCH_ASSOC)) {
        foreach ($produits as $key => $value) {
          $panierleger .= "<li> $value </li>";
        }
      }
      $panierleger .= "</ul>";
    } else if ($key == "Poids") {
      $panierleger .= "<p class='value'> <b> $key </b> : $value Kg</p>";
    } else {
      $panierleger .= "<p class='value'> <b> $key </b> : $value </p>";
    }
  }
  /************************* FIN affichage du détail du panier 1 (Panier Léger) ********************* */


  /****************** Gestion stock et bouton ma commande pour panier 1(Panier Léger) **************** */
  if ($panier["Disponibilité"] > 0) {

    $panierleger .= "<form method='post'action='macommande.php'>";

    $panierleger .= "<label class='quantitepanier'> <b> Quantité </b> </label>";
    $panierleger .= '<select name="quantite">';
    for ($i = 1; $i <= $panier['Disponibilité']; $i++) {
      $panierleger .= "<option> $i </option>";
    }
    $panierleger .= '</select><br><br>';


    $panierleger .= "<input type='hidden' name='id_panier' value='$_GET[id_panier]' >";

    $panierleger .= "<input type='submit' name='ajoutCommande1' id='ajoutCommande1' value='Ajouter à ma commande'>";

    $panierleger .= '</form>';

  } else {
    $panierleger .= "<p class='value'> En rupture de stock </p>";
  }
  /****************** FIN Gestion stock et bouton ma commande pour panier 1(Panier Léger) **************** */
}





/********************** affichage du détail du panier 2 (Panier Duo) *****************************/
if (isset($_GET['id_panier'])  && $_GET['id_panier'] == "2") {

  $r = execute_requete("SELECT id_panier, nom_panier, description_panier, prix_panier, Composition, poids_panier AS 'Poids', stock AS 'Disponibilité' FROM paniers WHERE id_panier = '$_GET[id_panier]' ");

  $panier = $r->fetch(PDO::FETCH_ASSOC);

  foreach ($panier as $key => $value) {

    if ($key == "id_panier") {
      $panierduo .= "<p style ='display:none'> <b> $key </b> : $value </p>";
    } else if ($key == "nom_panier") {
      $panierduo .= "<p style ='display:none'> <b> $key </b> : $value </p>";
    } else if ($key == "description_panier") {
      $panierduo .= "<p style ='display:none'> <b> $key </b> : $value </p>";
    } else if ($key == "prix_panier") {
      $panierduo .= "<p class = 'prixpanier value'> $value &euro;</p>";
    } else if ($key == "Composition") {
      $panierduo .= "<p id='ensavoirplus2' class='value'> 
                    <b> En savoir plus</b> &nbsp; 
                    <i class='far fa-plus-square'> </i>
                    </p>";

      $r = execute_requete("SELECT nom_produit FROM detail_paniers WHERE id_panier = '$_GET[id_panier]'  ");

      $panierduo .= "<ul id='descriptionpanier2'>";
      while ($produits = $r->fetch(PDO::FETCH_ASSOC)) {
        foreach ($produits as $key => $value) {
          $panierduo .= "<li> $value </li>";
        }
      }
      $panierduo .= "</ul>";
    } else if ($key == "Poids") {
      $panierduo .= "<p class='value'> <b> $key </b> : $value Kg</p>";
    } else {
      $panierduo .= "<p class='value'> <b> $key </b> : $value </p>";
    }
  }
  /************************* FIN affichage du détail du panier 2 (Panier Duo) ********************* */


  /****************** Gestion stock et bouton ma commande pour panier 2(Panier DUO) **************** */
  if ($panier["Disponibilité"] > 0) {

    $panierduo .= "<form method='post'action='macommande.php'>";

    $panierduo .= "<label class='quantitepanier'> <b> Quantité </b> </label>";
    $panierduo .= '<select name="quantite">';
    for ($i = 1; $i <= $panier['Disponibilité']; $i++) {
      $panierduo .= "<option> $i </option>";
    }
    $panierduo .= '</select><br><br>';


    $panierduo .= "<input type='hidden' name='id_panier' value='$_GET[id_panier]' >";

    $panierduo .= "<input type='submit' name='ajoutCommande2' id='ajoutCommande2' value='Ajouter à ma commande'>";

    $panierduo .= '</form>';

  }  else {
    $panierduo.= "<p class='value'> En rupture de stock </p>";
  }
  /****************** FIN Gestion stock et bouton ma commande pour panier 2(Panier DUO) **************** */
}





/********************** affichage du détail du panier 3 (Panier BIG) *****************************/
if (isset($_GET['id_panier'])  && $_GET['id_panier'] == "3") {

  $r = execute_requete("SELECT id_panier, nom_panier, description_panier, prix_panier, Composition, poids_panier AS 'Poids', stock AS 'Disponibilité' FROM paniers WHERE id_panier = '$_GET[id_panier]' ");

  $panier = $r->fetch(PDO::FETCH_ASSOC);

  foreach ($panier as $key => $value) {

    if ($key == "id_panier") {
      $panierbig .= "<p style ='display:none'> <b> $key </b> : $value </p>";
    } else if ($key == "nom_panier") {
      $panierbig .= "<p style ='display:none'> <b> $key </b> : $value </p>";
    } else if ($key == "description_panier") {
      $panierbig .= "<p style ='display:none'> <b> $key </b> : $value </p>";
    } else if ($key == "prix_panier") {
      $panierbig .= "<p class='prixpanier'> $value &euro; </p>";
    } else if ($key == "Composition") {
      $panierbig .= "<p id='ensavoirplus3' class='value'>
                    <b> En savoir plus </b> &nbsp; 
                    <i class='far fa-plus-square'> </i> 
                    </p>";

      $r = execute_requete("SELECT nom_produit FROM detail_paniers WHERE id_panier = '$_GET[id_panier]'  ");

      $panierbig .= "<ul id='descriptionpanier3'>";
      while ($produits = $r->fetch(PDO::FETCH_ASSOC)) {
        foreach ($produits as $key => $value) {
          $panierbig .= "<li> $value </li>";
        }
      }
      $panierbig .= "</ul>";
    } else if ($key == "Poids") {
      $panierbig .= "<p class='value'> <b> $key </b> : $value Kg</p>";
    } else {
      $panierbig .= "<p class='value'> <b> $key </b> : $value </p>";
    }
  }

  /************************* FIN affichage du détail du panier 3 (Panier big) ********************* */

  /****************** Gestion stock et bouton ma commande pour panier 3(Panier big) **************** */
  if ($panier["Disponibilité"] > 0) {

    $panierbig .= "<form method='post'action='macommande.php'>";

    $panierbig .= "<label class='quantitepanier'> <b> Quantité </b> </label>";
    $panierbig .= '<select name="quantite">';
    for ($i = 1; $i <= $panier['Disponibilité']; $i++) {
      $panierbig .= "<option> $i </option>";
    }
    $panierbig .= '</select><br><br>';

    $panierbig .= "<input type='hidden' name='id_panier' value='$_GET[id_panier]' >";
    $panierbig .= "<input type='submit' name='ajoutCommande3' id='ajoutCommande3' value='Ajouter à ma commande'>";

    $panierbig .= '</form>';

  }  else {
    $panierbig .= "<p class='value'> En rupture de stock </p>";
  }

  /****************** FIN Gestion stock et bouton ma commande pour panier 3(Panier big) **************** */
}
?>

<!--------------------------------------------------------------------------------------------------------------- -->


<!DOCTYPE html>

<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta name="description" content="Paniers du mois.Concoctez vos plats avec nos produits frais de saison. Plus la peine de courir : on vous facilite le quotidien !">


  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
  <link rel="stylesheet" href="css/bootstrap-grid.css">
  <link rel="stylesheet" href="css/style.css">

  <title>Paniers du mois</title>

</head>


<body>

  <!-------------------- APPEL HEADER.PHP --------------------->
  <?php require_once "inc/header.inc.php"; ?>

  <main>


    <div class="container">

      <div class="row">
        <!--CHAPO-->
        <div id="titre" class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
          <h2>Paniers du mois</h2>
          <p class="chapo"> Concoctez vos plats avec nos produits frais de saison. Plus la peine de courir : on vous facilite le quotidien!</p>
        </div>
      </div>


      <!---------------------------------------------------------------------------------------------------------------------->
      <div class="row">

        <!--PANIER 1-->
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
          <figure id="figure1" class="paniers">
            <img class="imgpanier" src="img/paniers.jpg" alt="Panier Léger">

            <figcaption>
              <h3> Panier <br> Léger </h3>
              <p class="descriptionpanier"><b> 3 à 3.4 kg de fruits et légumes. <br> Idéal pour les parisiens préssés. <br>Convient pour une personne pour une semaine.</b></p>
              <a href="?id_panier=1"> Découvrir le "Panier Léger" &nbsp; <i class="far fa-minus-square"></i> </a>

              <?= $panierleger ?>

            </figcaption>
          </figure>
        </div>

        <!--PANIER 2-->
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
          <figure id="figure2" class="paniers">
            <img class="imgpanier" src="img/paniers.jpg" alt="Panier Duo">

            <figcaption>
              <h3> Panier <br> Duo</h3>
              <p class="descriptionpanier"> <b>6 à 6.4 kg de fruits et légumes. <br> Idéal pour cuisiner en amoureux.
                  <br>Convient pour deux personnes pour une semaine.</b></p>
              <a href="?id_panier=2"> Découvrir le "Panier Duo" &nbsp; <i class="far fa-minus-square"></i></a>

              <?= $panierduo ?>

            </figcaption>
          </figure>
        </div>

        <!--PANIER  3-->
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
          <figure id="figure3" class="paniers">
            <img class="imgpanier" src="img/paniers.jpg" alt="Panier Duo">

            <figcaption>
              <h3>Panier <br> Big</h3>
              <p class="descriptionpanier"> <b>7.7 à 8 kg de fruits et légumes.
                  <br> Votre famille vous remerciera.
                  <br> Convient pour quatre personnes pour une semaine.</b></p>
              <a href="?id_panier=3"> Découvrir le "Panier Big" &nbsp; <i class="far fa-minus-square"></i> </a>

                  <?= $panierbig ?>

            </figcaption>

          </figure>
        </div>

        <!--fermeture div class row des 3 paniers -->
      </div>

      <!------------------ JS CONFIRMATION AJOUT COMMANDE JS ------------------->
      <div class="row">
        <div id="alertAjoutPanier" class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <p>Votre sélection a été ajoutée à votre commande</p>
          <i id="closeAlertAjoutPanier" class="fas fa-window-close"></i>
        </div>
      </div>
      <!------------------- FIN JS CONFIRMATION AJOUT COMMANDE JS ------------------->



      <!----------------- CONTENU PHP -------------------->
      <?= $content ?>

      <!--- fermeture div class container ---->
    </div>

  </main>


  <!---footer PHP -->
  <?php require_once "inc/footer.inc.php"; ?>


</body>

<script src="javascript/script_header.js"> </script>
<script src="javascript/script_paniersdumois.js"></script>
<script src="javascript/script_footer.js"> </script>

</html>