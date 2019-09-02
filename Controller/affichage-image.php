<?php
    require "../Outil/lecteur-liens.php";
    require $require_lecteur_fichier;
    
    if(isset($_GET["chgp"]))
    {
        if($_GET["chgp"]==0)
        {
            $tabliens = array();
            $tabliens = chargeLiens($liensHomeImage);
            $page=$_GET["page"];
        }
        if($_GET["chgp"]==1)
        {
            $tabliens = array();
            $tabliens = chargeLiens($liensHomeImage);
            //echo "TAB ".$tabliens[1][2];

            if(isset($_POST["suiv"]))
            {
                $page = $_POST["suiv"]+1;
            }
            if(isset($_POST["prec"]))
            {
               $page = $_POST["prec"]-1;
            }
        }
        require $require_vue_affichage_images;    
    }

?>