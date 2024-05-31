

/*
Créer un nouveau postit à partir d'un objet qui a la 
structure suivante: 
{id: 10, title: "sfdgsfg", content: "jhkjh"}
*/
let creerPostit = (contenu) => {
    const titre = document.createElement('h3');
    titre.textContent = contenu.title;

    const paragraphe = document.createElement('p');
    paragraphe.textContent = contenu.content;

    const leDiv = document.createElement('div');
    leDiv.id = "postit"+contenu.id;
    leDiv.className = "postit";

    leDiv.append(titre, paragraphe);
    return leDiv;
}


const afficherPostits= (tabPostits) => {
    const conteneur = document.querySelector(".postit-container");

    for(let i=0; i<tabPostits.length; i++){
        const nouvelElt = creerPostit(tabPostits[i]);
        conteneur.append(nouvelElt);
    }
}



document.addEventListener("DOMContentLoaded", (event)=>{
    afficherPostits(postIts);    
});