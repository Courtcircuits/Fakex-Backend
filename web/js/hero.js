function parseURL(url) {
    let toreturn = "";
    let i = 0;
    while (url[i] !== "?" && i < url.length) {
        toreturn += url[i];
        i++;
    }
    return toreturn;
}

function changeHero(rank){
    let url = parseURL(document.URL);
    fetch(url+'?action=bestSeller&controller=modele&rank=' + rank)
        .then(response => response.json())
        .then(data => {
            document.getElementById("name-shoe").innerText = data.nom;
            document.getElementById("creator-shoe").innerText = "By " + data.creator;
        });
}
changeHero(0);

const li = document.getElementsByClassName("selectshoe");

for(let k = 0; k< li.length; k++){
    li[k].addEventListener("mousedown", () => {
        changeHero(k);
        for(let i = 0; i< li.length; i++){
            li[i].classList.remove("activated");
        }
        li[k].classList.add("activated");
    });
}