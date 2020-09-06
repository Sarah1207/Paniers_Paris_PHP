
<?php require_once "inc/init.inc.php"; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta name="description" content="Un espace chat dédié aux membres du réseau Paniers-Paris"> 
  <meta name="keywords" content="communauté, communication, chat, annonces, instructions"/> 

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="javascript/script_communaute.js"></script>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
  <link rel="stylesheet" href="css/bootstrap-grid.css">
  <link rel="stylesheet" href="css/style.css">

  <title>Communauté</title>
      
</head>


<body>

  <!--HEADER-->
  <?php require_once "inc/header.inc.php"; ?>
  <!-- FIN HEADER-->

  <!--MAIN-->
  <main id="communaute">

      <h2>Espace Communauté</h2>
      
        <div class="container">

          <div class="row">

            <!--ANNONCES SITE-->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-16 col-xl-6">
            
                <article id="annoncesCom" class="article">
                    
                    <div class="titres-articles">
                        <h4>Annonces</h4>
                    </div>

                    <div id="annonces-slider">
                        <div class="text-annonces">
                          <p><b>Congés été :</b> L'équipe de Paris-Paniers prendra ses congés du 1er au 18 août, vos commandes seront mises en attentes d'ici là. 
                          A bientôt! </p>
                        </div>
                        
                        <div class="text-annonces">
                          <p><b>Jusqu'au 1er août :</b> Faites le plein de fruits et légumes du soleil ! Tomates variétés anciennes, carottes, abricots et prunes disponibles en stocks ! </p>
                        </div>

                        <div class="text-annonces">
                          <p><b>Anniversaire :</b> Toute l'équipe de Paniers-Paris souhaite un joyeux anniversaire ensoleillé à Thomas, membre de notre réseau depuis 3 mois !</p>
                        </div>
                    </div>

                </article>

            </div>

            <!--INSTRUCTIONS SITE-->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-16 col-xl-6">
                
              <article  class="article">
                  
                <div class="titres-articles">
                  <h4>Instructions</h4>
                </div>
                  
                <div id="instructionsCom">
                  <p><b>Bienvenue dans l'espace Communauté de Paniers-Paris !
                  Ce chat est mis à votre disposition afin que nos membres puissent communiquer entre eux.
                  En vous connectant à votre compte, vous avez accès directement à cette fonctionnalité.
                  Il ne vous reste plus qu'à vous exprimer en saisissant votre message dans l'espace texte sous la fenêtre de chat et envoyer. </b>  </p>

                  <p id="avert">
                  Attention : veuillez échanger dans la courtoisie et le respect.
                  Tout abus ou mésusage entraînera une suspension provisoire de votre compte ou sa suppression définitive en cas de récidive. 
                  Dans un tel cas, vous serez averti et votre dernière commande en cours sera honorée.
                  <br>
                  <br>
                  Pour toutes informations, se référer à nos conditions d'utilisation accessibles depuis
                  (&laquo; Mentions légales &raquo;).
                  </p>
                  <br>
                  <p id="signaturePP">
                  -l'équipe Paniers-Paris- 
                  </p>

                </div>
              </article>
            
            </div>

            <div class="container" id="chat-block" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                
                <!--CHAT STATUTS-->
                <table class="status">
                    
                    <tr>
                    
                        <td>
                            <span id="statusResponse">

                            </span>

                            <select name="status" id="status" style="width:200px;" onchange="setStatus(this)">
                            
                                <option value="0">Absent</option>
                                
                                <option value="1">Occup&eacute;</option>
                                
                                <option value="2" selected>En ligne</option>
                        
                            </select>
                        </td>
                    
                    </tr>
                
                </table>

                <!-- ZONE MESSAGES -->
                <table class="chat">
                    
                    <tr>		
                    
                        <td valign="top" id="text-td">
                            
                            <div id="annonce">


                            </div>
                            
                                <div id="text">
                                    
                                    <div id="loading">
                                        
                                        <span class="info" id="info">Chargement du chat en cours...</span>
                                        <br>
                                        <img src="gif/ajax-chat-loader.gif" alt="patientez...">
                                        
                                    </div>
                                
                                </div>
                        </td>
                            
                        <!-- COLONNE MEMBRES CONNECTÉS AU CHAT -->
                        <td valign="top" id="users-td"><div id="users">Chargement</div></td>
                    
                    </tr>
                
                </table>

                <!-- ZONE SAISIE TEXTE -->
                <a name="post">

                </a>

                <table class="post-message">
                    
                    <tr>
                    
                        <td>
                            
                            <form action="" method="" onsubmit="envoyer(); return false;">
                                
                                <input type="text" id="message" maxlength="255"/>
                                <input type="button" id="post" onclick="envoyer()" value="Envoyer"/>
                            
                            </form>
                                
                            <div id="responsePost" style="display:none">
                            
                            </div>
                        
                        </td>
                    
                    </tr>
                
                </table>

            </div>

          </div>

        </div>
  
  </main>
  <!--FIN MAIN-->



  <?php require_once "inc/footer.inc.php"; ?>

<script src="javascript/script_header.js"> </script>
<script src="javascript/script_footer.js"></script>

</html>