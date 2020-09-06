<?php require_once "inc/init.inc.php";
//-----------------------------------------------------


if( isset($_POST['connect1']) ){ //Si je valide le formulaire ("connect")
  
$pdostatement = $pdo->query(" SELECT * FROM membre WHERE pseudo = '$_POST[pseudo]' ");


if( $pdostatement->rowCount() >= 1  ){ 

    $membre = $pdostatement->fetch( PDO::FETCH_ASSOC );
    //debug( $membre );

    //Verification du mot de passe 
    if( password_verify( $_POST['mdp'], $membre['mdp'] ) ){

        $_SESSION['membre']['id_membre'] = $membre['id_membre'];
        $_SESSION['membre']['pseudo'] = $membre['pseudo'];
        $_SESSION['membre']['prenom2'] = $membre['prenom2'];
        $_SESSION['membre']['nom2'] = $membre['nom2'];
        $_SESSION['membre']['tel2'] = $membre['tel2'];
        $_SESSION['membre']['start2'] = $membre['start2'];
        $_SESSION['membre']['adresse2'] = $membre['adresse2'];
        $_SESSION['membre']['ville2'] = $membre['ville2'];
        $_SESSION['membre']['cp2'] = $membre['cp2'];
        $_SESSION['membre']['email2'] = $membre['email2'];
        $_SESSION['membre']['mdp'] = $membre['mdp'];
        
        $content1 .= 'FELICITATION ! ' . "$membre[pseudo]" . " vous etes bien connecté";
        header('location:index.php');
      }else{
        $error1 .= "Erreur de mdp";
      }
      }  
      else {    
          $error1 .= "Erreur de pseudo";
      }  
      
      } 
?>
<div class="container">
      
      <div class="row">

        <!-- FORM 1 -->
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
        
          <div>
            <form method="post" id="form1">
              <h1>Déja un compte client ?</h1>

              <label for="pseudo">Pseudo : </label>
              <input type="text" name="pseudo" placeholder="Taper votre pseudo" id="pseudo">
              <br>

              <label for="mdp"> Mot de passe : </label>
              <input type="password" name="mdp"  id="mdp">
              <br>

              <p class="champs"><i><u>Mot de passe oublié ?</u></i></p>
              <br>

              <input type="submit" name="connect1" id="connect1" value="connexion"></input>
              <br>
              <?php  echo $content1; 
                    echo $error1 ?>

              <!--affichage avec JS-->
              <p id="p1"> </p>
              
            </form>
          </div>

        </div>




