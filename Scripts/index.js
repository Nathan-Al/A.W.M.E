let header = document.getElementById("headd");
let Body = document.getElementById("Body");
let parameter_Div = document.getElementById("parameter_DIV");
let menu = document.getElementById("Menu-comp");
let parametre_Menu = document.getElementById("Parametre-Menu");
let Conteneur = document.getElementById("conteneur");
let json_data_multimedia = new Object();
let json_send_data_multimedia = { Document: [], Image: [], Musique: [], SousTitre: [], Video: [], YouTube: [] };
let button_save = document.getElementById("button-save-multimedia");
ParametreMultimedia()
let Tac;

const navidVideo = document.getElementById("nav-input-video");
const navidImage = document.getElementById("nav-input-image");
const navidMusique = document.getElementById("nav-input-musique");
const navidDocument = document.getElementById("nav-input-document");
const navidYoutube = document.getElementById("nav-input-youtube");

let Menu_Ar = {

    name_link: [
        "Image",
        "Documents",
        "Video",
        "Video Box",
        "Musique",
        "Upload",
        "Youtube",
        "Test"
    ],

    liens: [
        "Controller/controll-gallery.php?chgp=0 & page=1",
        "Controller/controll-documents.php",
        "Controller/controll-video.php",
        "Controller/controll-video-box.php",
        "Controller/controll-musique.php",
        "Controller/controll-upload.php",
        "Controller/controll-youtube.php",
        "Test/test.php"
    ],
    images: [
        '<i class="fas fa-image fa-10x Nav-Image"></i>',
        '<i class="fas fa-file-alt fa-10x Nav-Image"></i>',
        '<i class="fas fa-play fa-10x Nav-Image"></i>',
        '<i class="fas fa-tv fa-10x Nav-Image"></i>',
        '<i class="fas fa-music fa-10x Nav-Image"></i>',
        '<i class="fas fa-file-upload fa-10x Nav-Image"></i>',
        '<i class="fab fa-youtube fa-10x Nav-Image"></i>',
        "<p>No Image Found</p>"

    ],
    class: {
        nav: "Nav-Liens",
            nav2: "Nav-nav-Image",
            lien: "Liens-Accueil",
            img: "Nav-Image"
    }

};

for (p = 0; p < Menu_Ar.liens.length; p++) {
    const nav1 = document.createElement('nav');
    nav1.setAttribute('id', 'nav' + p);
    nav1.classList.add(Menu_Ar.class.nav)

    const nav2 = document.createElement('nav');
    nav2.setAttribute('id', 'nav-image-' + p);
    nav2.classList.add(Menu_Ar.class.nav2);

    const a1 = document.createElement('a');
    a1.setAttribute('id', 'liens-' + p);
    a1.setAttribute('href', Menu_Ar.liens[p])
    a1.classList.add(Menu_Ar.class.lien);

    nav2.innerHTML += Menu_Ar.images[p];
    nav1.append(a1, nav2);
    menu.append(nav1);
    document.getElementById("liens-" + p).innerText = Menu_Ar.name_link[p];
}

/*-------------------------------------- MENU PARAMETRE -----------------------------*/

parameter_Div.addEventListener('mouseover', function(e) {
    if (parametre_Menu.classList == "menu-param-inactif") {
        parametre_Menu.classList.replace("menu-param-inactif", "menu-param-actif");
    }
});

parameter_Div.addEventListener('mouseout', function(e) {
    if (parametre_Menu.classList == "menu-param-actif") {
        parametre_Menu.classList.replace("menu-param-actif", "menu-param-inactif");
    }
});

parametre_Menu.addEventListener('mouseover', function(e) {
    if (parametre_Menu.classList == "menu-param-inactif") {
        parametre_Menu.classList.replace("menu-param-inactif", "menu-param-actif");
        menu.style.filter = "blur(5px)"
    }
});

parametre_Menu.addEventListener('mouseout', function(e) {
    if (parametre_Menu.classList == "menu-param-actif") {
        parametre_Menu.classList.replace("menu-param-actif", "menu-param-inactif");
        menu.style.filter = "blur(0px)"
    }
});

function animate() {
    var elem = parametre_Menu;
    var pos = 0;
    var id = setInterval(frame, 5);

    function frame() {

    }
}

let slice_trans = document.querySelectorAll("#conteneur-para-onglet nav");
let OngletParametre = [].slice.call(slice_trans);
let Parametre = document.querySelectorAll("#conteneur-para-contenue > div");

