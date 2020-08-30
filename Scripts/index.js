let header = document.getElementById("headd");
let Body = document.getElementById("Body");
let parameter_Div = document.getElementById("parameter_DIV");
let menu = document.getElementById("Menu-comp");
let parametre_Menu = document.getElementById("Parametre-Menu");
let Conteneur = document.getElementById("conteneur");
let json_data_multimedia = new Object();
let Tac;

const navidVideo = document.getElementById("nav-input-video");
const navidImage = document.getElementById("nav-input-image");
const navidMusique = document.getElementById("nav-input-musique");
const navidDocument = document.getElementById("nav-input-document");

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

/*-------------------------------------- MENU PARAMETRE -----------------------------*/

let slice_trans = document.querySelectorAll("#conteneur-para-onglet nav");
let OngletParametre = [].slice.call(slice_trans);
let Parametre = document.querySelectorAll("#conteneur-para-contenue > div");

OngletParametre.forEach(function(item, dix) {
    item.addEventListener('click', function(e) {
        Parametre.forEach(function(elem){
            elem.style.zIndex = "1";
            elem.style.transition = "z-index = 1";
        });
        Parametre[dix].style.zIndex = "2";
        Parametre[dix].style.transition = "z-index = 2";
    })
});

GetJson("Json/liens_multimedia.json");

function GetJson(link)
{
    $.getJSON(link, function(data){
        $.each( data, function( key, val ) {
            json_data_multimedia[key] = val;
        });
    }).done(function () { 
        MultimediaJsonRecup()
    }).fail(function () {
        console.log("IMPOSSIBLE DE CHARGER JSON")
    });
    
}

function MultimediaJsonRecup()
{
    let multimedia_input_nav = document.querySelectorAll("div.div-menu-est > nav");
    let img_ajouter = document.querySelectorAll("img.img-ajouter");
    
    json_data_multimedia["Video"].forEach(function(item, nb){
        const imgs = $('<img src="media-site/moins.png" class="img-supprimer" data-parent="nav-input-text-musique-'+nb+'" />');
        const inpute = $('<input type="text" id="nav-input-text" value="'+item+'"/>');
        const nav_input = $('<nav id="nav-input-text-video-'+nb+'" class="nav-input-texte">');

        $('#nav-input-video').append(nav_input);
        $('#nav-input-text-video-'+nb).append(inpute).append(imgs);
    });
    json_data_multimedia["Musique"].forEach(function(item, nb){
        const imgs = $('<img src="media-site/moins.png" class="img-supprimer" data-parent="nav-input-text-musique-'+nb+'" />');
        const inpute = $('<input type="text" id="nav-input-text" value="'+item+'"/>');
        const nav_input = $('<nav id="nav-input-text-musique-'+nb+'" class="nav-input-texte">');

        $('#nav-input-musique').append(nav_input);
        $('#nav-input-text-musique-'+nb).append(inpute).append(imgs);
    });
    json_data_multimedia["Image"].forEach(function(item, nb){
        const imgs = $('<img src="media-site/moins.png" class="img-supprimer" data-parent="nav-input-text-image-'+nb+'" />');
        const inpute = $('<input type="text" id="nav-input-text" value="'+item+'"/>');
        const nav_input = $('<nav id="nav-input-text-image-'+nb+'" class="nav-input-texte">');

        $('#nav-input-image').append(nav_input);
        $('#nav-input-text-image-'+nb).append(inpute).append(imgs);
    });
    json_data_multimedia["Document"].forEach(function(item, nb){
        const imgs = $('<img src="media-site/moins.png" class="img-supprimer" data-parent="nav-input-text-document-'+nb+'" />');
        const inpute = $('<input type="text" id="nav-input-text" value="'+item+'"/>');
        const nav_input = $('<nav id="nav-input-text-document-'+nb+'" class="nav-input-texte">');

        $('#nav-input-document').append(nav_input);
        $('#nav-input-text-document-'+nb).append(inpute).append(imgs);
    });
    
    /* 
        Ajout des input d'entré et des icones modifier/supprimer 
    */
    img_ajouter.forEach(function(item,dix){
        let M ;
        item.addEventListener("click", function(e){
            const imgs = document.createElement("img");
            imgs.setAttribute("class","img-supprimer");
            imgs.setAttribute("src","media-site/croix.png");
            imgs.setAttribute("id","new-input-img");

            const nav_input = document.createElement("nav");
            nav_input.setAttribute("class","nav-input-texte");
            nav_input.setAttribute("id","nav-input-text");

            const iput = document.createElement("input");
            iput.setAttribute("id","new-input");
            iput.setAttribute("class","new-input");

            nav_input.append(iput,imgs);
            multimedia_input_nav[dix].append(nav_input);

            iput.addEventListener("mouseout", function(){
                SuppInput();
            });
            iput.addEventListener("mouseover",function(){
                clearTimeout(Tac)
            });
        })
    });
    
    /* 
        Supprimer liens du ficier JSON 
    */
    let input_supprimer = document.querySelectorAll("img.img-supprimer");
    input_supprimer.forEach(function(item,dix){
        item.addEventListener("click", function(e){

            ModifyJson("Json/liens_multimedia.json",)
            navidVideo.innerHTML = "";
            navidImage.innerHTML = "";
            navidMusique.innerHTML = "";
            navidDocument.innerHTML = "";
        });
    });

}

function SuppInput()
{
    console.log("SuppInput")
    Tac = setTimeout(function(){
        document.getElementById("new-input").remove();
        document.getElementById("new-input-img").remove()
        }, 100000);
}

function ModifyJson(link,data)
{

}



