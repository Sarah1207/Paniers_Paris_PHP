<?php require_once "inc/init.inc.php"; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta name="description" content="Contactez-nous en cas de réclamations, problèmes ou simples questions !"> 
  <meta name="keywords" content="paniers, contact, aide, paris"/> 

  <meta name="robots" content="contact"/>

  
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
  <link rel="stylesheet" href="css/bootstrap-grid.css">
  <link rel="stylesheet" href="css/style.css">

  <title>Contact</title> 

</head>

<body>

  <!--HEADER-->
  <?php require_once "inc/header.inc.php"; ?>
  <!-- FIN HEADER-->

<!-- CONTACTS-->
  <main>
    <section id="contact">

      <div class="container">
            
        <div class="row">

          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h2>Nous contacter ?</h2>
          </div>

          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    
            <form action="" id="formCtc">
                        
              <table class="form-contact">

                <tr>
                  <td>
                    <label for="nomCtc">Votre nom<span class="required">*</span></label>
                  </td>
                  <td>
                  <input type="text" placeholder="Tapez votre nom" id="nomCtc">
                  </td>
                </tr>

                <tr>
                  <td>
                  <label for="emailCtc">Votre e-mail<span class="required">*</span></label>
                  </td>
                  <td>
                  <input type="email" placeholder="Tapez votre adresse email" id="emailCtc">
                  </td>
                </tr>
                            
                <tr>
                  <td>
                  <label for="comCtc">Commentaire<span class="required">*</span></label>
                  </td>
                  <td>
                  <textarea name="Commentaire" id ="comCtc" class="long field-textarea"></textarea>
                  </td>
                </tr>

                <tr>
                  <td></td>
                  <td>
                  <button type="submit" value="Envoyer" id="btnEnvoyer">Envoyer</button>
                  <button type="reset" value="Réinitialiser" id="btnReinitial">Réinitialiser</button>  
                  </td>
                </tr>

              </table>

            </form>
                    
            <!--affichage avec JS-->
            <p id="erreurCtc"> </p>

          </div>
                
          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    
            <section id="adresse">
              <h2>Où nous trouver ?</h2>
              
              <p>
              <span>
               Adresse : 63 rue de la Verrerie, 75004 Paris
              </span>
              </p>

              <p>
              <span>
              Téléphone : +33 1 22 33  44
              </span>
              </p>

              <p>
              <span>
              Télécopie : +33 1 22 33 44 55
              </span>
              </p>

              <p> 
                <span>
                Contact équipe : <a href="mailto:ppcontact@paniers-paris.com">ppcontact@paniers-paris.com</a>
                </span>
              </p>

              <div class="map-responsive">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10500.052022249629!2d2.3436832019887484!3d48.85796238786383!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1da55fe3fb%3A0x460248558f32727f!2s63%20Rue%20de%20la%20Verrerie%2C%2075004%20Paris!5e0!3m2!1sfr!2sfr!4v1595591658872!5m2!1sfr!2sfr" width="400" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
              </div class="map-responsive">

            </section>

          </div>
                
        </div>

      </div>

    </section>

  </main>
    
<!-- FIN CONTACTS-->

<?php require_once "inc/footer.inc.php"; ?> 

</body>

<script src="javascript/script_footer.js"> </script>
<script src="javascript/script_header.js"> </script>
<script src="javascript/script_formcontact.js"> </script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</html>