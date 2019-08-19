<html>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-10646"/>
        <meta charset="UTF-8">
        <LINK rel="icon" type="image/png" href="../media-site/icone.png" /> <!-- Icone de l'onglet de la page web -->

        <link rel="stylesheet" href="../Css/video.css" /> <!-- Importations du css -->
            
            <head>
                <title>Video</title> <!-- Titre de l'onglet de la page web -->
            </head>
    <body>
        <header>
            <div class="div-headers-1">
                <a href="../" class="Lien-nav-Accueil"><h1>Samba</h1></a>
            </div>
        </header>
<div class="div-contenue">
        <nav class="nav-liste-video">
       
            <div class="div-dossier-video">
                <?php
                    $liens = 0;
                    $default ="default";
                    $avantdossier = $_GET["dossier"];
                    for($o = 0; $o < sizeof($dossier); $o++)  
                        {
                            ?>
                                
                                <?php
                                    echo "<a href='../Controller/controll-video.php?video=".$default."&dossier=".$avantdossier."/".$dossier[$liens]."' class='a-doc'>".$dossier[$liens]."</a>";
                                    echo "<br>";
                                    $liens++;
                                ?>
                            <?php

                        }
                ?>
            </div>

        <nav class='nav-separation-div'>
        <?php
        if(isset($_GET["dossier"])&& $_GET["dossier"]!="default")
        {
            $dossierRetour = BoutonRetour($_GET["dossier"]);
            if($dossierRetour!="")
            {
                
                echo "<a href='../Controller/controll-video.php?video=default&dossier=".$dossierRetour."' class='a-separation'>Avant</a>";
               
            }else
            {
                
                echo "<a href='../Controller/controll-video.php?video=default' class='a-separation'>Avant</a>";
                
            }
        
        }
        ?>
        </nav>
       
            <div class="div-liens-video">
                <?php
                    $liens = 0;
                    if(isset($_GET["dossier"]))
                    {
                        $NDosier=$_GET["dossier"];
                        for($o = 0; $o < sizeof($fichiers); $o++)  
                        {
                            ?>
                                <?php
                                    echo "<a href='../Controller/controll-video.php?dossier=".$NDosier."&video=".$fichiers[$liens]."' class='a-doc'>".$fichiers[$liens]."</a>";
                                    echo "<br>";
                                    $liens++;
                                ?>
                        
                            <?php

                        }
                    }else
                    {
                        for($o = 0; $o < sizeof($fichiers); $o++)  
                        {
                            ?>
                                
                                    <?php
                                        echo "<a href='../Controller/controll-video.php?video=".$fichiers[$liens]."' class='a-doc'>".$fichiers[$liens]."</a>";
                                        echo "<br>";
                                        $liens++;
                                    ?>
                            <?php

                        }
                    }
                ?>
            </div>
           
        </nav>

        <nav class="nav-lecteur-video">
            <?php

            if($_GET["video"]=="default")
            {
                echo "<nav class='box-nav-lecteur-video'>";
                LecteurJW('../Video/alaylaysAnimation.mp4');
                echo "</nav>";
            }
            elseif($_GET["video"]!="default" && isset($_GET["dossier"]))
            {
                $nom = $_GET["dossier"];
                echo "<nav class='box-nav-lecteur-video'>";
                LecteurVideoBase("../Video".$nom."/".$video);
                echo "</nav>";
                echo "<nav class='box-nav-lecteur-video'>";
                LecteurJW("../Video".$nom."/".$video);
                echo "</nav>";
                echo "<nav class='box-nav-lecteur-video'>";
                LecteurJSCDN("../Video".$nom."/".$video);
                echo "</nav>";
            }else{
                echo "<nav class='box-nav-lecteur-video'>";
                LecteurVideoBase("../Video/".$video);
                echo "</nav>";
                echo "<nav class='box-nav-lecteur-video'>";
                LecteurJW("../Video/".$video);
                echo "</nav>";
                echo "<nav class='box-nav-lecteur-video'>";
                LecteurJSCDN("../Video/".$video);
                echo "</nav>";
            }
            ?>
        </nav>
        </div>
    </body>
</html>