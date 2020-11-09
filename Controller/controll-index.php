<?php
if(isset($_POST["multimedia"]))
{
    require "../Outil/lecteur-liens.php";
    require $require_lecteur_fichier;
    if($_POST["multimedia"]=="true")
    {
        $t = json_encode(file_get_contents("../Json/liens_multimedia.json"));
        echo json_decode($t);
    }else
    {
        $json_decode_moul = json_decode( $_POST["multimedia"] );
        ModifierJson("../Json/liens_multimedia.json",$json_decode_moul);
    }

}else
{
    require "./Outil/lecteur-chemin.php";
    $vue = CheckLink("../Vue/affichage-index.php");
    require $vue;
}

?>