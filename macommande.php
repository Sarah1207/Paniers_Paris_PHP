<?php require_once "inc/init.inc.php"; ?>



<?php


/************ CREATION SESSION COMMANDE (à partir de la page paniersdumois ) ***********/
if (isset($_POST["ajoutCommande1"]) ) {

  $pdostatement = execute_requete("SELECT * FROM paniers WHERE id_panier = '$_POST[id_panier]' ");

  $produit_commande = $pdostatement->fetch(PDO::FETCH_ASSOC);

 ajout_commande($produit_commande["id_panier"], $produit_commande["nom_panier"], $_POST["quantite"], $produit_commande["prix_panier"]);
 
}


if (isset($_POST["ajoutCommande2"]) ) {

  $pdostatement = execute_requete("SELECT * FROM paniers WHERE id_panier = '$_POST[id_panier]' ");

  $produit_commande = $pdostatement->fetch(PDO::FETCH_ASSOC);

 ajout_commande($produit_commande["id_panier"], $produit_commande["nom_panier"], $_POST["quantite"], $produit_commande["prix_panier"]);
 
}


if (isset($_POST["ajoutCommande3"]) ) {

  $pdostatement = execute_requete("SELECT * FROM paniers WHERE id_panier = '$_POST[id_panier]' ");

  $produit_commande = $pdostatement->fetch(PDO::FETCH_ASSOC);

 ajout_commande($produit_commande["id_panier"], $produit_commande["nom_panier"], $_POST["quantite"], $produit_commande["prix_panier"]);
 
}
/************ FIN CREATION SESSION COMMANDE (à partir de la page paniersdumois ) ***********/





