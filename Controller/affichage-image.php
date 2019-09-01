<?php
    // Fichier controlleur
    function chargerModel($classe)
    {
        /*
        On inclut la classe correspondante 
        au paramètre passé.
        */
        require "../../model/manager/".$classe .".php"; 
    }
    require "../Outil/lecteur-fichier.php";
    spl_autoload_register('chargerModel');
    if(isset($_GET["chgp"]))
    {
        if($_GET["chgp"]==0)
        {
            $tabliens = array();
            $tabliens = chargeLiens();
            $page=$_GET["page"];
        }
        if($_GET["chgp"]==1)
        {
            $tabliens = array();
            $tabliens = chargeLiens();
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
        require "../Vue/affichage-image.php";    
    }

?>