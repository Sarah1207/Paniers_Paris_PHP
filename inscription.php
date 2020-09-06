
<?php require_once "inc/init.inc.php";

//if( userConnect() ){ //Si l'utilisateur est connecté, on le redirige vers son profil

  //header('location:profil.php');
  //exit();
//}


//------------------------------ OUVERTURE PHP --------------------------------

if( isset($_POST['confirmation'] ) ){ // QUAND JE VALIDE LE FORMULAIRE

//print '<pre>';
  //print_r($_POST);
//print '</pre>';

//---------------------------------------

// CHAMPS OBLIGATOIRES

if(empty($_POST['pseudo'])){

  $error2 .= "<div style='color:red'> Vous devez saisir un pseudo</div>";
}
elseif( strlen( $_POST['pseudo'] ) <= 3 || strlen( $_POST['pseudo']) >= 15 ){ 
$error2 .= '<div style="color:red; font-size:1.25em" >Erreur taille pseudo entre 2 et 15</div>';
}
elseif(empty($_POST['prenom2'])){
  $error2 .= "<div style='color:red; font-size:1.25em'> Vous devez saisir un prenom</div>";
}
elseif(empty($_POST['nom2'])){
  $error2 .= "<div style='color:red; font-size:1.25em'> Vous devez saisir un nom</div>";
}
elseif(empty($_POST['tel2'])){
  $error2 .= "<div style='color:red; font-size:1.25em'> Vous devez saisir un numéro de téléphone</div>";
}
elseif(empty($_POST['adresse2'])){
  $error2 .= "<div style='color:red; font-size:1.25em'> Vous devez saisir une adresse</div>";
}
elseif(empty($_POST['ville2'])){
  $error2 .= "<div style='color:red; font-size:1.25em'> Vous devez saisir une ville</div>";
}
elseif(empty($_POST['cp2'])){
  $error2 .= "<div style='color:red; font-size:1.25em'> Vous devez saisir un code postal valide</div>";
}
elseif(empty($_POST['email2'])){
  $error2 .= "<div style='color:red; font-size:1.25em'> Vous devez saisir une adresse email</div>";
}
elseif(empty($_POST['mdp'])){
  $error2 .= "<div style='color:red; font-size:1.25em'> Vous devez saisir un mot de passe</div>";
}
 
//---------------------------------------

// TEST PSEUDO DISPONIBLE / INDISPONIBLE
$pdostatement = $pdo->query(" SELECT * FROM membre WHERE pseudo = '$_POST[pseudo]' ");

// ADDSLASHES
foreach( $_POST as $index => $value ){

    $_POST[$index] = htmlspecialchars( addslashes( $value ) );
}

//CRYPTAGE DU MOT DE PASSE :
$_POST['mdp'] = password_hash( $_POST['mdp'], PASSWORD_DEFAULT );

if( empty( $error2 )){ //Si ma variable $error est vide

  if( $pdostatement->rowCount() <= 0 ){

//---------------------------------------

// INSERTION DANS LA BDD

    $pdo->query(" INSERT INTO membre( pseudo, prenom2, nom2, tel2, start2, adresse2, ville2, cp2, email2, mdp ) VALUES( 
      '$_POST[pseudo]', 
      '$_POST[prenom2]', 
      '$_POST[nom2]', 
      '$_POST[tel2]',  
      '$_POST[start2]', 
      '$_POST[adresse2]', 
      '$_POST[ville2]', 
      '$_POST[cp2]',
      '$_POST[email2]',
      '$_POST[mdp]'
       )");

$content2 .= "<div style='color:#079992; font-size:1.25em'>
Inscription validée
</div>";
}
else {
  $error2 .= "Pseudo indisponible";
}
}
}
//------------------------------ FERMETURE PHP ---------------------------------------
?>

<!------------------------------ FORMULAIRE 2 DEBUT  -------------------------------->
        
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">

          <form method="post" id="form2">
            <h1>Nouveau client ? </h1>
            <p>
            <span id="coordonnees">Vos coordonnées</span> :
            <br>
            <span class="champs"> <sup>*</sup>champs obligatoire</span>
            </p>
            <br>

            <label for="pseudo">Pseudo<sup>*</sup> :</label>
            <input type="text" name="pseudo" id="pseudo" placeholder="Choisissez un pseudo">
            <br>
            

            <label for="prenom2">Prénom<sup>*</sup> :</label>
            <input type="text" id="prenom2" name="prenom2" placeholder="Tapez votre prénom">
            <br>

            <label for="nom2">Nom<sup>*</sup> :</label>
            <input type="text" name="nom2" id="nom2" placeholder="Tapez votre nom">
            <br>

            <label for="tel2">Téléphone<sup>*</sup> : </label>
            <input type="tel" id="tel2" name="tel2" placeholder="Tapez votre numéro de téléphone"> 
            <br>

            <label for="start2">Date de naissance<sup>*</sup> :</label>
            <input type="text" name="start2" id="start2" placeholder= "JJ/MM/AAAA"> 
            <br>

            <label for="adresse">Adresse<sup>*</sup> :</label>
            <input type="text" id="adresse" name="adresse2" placeholder="Tapez votre adresse">
            <br>

            <label for="ville">Ville<sup>*</sup> :</label>
            <input type="text" id="ville" name="ville2" placeholder="Tapez votre ville">
            <br>

            <label for="cp">Code postal<sup>*</sup> :</label>
            <input type="number" id="cp" name="cp2" placeholder="Tapez votre code postal">
            <br>

            <label for="email2">Adresse email<sup>*</sup> :</label>
            <input type="email" name="email2" id="email2" placeholder="Tapez votre adresse email">
            <br>

            <label for="mdp">Mot de passe<sup>*</sup> :</label>
            <input type="password" name="mdp" id="mdp">
            <br> <br>


            <input type="submit" name="confirmation" value="Envoyer"> </input>
            <br>

            <?php echo $error2; 
                  echo $content2; ?>

</form>


</div>

</div>

</div>

</main>