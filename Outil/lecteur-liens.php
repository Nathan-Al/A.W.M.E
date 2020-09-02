<?php
/* LIENS DOSSIER MULTIMEDIA *///-----------------------------------
$jsonMultimedia = json_decode(file_get_contents("../Json/liens_multimedia.json"),true);
$liensHomeDocuments = $jsonMultimedia["Document"];
$liensHomeImage = $jsonMultimedia["Image"];
$liensHomeVideo = $jsonMultimedia["Video"];
$liensHomeMusique = $jsonMultimedia["Musique"];
$liensMediaSite = "../media-site/";

/* LIENS REQUIRE FICHIER // DOSSIER OUTIL *///----------------------------------

    $racine_outil = "../Outil/";
    $racine_script ="../Scripts/";
    $require_lecteur_fichier = $racine_outil."lecteur-fichier.php";
    $require_lecteur_video = $racine_outil."lecteur-video.php";
    $require_lecteur_musique = $racine_outil."lecteur-musique.php";
    $require_createur_fichier = $racine_outil."createur-fichier.php";

    // REQUIRE VUE-----

    $require_vue_gestion ="../Vue/affichage-gestion.php";
    $require_vue_index = "Vue/affichage-index.php";
    $require_vue_affichage_documents = "../Vue/affichage-documents.php";
    $require_vue_affichage_video = "../Vue/affichage-video.php";
    $require_vue_affichage_video_box = "../Vue/affichage-video-box.php";
    $require_vue_affichage_lecteur_video = "../Vue/affichage-lecteur-video.php";
    $require_vue_affichage_musique = "../Vue/affichage-musique.php";
    $require_vue_affichage_gallery = "../Vue/affichage-gallerie.php";
    $require_vue_affichage_image = "../Vue/affichage-image.php";
    $require_vue_affichage_upload = "../Vue/affichage-upload.php";
    $require_vue_affichage_youtube = "../Vue/affichage-youtube.php";

    // REQUIRE MODEL
    $require_model_musique = "../Class/musique.php";
    $require_class_upload = "../Class/upload.php";


/* LIENS TYPE a CONTROLLER */

    $controller_affichage_gestion = "../Controller/controll-gestion.php";
    $controller_affichage_gallery = "../Controller/controll-gallery.php";
    $controller_video_box = "../Controller/controll-video-box.php";
    $controller_musique = "../Controller/controll-musique.php";
    $controller_video = "../Controller/controll-video.php";
    $controller_upload = "../Controller/controll-upload.php";
    $controller_affichage_image = "../Controller/controll-image.php";

/* LIENS DE RETOUR */
    $lien_retour_video = "../Video/";
    $lien_retour_documents = "../Documents/";
    $lien_retour_images = "../Image/";
    $lien_retour_musique = "../Musique/";
   
/* LIENS CSS */
    $liens_css_image = "../Css/image.css";
    $liens_css_gallery = "../Css/gallerie.css";
    $liens_css_document = "../Css/documents.css";
    $liens_css_musique = "../Css/musique.css";
    $liens_css_video = "../Css/video.css";
    $lien_css_affichage_box = "../Css/affichage-box.css";
    $liens_css_upload = "../Css/upload.css";
    $liens_css_affichage_youtube = "../Css/youtube.css";
    $liens_css_gestion = "../Css/gestion.css";

/* LIENS DOSSIER */
    $liens_dossier_sous_titre = "../Video/SousTitre/";
    $require_decodeur_id3 = "../getID3-master/getid3/getid3.php";
    $require_write_id3 = "../getID3-master/getid3/write.php";
    $require_javaScript = "../JavaScript/";

    $dossier_vue = "../Vue/";
    $dossier_controll = "../Controller/";
    $dossier_outil = "../Outil/";
    $dossier_model = "../Model/";
    $dossier_css = "../Css/";
    $dosier_sous_titre = $liensHomeVideo;

/* ICONE PAGE DU SITE */
    $IconeSite = "../media-site/icone.png";
    
?>