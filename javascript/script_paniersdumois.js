/*CE CODE PERMET D'AFFICHER LA DESCRIPTION COMPLETE DES PANIERS*/
/*PAGE PANIERS DU MOIS*/

document.addEventListener("DOMContentLoaded", function () {


    
    /*panier 1*/
    var ensavoirplus1 = document.getElementById("ensavoirplus1");
    var descriptionpanier1 = document.getElementById("descriptionpanier1");

    ensavoirplus1.addEventListener("click", function () {
        if (descriptionpanier1.style.display == "none") {
            descriptionpanier1.style.display = "block";
        } else {
            descriptionpanier1.style.display = "none"
        }
    });

    /*panier 2*/
    var ensavoirplus2 = document.getElementById("ensavoirplus2");
    var descriptionpanier2 = document.getElementById("descriptionpanier2");

    ensavoirplus2.addEventListener("click", function () {
        if (descriptionpanier2.style.display == "none") {
            descriptionpanier2.style.display = "block";
        } else {
            descriptionpanier2.style.display = "none"
        }
    });

    /*panier 3*/
    var ensavoirplus3 = document.getElementById("ensavoirplus3");
    var descriptionpanier3 = document.getElementById("descriptionpanier3");

    ensavoirplus3.addEventListener("click", function () {
        if (descriptionpanier3.style.display == "none") {
            descriptionpanier3.style.display = "block";
        } else {
            descriptionpanier3.style.display = "none"
        }
    });





    /*CE CODE PERMET D'AFFICHER UNE DIV MODAL  POUR CONFIRMER QUE LE PRODUIT A ETE AJOUTE A MA COMMANDE*/
    /*PAGE PANIERS DU MOIS */

    /*panier 1*/
    var ajoutCommande1 = document.getElementById("ajoutCommande1");
    var alertAjoutPanier = document.getElementById("alertAjoutPanier");

    ajoutCommande1.addEventListener("click", function () {
        if (alertAjoutPanier.style.display == "none") {
            alertAjoutPanier.style.display = "block"
        } else { alertAjoutPanier.style.display = "none" }
    });

    /*panier 2*/
    var ajoutCommande2 = document.getElementById("ajoutCommande2");
    var alertAjoutPanier = document.getElementById("alertAjoutPanier");

    ajoutCommande2.addEventListener("click", function () {
        if (alertAjoutPanier.style.display == "none") {
            alertAjoutPanier.style.display = "block"
        } else { alertAjoutPanier.style.display = "none" }
    });


    /*panier 3*/
    var ajoutCommande3 = document.getElementById("ajoutCommande3");
    var alertAjoutPanier = document.getElementById("alertAjoutPanier");

    ajoutCommande3.addEventListener("click", function () {
        if (alertAjoutPanier.style.display == "none") {
            alertAjoutPanier.style.display = "block"
        } else { alertAjoutPanier.style.display = "none" }
    });


    //CE CODE PERMET DE FERMER LA DIV MODAL EN CLIQUANT SUR L'ICONE

    var closeAlertAjoutPanier = document.getElementById("closeAlertAjoutPanier");
    var alertAjoutPanier = document.getElementById("alertAjoutPanier");

    closeAlertAjoutPanier.addEventListener("click", function () {
        alertAjoutPanier.style.display = "none";
    });



});