/************* ENREGISTREMENT BDD -- TABLE COMMANDE (au submit "payer") *************/
if (isset($_POST["payer"]) ) {


  for ($i = 0; $i < count($_SESSION["commande"]["id_panier"]); $i++) {

    $r = execute_requete("INSERT INTO commande (id_membre, id_panier, quantite, prix)   
    VALUES("
      . $_SESSION['membre']['id_membre'] . ","
      . $_SESSION['commande']['id_panier'][$i] . ","
      . $_SESSION['commande']['quantite'][$i] . ","
      . $_SESSION['commande']['prix_panier'][$i] * $_SESSION['commande']['quantite'][$i]
      .  ") ");

    $last_id = $pdo-> lastInsertId();

    /******************** Modifier le stock dans la table paniers ******** */
    $r = execute_requete("UPDATE paniers SET stock = stock - "
      . $_SESSION['commande']['quantite'][$i]
      . " WHERE id_panier = "
      . $_SESSION['commande']['id_panier'][$i]
      . " ");
    /******************** fin modif stock dans la table paniers ******** */

  }


  /*****vider la session commande une fois la commande "payer" ***/
  unset($_SESSION["commande"]);

  // ici pas de "." car on affiche le message de confirmation et on n'affiche plus le tableau commande
  $content = "<p class='confirmation_commande'> 
              <i class='far fa-check-square'> </i> &nbsp;
              Votre commande a bien été enregistrée. 
              <br> 
              Nous vous invitons à retirer vos achats dans notre boutique à l'accueil <br> Click & Collect. 
              <br> <br>
              <i class='fas fa-exclamation'></i> &nbsp; <u> Référence commande : <u> N° $last_id 
              </p>

              <p class='apres_commande'>
              <i class='fas fa-long-arrow-alt-right'></i> &nbsp;  <a href='contact.php'>Voir l'adresse </a>
              <br> 
              <i class='fas fa-long-arrow-alt-right'></i> &nbsp; <a href='paniersdumois.php'>Nouvelle commande </a>
              <br> 
              <i class='fas fa-long-arrow-alt-right'></i> &nbsp; <a href='index.php'> Retour à l'accueil </a>
              </p>";
//fermeture if 
}

/************* FIN ENREGISTREMENT BDD -- TABLE COMMANDE (au submit "payer") *************/



/**************************** SUPPRESSION COMMANDE ENTIERE *********************************** */

if (isset($_GET["action"]) && $_GET["action"] =='vider' ) {
  unset ($_SESSION["commande"]);
}

/**************************** FIN SUPPRESSION COMMANDE ENTIERE *********************************** */




/**************************** SUPPRESSION D'UNE LIGNE *********************************** */
if (isset($_GET["action"]) && $_GET["action"] == "suppression_panier") {
  supprimer_panier($_GET["id_panier"]);
  $content .= "<h4> Votre sélection a bien été supprimée.</h4>"; 
}
/**************************** FIN SUPPRESSION D'UNE LIGNE *********************************** */




/****************************** AFFICHAGE DU TABLEAU AVEC SESSION ********************************** */
if (!userConnect()) {

  $content .= "<table>";

    $content .= "<tr> <td> <a href='compte.php'> Se connecter </a> ou <a href='compte.php'> Créer un compte </a> </td> </tr>";

  $content .= "</table>";

} else if  (!isset($_SESSION["commande"]) && userConnect()) {

  $content .= "<table>";

  $content .= "<tr> <td> <a href='paniersdumois.php'> Découvrir les paniers du mois</a> </td> </tr>";

  $content .= "</table>";

} else if (isset($_SESSION["commande"]) ) {

  $content .= "<table>";

  $content .= "<tr>
              <th> Nom panier </th>
              <th> Quantité </th>
              <th> Prix unitaire TTC </th>
              <th> Prix total TTC </th>
              <th> Supprimer </th>
            </tr>";

  
  for ($i = 0; $i < count($_SESSION["commande"]["id_panier"]); $i++) {

    $content .= "<tr>";

    $content .= "<td>" . $_SESSION["commande"]["nom_panier"][$i] . "</td>";
    $content .= "<td>" . $_SESSION["commande"]["quantite"][$i] . "</td>";
    $content .= "<td>" . $_SESSION["commande"]["prix_panier"][$i] . " &#128;" . "</td>";
    $content .= "<td>" . $_SESSION["commande"]["prix_panier"][$i] * $_SESSION["commande"]["quantite"][$i]  . " &#128;" . "</td>";

    /**************************** suppression d'une ligne de la commande $_GET *******************************/
    $content .= "<td>"
              . "<a href='?action=suppression_panier&id_panier="
              . $_SESSION["commande"]["id_panier"][$i]
              . "'>"
              . "<i class='fas fa-trash-alt'> </i> </td> </tr>";
    /****************************  fin supression d'un article du panier $_GET *******************************/
    
  // fermeture boucle for
  }

    
    /**************Calcul montant total de la commande**************/
    $content .= "<tfoot> <tr> <td colspan=3> Montant de votre commande </td> <td colspan=2>"
      . montant_total()
      . " &#128;"
      .  " </td> </tr> </tfoot>";
    /************** FIN Calcul montant total de la commande**************/

    $content .= "</table>";


    // suppression de la commande en entier
    $content .= " <h6> <a href='?action=vider'> Supprimer l'intégralité de ma commande </a> </h6>";




    $content .= "<form method='POST'>";
      $content .= "<input type='submit' value='Payer' name='payer'>";
      $content .= "<button> <a href='paniersdumois.php'> Ajouter un produit </a> </button>";
    $content .= "</form>";



// fermeture else if 
}

/****************************** FIN AFFICHAGE DU TABLEAU AVEC SESSION ********************************** */

?>





<!------------------------------------------------------------------------------------------------------->

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Confirmez votre commande en un clic">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
  <link rel="stylesheet" href="css/bootstrap-grid.css">
  <link rel="stylesheet" href="css/style.css">

  <title>Ma commande</title>
</head>


<body>

  <!-------------------- APPEL HEADER.PHP --------------------->
  <?php require_once "inc/header.inc.php"; ?>


  <!----------------------------MA COMMANDE--------------------------------------->
  <main>

    <div class="container">

      <div class="row">

        <!---------------TITRE---------------------->
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <h2> <i class="fas fa-shopping-basket"></i> Ma Commande</h2>
        </div>
        <!--------------- FIN TITRE---------------------->

        <!--------------------TABLE--------------------->
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <div id="maCommande">
            <!-- affichage PHP de la commande sous forme de tableau -->
            <?= $content ?>
          </div>
        </div>
        <!-------------------- FIN TABLE--------------------->


        <!-- fermeture div class row -->
      </div>

      <!-- fermeture div class container -->
    </div>

  </main>
  <!------------------------------FIN MA COMMANDE------------------------------------>


  <!---footer PHP -->
  <?php require_once "inc/footer.inc.php"; ?>


</body>

<script src="javascript/script_footer.js"> </script>
<script src="javascript/script_header.js"> </script>

</html>
