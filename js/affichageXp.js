// Récupération des éléments
let div_pro = document.getElementById("cest_professionnel");
let titre_pro = document.getElementById("pro")
let div_scolaire = document.getElementById("cest_scolaire");
let titre_scolaire = document.getElementById("scolaire");
let fleche = document.getElementById("pro_fleche");
let fleche2 = document.getElementById("pro_fleche2");

// Evenement qui permet l'affichage
titre_pro.addEventListener("click", () => {
  if(getComputedStyle(div_pro).display != "block") {
    
    div_pro.style.display = "block";
    

  } else {

    div_pro.style.display = "none";

  }
});

titre_scolaire.addEventListener("click", () => {
  if (getComputedStyle(div_scolaire).display != "block") {
    div_scolaire.style.display = "block";
  } else {
    div_scolaire.style.display = "none";
  }
});


