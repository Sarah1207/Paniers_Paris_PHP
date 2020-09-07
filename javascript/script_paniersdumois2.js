 /*CE CODE PERMET D'AFFICHER LA DESCRIPTION COMPLETE DES PANIERS*/
/*PAGE PANIERS DU MOIS*/
 
 
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

