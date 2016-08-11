
//Liste des filières
var filieres = [ 
    {
        code:"ETI",
        nom: "Sciences du numérique"
    },
    {
        code: "CGP",
        nom: "Chimie Génie des Procédés"
    },
    {
        code: "IRC",
        nom: "Informatique et réseaux de communication"
    }
]

//Retourne la liste des majeures en fonction de la filière
function getMajeures(filiere){
    
    switch(filiere){
        case "ETI" : 
            return ["Image", "Electronique", "Robotique", "Réseau", "Informatique"];
        case "CGP":
            return ["Maj1", "Maj2"];
        case "IRC": 
            return ["pas de majeurs"];
        default: 
            return [];
    }
} 


//Crée un élement HTML option
function creerEltOption(texte, valeur){
    var element = document.createElement("option");
    element.textContent= texte;
    element.value = valeur;
    return element;
}


var filiereElt = document.querySelector("#filiere");
//Remplit la liste déroulante des fillières
filieres.forEach(function (filiere) {
    filiereElt.appendChild(creerEltOption(filiere.nom,filiere.code));
});

filiereElt.addEventListener("change", function(e) {
    //La valeur cible de l'évenement est le code de la filière
    var majeures = getMajeures(e.target.value);
    var majeureElt=document.getElementById("specialite");
    majeureElt.innerHTML=""; //Vidage de la liste
    //Ajout de chaque majeure à la liste
    majeures.forEach(function (majeure){
        majeureElt.appendChild(creerEltOption(majeure,majeure))
    })
})





//SUBMIT

var formAjoutStage = document.getElementById("formulaireAjout");

formAjoutStage.addEventListener('submit',function(e) {
    alert('Le stage à été ajouté à la base de donnée. En cas d\'erreur merci d\'envoyer un mail à ...');
    e.preventDefault();
});

formAjoutStage.addEventListener('reset', function(e) {
    
});