OngletParametre.forEach(function(item, index) {
    item.addEventListener('click', function(e) {
        Parametre.forEach(function(elem) {
            elem.style.zIndex = "1";
            elem.style.transition = "z-index = 1";
        });
        Parametre[index].style.zIndex = "2";
        Parametre[index].style.transition = "z-index = 2";
    })
});

/* 
    Ajout des input d'entré et des icones modifier/supprimer 
*/
let img_ajouter = document.querySelectorAll("img.img-ajouter");
let multimedia_input_nav = document.querySelectorAll("div.div-menu-est > nav");
img_ajouter.forEach(function(item, index) {
    let M = 0;
    item.addEventListener("click", function(document_element) {
        M = M + 1;
        let data_src = document_element.currentTarget.dataset.nameGroupe;
        const imgs = document.createElement("img");
        imgs.setAttribute("class", "img-supprimer");
        imgs.setAttribute("src", "media-site/moins.png");
        imgs.setAttribute("data-target", "nav-input-text-" + index + "-" + M)
        imgs.setAttribute("id", "supp-input-img");

        const nav_input = document.createElement("nav");
        nav_input.setAttribute("class", "nav-input-texte");
        nav_input.setAttribute("id", "nav-input-" + index);

        const iput = document.createElement("input");
        iput.setAttribute("id", "nav-input-text-" + index + "-" + M);
        iput.setAttribute("class", "new-input");
        iput.setAttribute("data-groupe", data_src);

        nav_input.append(iput, imgs);
        multimedia_input_nav[index].append(nav_input);

        iput.addEventListener("mouseout", function() {
            //SuppInput();
        });
        iput.addEventListener("mouseover", function() {
            //clearTimeout(Tac)
        });
        SuppInput();
    })
});

async function GetJson() {
    json_data_multimedia = await fetchServer({ multimedia: true });
    if (typeof json_data_multimedia == undefined) {
        console.log("Impossible de récupérer Data JSON");
    }
}

/**
 * @function ParametreMultimedia Avec les informations récupérer du fichier JSON par GetJson on créè chacun des nav qui sont dans le menu parametres
 */
