let conteneur1 = document.getElementById("conteneur-1");
let conteneur2 = document.getElementById("conteneur-2");
let conteneur3 = document.getElementById("conteneur-3");
let div_image = document.getElementById("div-image");
let span_image = document.getElementById("image-span");
let a_image_background = document.getElementById("a-image-background");

let a_image_Background_Array = document.querySelectorAll("#a-image-background");
let src_Image_Array = [];
for (p = 0; p < a_image_Background_Array.length; p++) {
    let inde_parab = a_image_Background_Array[p].style.backgroundImage.indexOf("(");
    let taille = a_image_Background_Array[p].style.backgroundImage.length
    src_Image_Array[p] = a_image_Background_Array[p].style.backgroundImage.slice(inde_parab + 2, taille - 2)
};
let Image_for_big_picture = {
    'image': a_image_Background_Array,
    'liens': src_Image_Array
}
let rat;
Image_for_big_picture.image.forEach(function(item, dix) {
    let target = item.dataset.target;
    let name = item.dataset.name;
    let inde_parab = document.getElementById(target).style.backgroundImage.indexOf("(");
    let taille = document.getElementById(target).style.backgroundImage.length;
    let link = document.getElementById(target).style.backgroundImage.slice(inde_parab + 2, taille - 2);
    let nom = item.dataset.name
    item.addEventListener('click', function(e) {
        Big_Picture_Hover(link, nom);
    })
});


function Big_Picture_Hover(link, nom) {
    console.log(nom)
    const div_conteneur4 = document.createElement('div');
    div_conteneur4.setAttribute('class', 'conteneur-4');
    div_conteneur4.setAttribute('id', 'conteneur-4');
    div_conteneur4.style.height = "89.5%";
    conteneur3.style.filter = "blur(4px)";
    const div1 = document.createElement('div');
    div1.setAttribute('id', 'hoverBigPicture');
    div1.classList.add('hover-big-picture');
    div1.style.zIndex = "1";
    div_conteneur4.append(div1);

    const div_conteneur = document.createElement('div');
    const div_image1 = document.createElement('div');
    const div_image2 = document.createElement('div');
    const div_image3 = document.createElement('div');
    const div_image3Bis = document.createElement('div');
    const div_image4 = document.createElement('div');
    const imgMin = document.createElement('img');
    const spanN = document.createElement('p');

    div_conteneur.setAttribute('class', 'conteneur-image');

    div_image1.setAttribute('class', 'div-image-1');
    div_image2.setAttribute('class', 'div-image-2');
    div_image3.setAttribute('class', 'div-image-3');
    div_image3Bis.setAttribute('class', 'div-image-3-Bis centre');
    div_image4.setAttribute('class', 'div-image-4 centre');
    imgMin.setAttribute('class', 'Max-Image');
    imgMin.setAttribute('src', link)

    spanN.setAttribute('class', 'div-image-span');
    spanN.innerHTML = nom;

    div1.append(div_conteneur);
    div_conteneur.append(div_image2);
    div_image3Bis.append(spanN);
    div_image3.append(div_image3Bis);
    div_image2.append(div_image3, div_image4);
    div_image4.append(imgMin);

    div_conteneur4.addEventListener('click', function(e) {
        div_conteneur4.innerHTML = "";
        conteneur3.style.filter = "blur(0px)";
        div_conteneur4.style.height = "auto";
        div_conteneur4.remove();
    });
    conteneur2.append(div_conteneur4);
}