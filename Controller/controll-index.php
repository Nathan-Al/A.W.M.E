<?php
//require "Outil/lecteur-liens.php";
require "./Outil/lecteur-chemin.php";

/*$jsonMultimedia = json_decode(file_get_contents("Json/liens_multimedia.json"),true);

$video = $jsonMultimedia["Video"];
$musique = $jsonMultimedia["Musique"];
$image = $jsonMultimedia["Image"];
$document = $jsonMultimedia["Document"];
*/
$vue = CheckLink("../Vue/affichage-index.php");
require $vue;//$require_vue_index ;
?>