async function ParametreMultimedia() {
    await GetJson();
    json_data_multimedia["Video"].forEach(function(item, nb) {
        const imgs = $('<img id="supp-input-img" src="media-site/moins.png" class="img-supprimer" data-target="nav-input-text-video-' + nb + '" data-groupe="video" data-nb="' + nb + '" />');
        const inpute = $('<input type="text" id="nav-input-text-video-' + nb + '" value="' + item + '" data-groupe="Video" data-nb="' + nb + '" />');
        const nav_input = $('<nav id="nav-input-text-video-' + nb + '" class="nav-input-texte">');

        $('#nav-input-video').append(nav_input);
        $('#nav-input-text-video-' + nb).append(inpute).append(imgs);
    });
    json_data_multimedia["Musique"].forEach(function(item, nb) {
        const imgs = $('<img id="supp-input-img" src="media-site/moins.png" class="img-supprimer" data-target="nav-input-text-musique-' + nb + '" data-groupe="musique" data-nb="' + nb + '" />');
        const inpute = $('<input type="text" id="nav-input-text-musique-' + nb + '" value="' + item + '" data-groupe="Musique" data-nb="' + nb + '" />');
        const nav_input = $('<nav id="nav-input-text-musique-' + nb + '" class="nav-input-texte">');

        $('#nav-input-musique').append(nav_input);
        $('#nav-input-text-musique-' + nb).append(inpute).append(imgs);
    });
    json_data_multimedia["Image"].forEach(function(item, nb) {
        const imgs = $('<img id="supp-input-img" src="media-site/moins.png" class="img-supprimer" data-target="nav-input-text-image-' + nb + '" data-groupe="image" data-nb="' + nb + '" />');
        const inpute = $('<input type="text" id="nav-input-text-image-' + nb + '" value="' + item + '" data-groupe="Image" data-nb="' + nb + '" />');
        const nav_input = $('<nav id="nav-input-text-image-' + nb + '" class="nav-input-texte">');

        $('#nav-input-image').append(nav_input);
        $('#nav-input-text-image-' + nb).append(inpute).append(imgs);
    });
    json_data_multimedia["Document"].forEach(function(item, nb) {
        const imgs = $('<img id="supp-input-img" src="media-site/moins.png" class="img-supprimer" data-target="nav-input-text-document-' + nb + '" data-groupe="document" data-nb="' + nb + '" />');
        const inpute = $('<input type="text" id="nav-input-text-document-' + nb + '" value="' + item + '" data-groupe="Document" data-nb="' + nb + '" />');
        const nav_input = $('<nav id="nav-input-text-document-' + nb + '" class="nav-input-texte">');

        $('#nav-input-document').append(nav_input);
        $('#nav-input-text-document-' + nb).append(inpute).append(imgs);
    });
    json_data_multimedia["YouTube"].forEach(function(item, nb) {
        const imgs = $('<img id="supp-input-img" src="media-site/moins.png" class="img-supprimer" data-target="nav-input-text-youtube-' + nb + '" data-groupe="youtube" data-nb="' + nb + '"/>');
        const inpute = $('<input type="text" id="nav-input-text-youtube-' + nb + '" value="' + item + '"data-groupe="Youtube" data-nb="' + nb + '"/>');
        const nav_input = $('<nav id="nav-input-text-youtube-' + nb + '" class="nav-input-texte">');

        $('#nav-input-youtube').append(nav_input);
        $('#nav-input-text-youtube-' + nb).append(inpute).append(imgs);
    });
    SuppInput();

    /**
     *  Sauvegarder modification
     */
    button_save.addEventListener("click", function(e) {
        let vid_query = document.querySelectorAll("[data-groupe='Video']");
        let mu_query = document.querySelectorAll("[data-groupe='Musique']");
        let im_query = document.querySelectorAll("[data-groupe='Image']");
        let dc_query = document.querySelectorAll("[data-groupe='Document']");
        let yt_query = document.querySelectorAll("[data-groupe='Youtube']");
        json_send_data_multimedia.Video = fo(vid_query);
        json_send_data_multimedia.Musique = fo(mu_query);
        json_send_data_multimedia.Image = fo(im_query);
        json_send_data_multimedia.Document = fo(dc_query);
        json_send_data_multimedia.YouTube = fo(yt_query);

        function fo($tableaux) {
            let tabO = new Array;
            for (i = 0; i < $tableaux.length; i++) {
                tabO.push($tableaux[i].value);
            };
            return tabO;
        }

        navidVideo.innerHTML = "";
        navidImage.innerHTML = "";
        navidMusique.innerHTML = "";
        navidDocument.innerHTML = "";
        navidYoutube.innerHTML = "";
        fetchServer({ multimedia: json_send_data_multimedia });
        ParametreMultimedia();
    });
}

function SuppInput() {
    /* 
        Supprimer les inputs
    */
    let input_supprimer = document.querySelectorAll("#supp-input-img");
    input_supprimer.forEach(function(item, index) {
        item.addEventListener("click", function(e) {
            item.remove();
            document.getElementById(item.dataset.target).remove();
        });
    });
    /*
    console.log("SuppInput")
    Tac = setTimeout(function() {
        $('.new-input').remove();
        //document.getElementById("new-input").remove();
        document.getElementById("new-input-img").remove()
    }, 100000);*/
}

function fetchServer(data_send) {
    let urlEncodedData = "",
        urlEncodedDataPairs = [],
        name;
    let data_receiv;

    for (name in data_send) {
        if (Array.isArray(data_send[name])) {
            urlEncodedDataPairs.push({
                [name]: data_send[name]
            });
        } else {
            urlEncodedDataPairs.push(encodeURIComponent(name) + '=' + JSON.stringify(data_send[name]));
        }

    }
    if (Array.isArray(urlEncodedDataPairs))
        urlEncodedData = urlEncodedDataPairs;
    else
        urlEncodedData = urlEncodedDataPairs.join('&').replace(/%20/g, '+');

    let httpRequest = new XMLHttpRequest();

    if (!httpRequest) {
        alert('Abandon :( Impossible de créer une instance de XMLHTTP');
        return false;
    }
    httpRequest.onreadystatechange = alertContents;
    httpRequest.open('POST', 'Controller/controll-index.php', false);
    httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    httpRequest.send(urlEncodedData);

    function alertContents() {
        if (httpRequest.readyState === XMLHttpRequest.DONE) {
            if (httpRequest.status === 200) {
                if (httpRequest.response != undefined && httpRequest.response != "")
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