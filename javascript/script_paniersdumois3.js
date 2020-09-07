/*CE CODE PERMET D'AFFICHER LA DESCRIPTION COMPLETE DES PANIERS*/
/*PAGE PANIERS DU MOIS*/

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

