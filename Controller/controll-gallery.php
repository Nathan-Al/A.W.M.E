<?php
    require "../Outil/lecteur-liens.php";
    include $require_lecteur_fichier;
    $tabliens = array();
    $tabliens_raw = chargeLiens($liensHomeImage);

    if($tabliens_raw!=false)
    {
        /*
        $page=$_GET["page"];
        
        $file = array();
        $pages = 1;*/
        $liens = 0;
        for($p = 1; $p < sizeof($tabliens_raw); $p++)
        {
            $a = explode("/",$tabliens_raw[$p]);
            $exten = strrchr($a[sizeof($a)-1],".");
            if(gettype(stripos($a[sizeof($a)-1],"$"))!="integer")
            {
                if(strpos($a[sizeof($a)-1],".")!=0 || strpos($a[sizeof($a)-1],".")==false)
                {
                    $tabliens[$liens] = str_replace("\\","/",str_replace(" ","%20",$tabliens_raw[$p]));
                    $liens++;
                }
            }
        }
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
        
        $vue = CheckLink($require_vue_affichage_gallery);
        require $vue;    
    }

?>