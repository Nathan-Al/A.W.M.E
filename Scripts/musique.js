let boutton_musique = document.querySelectorAll("#button-musique");
let audio_source_id = document.getElementById("controll-audio");
let div_musique = document.getElementById("lecteur-musique");
let Musique_Data;

boutton_musique.forEach(function(item, dix) {
    item.addEventListener('click', function(e) {
        Musique_Data = fetchServer({ recup: item.dataset.link });
        Audio_funct(item.dataset.link);
        Div_Info_Datas();
    })
})

function Audio_funct(link) {
    div_musique.innerHTML = "";
    var audio_javaScript = new Audio(link);
    //var audio_javaScript = document.createElement("AUDIO");
    audio_javaScript.setAttribute("id", "lecteur-audio")
    audio_javaScript.autoplay = true;
    audio_javaScript.controls = true;
    div_musique.append(audio_javaScript);
    audio_javaScript.addEventListener("canplaythrough", event => {
        /* the audio is now playable; play it if permissions allow */
        audio_javaScript.play();
    });
}

function Div_Info_Datas() {
    const lieux_de_partage = document.getElementById("info-fetche");
    const div_cover = document.getElementById("cover-image");
    lieux_de_partage.innerHTML = "";
    div_cover.innerHTML = "";
    let array_div_data = [
        "Titre : " + Musique_Data["titre"],
        "Album : " + Musique_Data["album"],
        "Artiste : " + Musique_Data["artiste"],
        "Temps : " + Musique_Data["temps"],
        "Genre : " + Musique_Data["genre"],
        "Annee : " + Musique_Data["annee"]
    ];
    array_div_data.forEach(function(item, dix) {
        const div_one = document.createElement("div");
        div_one.setAttribute("class", "musique-info");
        div_one.setAttribute("id", "musique-datas-");
        div_one.append(item)
        lieux_de_partage.append(div_one)
    })
    div_cover.innerHTML = Musique_Data["cover"];

}

function fetchServer(data_send) {
    let urlEncodedData = "",
        urlEncodedDataPairs = [],
        name;
    let data_receiv;

    for (name in data_send) {
        urlEncodedDataPairs.push(encodeURIComponent(name) + '=' + encodeURIComponent(data_send[name]));
    }
    urlEncodedData = urlEncodedDataPairs.join('&').replace(/%20/g, '+');

    let httpRequest = new XMLHttpRequest();

    if (!httpRequest) {
        alert('Abandon :( Impossible de créer une instance de XMLHTTP');
        return false;
    }
    httpRequest.onreadystatechange = alertContents;
    httpRequest.open('POST', 'controll-musique.php', false);
    httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    httpRequest.send(urlEncodedData);

    function alertContents() {
        if (httpRequest.readyState === XMLHttpRequest.DONE) {
            if (httpRequest.status === 200) {
                //alert(httpRequest.data);
                data_receiv = JSON.parse(httpRequest.response);
            } else if (httpRequest.status === 404) {
                alert('La connexion avec la page n\'a pas pu être effectuer.');
            } else {
                alert('Il y a eu un problème avec la requête.');
            }
        }
    }
    return data_receiv;
}