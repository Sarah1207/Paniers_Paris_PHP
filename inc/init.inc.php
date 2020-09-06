<?php session_start(); ?>

<?php

//Connexion à la BDD :
$pdo = new PDO('mysql:host=localhost;dbname=paniers_paris', 'root', '', 
array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES UTF8" ) );

//------------------------------------------------------
//Definition d'une constante :
define( 'URL', "http://localhost:8080/paniers_paris/" );

//------------------------------------------------------
//Déclaration de variables :
$content1 = ''; // formulaire connexion
$content2 = ''; // formulaire inscription
$error1 = '' ; // renvoie les erreurs form1
$error2 = ''; // renvoi les erreurs form 2
$compte = ''; // encadré header 


//-------------------------------------------------------
//Déclaration variable pour page paniers & ma commande (Sarah)

$panierleger = "";
$panierduo = "";
$panierbig = "";
$content = "";
$error = "";
$confirmation ="";
$quantite ="";


//------------------------------------------------------
?>

<?php require_once "fonction.inc.php"; ?>