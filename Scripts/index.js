let header = document.getElementById("headd");
let Body = document.getElementById("Body");
let parameter_Div = document.getElementById("parameter_DIV");
let menu = document.getElementById("Menu-comp");
let parametre_Menu = document.getElementById("Parametre-Menu");
let Conteneur = document.getElementById("conteneur");

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
        "Controller/controll-video.php?video=default",
        "Controller/controll-video-box.php?video=default",
        "Controller/controll-musique.php",
        "Controller/controll-upload.php",
        "Controller/controll-youtube.php",
        "Test/test.php"
    ],
    images: [
        "media-site/img.jpg",
        "media-site/doc.jpg",
        "media-site/vid.jpg",
        "media-site/vidbox.jpg",
        "media-site/ms.jpg",
        "media-site/up.jpg",
        "media-site/yt.png",
        "media-site/ts.jpg"

    ],
    class: {
        nav: "Nav-Liens",
            lien: "Liens-Accueil",
            img: "Nav-Image"
    }

};

for (p = 0; p < Menu_Ar.liens.length; p++) {
    const nav1 = document.createElement('nav');
    nav1.setAttribute('id', 'nav' + p);
    nav1.classList.add(Menu_Ar.class.nav)

    const a1 = document.createElement('a');
    a1.setAttribute('id', 'liens' + p);
    a1.setAttribute('href', Menu_Ar.liens[p])
    a1.classList.add(Menu_Ar.class.lien);

    const img1 = document.createElement('img');
    img1.setAttribute('id', 'img' + p);
    img1.setAttribute('src', Menu_Ar.images[p]);
    img1.classList.add(Menu_Ar.class.img);

    menu.append(nav1);
    nav1.append(a1, img1);
    document.getElementById("liens" + p).innerText = Menu_Ar.name_link[p];
}

let OngletParametre = document.querySelectorAll("#conteneur-para-onglet nav");
let Parametre = document.querySelectorAll("#conteneur-para-contenue > div");

OngletParametre.forEach(function(item, dix) {
    item.addEventListener('click', function(e) {
        item.style.zIndex = "2";
        console.log(item, " ", dix)
    })
});

/*
parameter_Div.addEventListener('click', function(e) {
    console.log("Cliquer ");
});*/

parameter_Div.addEventListener('mouseover', function(e) {
    if (parametre_Menu.classList == "menu-param-inactif") {
        parametre_Menu.classList.replace("menu-param-inactif", "menu-param-actif");
    }
    /*else if (parametre_Menu.classList == "menu-param-actif") {
           parametre_Menu.classList.replace("menu-param-actif", "menu-param-inactif");
       }*/
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