/*CE CODE PERMET D'AFFICHER LA DESCRIPTION COMPLETE DES PANIERS*/
/*PAGE PANIERS DU MOIS*/


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

   
