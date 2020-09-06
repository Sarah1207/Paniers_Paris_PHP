<?php

//Fonction debug()
function debug( $arg ){

    echo '<div style="background:#fda500; padding: 5px; z-index:1000;">';

    $trace = debug_backtrace(); 

    echo 'Debug demandé dans le fichier ' . $trace[0]['file'] . ' a la ligne ' . $trace[0]['line'] ;

        print '<pre>';
            print_r( $arg );
        print '</pre>';

    echo '</div>';
    
}


//------------------------------------------------------
//Fonction execute_requete()
function execute_requete($req){

    global $pdo; 

    $pdostatement = $pdo->query($req);

    return $pdostatement;
}
//------------------------------------------------------

//Fonction userConnect() 
function userConnect(){

  if( !isset( $_SESSION['membre'] ) ){
    return false;
  } else { 

    return true;
    exit();
  }
}

//DECONNEXION :
function deconnexion(){


        if( userConnect() ){ //Si l'internaute est connecté, on le redirige vers la page de profil
            session_destroy();
            //redirection vers le profil.php
            header('location:index.php');
            //exit();
        }
        
}



/*********** FONCTION POUR CREER LA SESSION COMMANDE **********/
function creation_commande()
{
  if (!isset($_SESSION["commande"]) ) {

    $_SESSION["commande"] = array();

    $_SESSION["commande"]["id_panier"] = array();
    $_SESSION["commande"]["nom_panier"] = array();
    $_SESSION["commande"]["quantite"] = array();
    $_SESSION["commande"]["prix_panier"] = array();
  }
}


/*********FONCTION POUR AJOUTER UNE SELECTION A LA COMMANDE***********/
function ajout_commande($id_panier, $nom_panier, $quantite, $prix_panier)
{

  creation_commande();

  $position_commande = array_search($id_panier, $_SESSION["commande"]["id_panier"]);

  if ($position_commande !== false) {
    $_SESSION["commande"]["quantite"][$position_commande] += $quantite;
  } else {
    $_SESSION["commande"]["id_panier"][] = $id_panier;
    $_SESSION["commande"]["nom_panier"][] = $nom_panier;
    $_SESSION["commande"]["quantite"][] = $quantite;
    $_SESSION["commande"]["prix_panier"][] = $prix_panier;
  }
}


/*********FONCTION POUR CALCULER LE MONTANT TOTAL DE LA COMMANDE***********/
function montant_total()
{
  $total = 0;

  for ($i = 0; $i < count($_SESSION["commande"]["id_panier"]); $i++) {
    $total += $_SESSION["commande"]["prix_panier"][$i] * $_SESSION["commande"]["quantite"][$i];
  }

  return $total;
}


/*********FONCTION POUR SUPPRIMER UNE LIGNE  DE LA COMMANDE***********/
function supprimer_panier($id_panier_a_supprimer)
{

  $position_produit = array_search($id_panier_a_supprimer, $_SESSION["commande"]["id_panier"]);

  if ($position_produit !== false) {
    array_splice($_SESSION["commande"]["id_panier"], $position_produit, 1);
    array_splice($_SESSION["commande"]["nom_panier"], $position_produit, 1);
    array_splice($_SESSION["commande"]["quantite"], $position_produit, 1);
    array_splice($_SESSION["commande"]["prix_panier"], $position_produit, 1);
  }
}
