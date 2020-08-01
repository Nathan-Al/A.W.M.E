<?php
    require "../Outil/lecteur-liens.php";
    require $require_lecteur_fichier;
    
    if(isset($_GET["page"]))
    {
        $tabliens = array();
        $tabliens = chargeLiens($liensHomeImage);
        $page=$_GET["page"];
        for ($i =1; $i < sizeof($tabliens); $i++)
        {
            if($tabliens[0][$i]!=null)
            $nbpage++;
        }

        if($_GET["chgp"]=="chercher")
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
                    $tabliens = chargeLiens($liensHomeImage); 
                    echo "<meta http-equiv='refresh' content='0; URL=".$controller_affichage_image."?chgp=0 & page=1'>";
                }
            }
        }
        require $require_vue_affichage_gallery;    
    }

?>