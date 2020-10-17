let all_fichier;
let all_dossier;
let div_video = document.getElementById("div-liens-video");
let div_dossier = document.getElementById("div-dossier-video");

let basic_video = document.getElementById("lecteur_base");
let you_watch = document.getElementById("titre_video");
let data_json;
let fichiers_doc, dossiers_doc, liens_dossier_doc, liens_fichiers_doc, dossier_current, dossier_avant;

GetStartinng();

function GetStartinng() {
    all_fichier = document.querySelectorAll('#div-liens-video #fichier');
    all_dossier = document.querySelectorAll('#div-dossier-video #dossier');
    all_fichier.forEach(function(item, dix) {
        item.addEventListener('click', function(e) {
            document.title = "Video : " + item.textContent;
            you_watch.innerHTML = "Vous regardez : " + item.textContent;
            LecteurVideo(item.value, "");
            LecteurVideoJS(item.value, "");
            ChargeOnglet();
        })
    });

    all_dossier.forEach(function(item, dix) {
        item.addEventListener('click', function(e) {
            data_json = fetchServer({ dossier_chgp: item.value });
            suiteDansLesIdee(data_json);
            UpdateNav(fichiers_doc, dossiers_doc, liens_dossier_doc, liens_fichiers_doc);
            GetStartinng();
            buttonRetour();
        })
    });
}

function suiteDansLesIdee(data_json) {
    fichiers_doc = data_json.fichiers;
    dossiers_doc = data_json.dossiers;
    liens_dossier_doc = data_json.liens_dossier;
    liens_fichiers_doc = data_json.liens_video
    dossier_current = data_json.current_dir;
}

function UpdateNav(fichiers, dossiers, liens_dossier, liens_fichiers) {
    div_video.innerHTML = "";
    div_dossier.innerHTML = "";
    if (fichiers != undefined && Array.isArray(fichiers)) {
        fichiers.forEach(function(item, indic) {
            let str = document.createElement("button");
            str.setAttribute("id", "fichier");
            str.setAttribute("class", "button-liens-video");
            str.setAttribute("value", liens_fichiers[indic]);
            str.innerText = item;
            div_video.append(str);
        });
    }

    if (dossiers != undefined && Array.isArray(dossiers)) {
        dossiers.forEach(function(item, indic) {
            let trt = document.createElement("button");
            trt.setAttribute("id", "dossier");
            trt.setAttribute("class", "button-liens-dossier");
            trt.setAttribute("value", liens_dossier[indic]);
            trt.innerText = item;
            div_dossier.append(trt);
        });
    }

}

function LecteurVideo(videoliens, liens_sous_titre) {
    let nav_video_normal = document.getElementById("nav-normal-video");
    nav_video_normal.innerHTML = "";
    nav_video_normal.innerHTML =
        `<body>
        <video class="lecteur-video" preload="none" id="lecteur_base" src="${videoliens}" poster="../media-site/play.png"
        type="video/x-matroska; codecs="."theora, vorbis" controls onerror="failed(event)" >
        </video>
        <track default kind="captions" srclang="fr" src="${liens_sous_titre}" />
        </body>`
}

function LecteurVideoJS(liensmp4, lienswebm, liens_sous_titre) {
    let div = document.getElementById("nav-js-video");
    div.innerHTML = "";
    div.innerHTML += `<video
        id="js-video"
        class="video-js vjs-theme-fantasy lecteur-video"
        controls
        preload="auto"
        data-setup="{}"
      >
        <source src="${liensmp4}" type="video/mp4" />
        <p class="vjs-no-js">
          To view this video please enable JavaScript, and consider upgrading to a
          web browser that
          <a href="https://videojs.com/html5-video-support/" target="_blank"
            >supports HTML5 video</a
          >
        </p>
      </video>`;
    let imported = document.createElement("script");
    imported.src = "https://vjs.zencdn.net/7.8.4/video.js";
    document.head.appendChild(imported);
}


function ChargeOnglet() {
    let slice_trans = document.querySelectorAll("#conteneur-para-onglet nav");
    let OngletParametre = [].slice.call(slice_trans);
    let Parametre = document.querySelectorAll("#conteneur-para-contenue > nav");

    OngletParametre.forEach(function(item, dix) {
        item.addEventListener('click', function(e) {
            Parametre.forEach(function(elem) {
                elem.style.zIndex = "-1";
                elem.style.transition = "z-index = 0";
            });
            Parametre[dix].style.zIndex = "0";
            Parametre[dix].style.transition = "z-index = 0";
        })
    });
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
    httpRequest.open('POST', 'controll-video.php', false);
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

function buttonRetour() {
    let nav_retour = document.getElementById("nav-separation-div")
    nav_retour.innerHTML = "";
    let retour = document.createElement("button");
    dossier_avant = dossier_current.slice(0, dossier_current.lastIndexOf("/"));
    if (dossier_avant.lastIndexOf("/") > 0) {
        retour.setAttribute("id", "retour_btn")
        retour.setAttribute("class", "a-separation");
        retour.setAttribute("value", dossier_avant);
        retour.innerText = "Retour";
        nav_retour.append(retour);
        let retour_html = document.getElementById("retour_btn");
        retour_html.addEventListener('click', function(e) {
            data_json = fetchServer({ dossier_chgp: retour_html.value });
            suiteDansLesIdee(data_json);
            UpdateNav(fichiers_doc, dossiers_doc, liens_dossier_doc, liens_fichiers_doc);
            GetStartinng();
            buttonRetour();
        });
    }

}