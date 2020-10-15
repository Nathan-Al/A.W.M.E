<?php
    require "../Outil/lecteur-liens.php";
    include $require_lecteur_fichier;

    if(isset($_GET["page"]))
    {
        $tabliens = array();
        $tabliens = chargeLiens($liensHomeImage, 15);
        $page=$_GET["page"];
        $nbpage = sizeof($tabliens);
        if($tabliens!=false)
        {
            if(isset($_GET["chgp"]) && $_GET["chgp"]=="chercher")
            {
                if(isset($_POST["searchEngine"]))
                {
                    if($_POST["searchEngine"]!=""&&$_POST["searchEngine"]!=null&&$_POST["searchEngine"]!=false)
                    {
                        $motachercher = $_POST["searchEngine"];
                        $tabliens = array();
                        $tabliens = ChercherFicher($motachercher,$liensHomeImage);
                    }else
                    {
                        $tabliens = array();
                        $tabliens = chargeLiens($liensHomeImage,15); 
                        echo "<meta http-equiv='refresh' content='0; URL=".$controller_affichage_image."?chgp=0 & page=1'>";
                    }
                }
            }
        }
        require $require_vue_affichage_gallery;    
    }

?>