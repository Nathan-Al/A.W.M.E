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

    function chargeLiens()
    {
        $dirname = '/home/Samba/Image/';
        $dir = opendir($dirname);
        $ona = 0;
        $page = 1;
        while($file[][] = readdir($dir)) 
        {
            $liens = 0;
            for($compteur=0; $compteur<24; $compteur++)
            {
                if($file[$liens][$page] != "." && $file[$liens][$page] != ".." && !is_dir($dirname.$file[$liens][$page] && $file[$liens][$page]!="" && $file[$liens][$page]!=false))
                {
                    //echo readdir($dir),$page. "<br>";
                    $file[$liens][$page] = readdir($dir);
                    //echo "<br> L".$liens."  P".$page."  ".$file[$liens][$page]."<br>";
                    //echo "<br>"."L".$liens."  P".$page;
                }
                if ($file[$liens][$page]=="..")
                {
                    $file[$liens][$page] = "0";
                }
                $liens++;
                
            }
            //echo "<br>"."fin du for"."<br>";
            $page++;
            
        }
        //echo "<br>"."fin while"."<br>";
        
        rsort($file);
        
        return $file;
    }

?>