// let uneFonctionVariadique = function(a, b){
//     let resultat =  0;

//     for(let i=0; i<arguments.length; i++){
//         resultat += arguments[i];
//     }

//     return resultat;
// }

let uneFonctionVariadique = function(a, b, ...lesAutres){
    let resultat =  a+b;

    for(let i=0; i<lesAutres.length; i++){
        resultat += lesAutres[i];
    }

    return resultat;
}


let faireQqeChose = (a, b, operation) => {
    let resultat = operation(a, b);

    return resultat;
}

let addition = (a,b) => a+b;
let multiplication = (a,b) => a*b;

console.log( faireQqeChose(10, 5, addition) );



let puissance = (exposant) => {
    let resultat = (nombre) =>{
        return nombre ** exposant;
    }

    return resultat;    
}

let carre = puissance(2);

let b = carre(10);