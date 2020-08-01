let conteneur1 = document.getElementById("conteneur-1");
let conteneur2 = document.getElementById("conteneur-2");
let conteneur3 = document.getElementById("conteneur-3");
let div_image = document.getElementById("div-image");
let span_image = document.getElementById("image-span");
let a_image_background = document.getElementById("a-image-background");
let conteneur4 = document.getElementById("conteneur-4");
/*
let conteneur4 = document.createElement('div');
conteneur4.setAttribute('id', 'conteneur-4');
conteneur4.setAttribute('class', 'conteneur-4');
*/


let image_Array = document.querySelectorAll('#div-image img.Min-Image');
let src_Image_Array = [];
for (p = 0; p < image_Array.length; p++) {
    src_Image_Array[p] = image_Array[p].getAttribute('src')
};

let tata = document.querySelectorAll('#affichage-div-image #a-image-background');
let imageBackground_Array = [].slice.call(tata);

let Image_for_big_picture = {
    'image': imageBackground_Array,
    'liens': src_Image_Array
}
let rat;
Image_for_big_picture.image.forEach(function(item, dix) {
    item.addEventListener('click', function(e) {
        Big_Picture_Hover(Image_for_big_picture.liens[dix]);
    })
});


function Big_Picture_Hover(link) {

    conteneur3.style.filter = "blur(4px)";
    conteneur4.style.height = "89.5%";
    const div1 = document.createElement('div');
    div1.setAttribute('id', 'hoverBigPicture');
    div1.classList.add('hover-big-picture');
    div1.style.zIndex = "1";
    conteneur4.append(div1);

    const div_conteneur = document.createElement('div');
    const div_image1 = document.createElement('div');
    const div_image2 = document.createElement('div');
    const div_image3 = document.createElement('div');
    const imgMin = document.createElement('img');

    div_conteneur.setAttribute('class', 'conteneur-image');
    div_image1.setAttribute('class', 'div-image-1');
    div_image2.setAttribute('class', 'div-image-2');
    div_image3.setAttribute('class', 'div-image-3');
    imgMin.setAttribute('class', 'Max-Image');
    imgMin.setAttribute('src', link)

    div1.append(div_conteneur);
    div_conteneur.append(div_image2);
    div_image2.append(div_image3);
    div_image3.append(imgMin);
}

conteneur4.addEventListener('click', function(e) {
    conteneur4.innerHTML = "";
    conteneur3.style.filter = "blur(0px)";
    conteneur4.style.height = "auto";
});