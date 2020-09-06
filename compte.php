<?php require_once "inc/init.inc.php"; ?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Création de compte !">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">

  <link rel="stylesheet" href="css/bootstrap-grid.css">
  <link rel="stylesheet" href="css/style.css">

  <title> Connexion - Création de compte</title>
</head>


<body id="compte">
<main>

<!-------------------- APPEL HEADER.PHP --------------------->
  
<?php require_once "inc/header.inc.php"; ?>




<!------------------- APPEL FORM CONNECT1.PHP ------------------> 

<?php require_once "connect1.php"; ?>




<!-------------------- APPEL FORM INSCRIPTION.PHP ------------------> 

<?php require_once "inscription.php"; ?>



 


<?php require_once "inc/footer.inc.php"; ?>

</body>

<script src="javascript/script_header.js"> </script>
<script src="javascript/script_footer.js"></script>
<script src="javascript/script_compte.js"></script>

</html>