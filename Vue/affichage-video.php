<html>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-10646"/>
        <meta charset="UTF-8">
        <LINK rel="icon" type="image/png" href=<?php echo $IconeSite ?> /> <!-- Icone de l'onglet de la page web -->

        <link rel="stylesheet" href=<?php echo $liens_css_video ?> /> <!-- Importations du css -->
            <head>
                <?php
                    if($video!="default" && isset($dossier) && $videosansmp4!="")
                    {
                        $nom = $dossier;
                        echo '<title> Video : '.$videosansmp4.'</title>';

                    }else
                    {
                        echo '<title>Video</title>';
                    }
                ?>
                <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                <meta http-equiv="X-UA-Compatible" content="ie=edge" />
                <link href="https://vjs.zencdn.net/7.8.4/video-js.css" rel="stylesheet" />
                <link href="https://unpkg.com/@videojs/themes@1/dist/fantasy/index.css" rel="stylesheet">
                <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
            </head>
    <body>
        <?php if(isset($mama)){echo $mama;}?>
        <header>
            <div class="div-headers-1">
                <a href="../" class="Lien-nav-Accueil"><h1>Samba</h1></a>
            </div>
            <div class="div-headers-2">
                <p id="titre_video">Vous regardez : </p>
            </div>
        </header>
    <div class="div-contenue">
        <nav class="nav-liste-video">
                                           <!-- BOUCLE AFFICHAGE DOSSIER --> 
            <div class="div-dossier-video" id="div-dossier-video">
                
                <?php
                    if($dossier!=false)
                    {
                        for($o = 0; $o < sizeof($dossier); $o++)  
                        {
                            echo '<button id="dossier" class="button-liens-dossier" value="'.$dossier_liens[$o].'">'.$dossier[$o].'</button>';
                            echo "<br>";
                        }
                    }else
                    {
                        ?>
                            <H1>AUCUN DOSSIER</H1>
                        <?php
                    }

                ?>
                </form>
            </div>
        <nav class='nav-separation-div' id="nav-separation-div">
            
        </nav>
                                           <!-- BOUCLE AFFICHAGE FICHIER VIDEO -->        
            <div class="div-liens-video" id="div-liens-video">
                <?php
                    $liens = 0;
                    if(isset($dossier))
                    {
                        if($fichiers!=false)
                        {
                            $NDosier=$dossier;
                            for($o = 0; $o < sizeof($fichiers); $o++)  
                            {
                                
                                        //echo "<a href='".$controller_video."?dossier=".$NDosier."&video=".$fichiers[$liens]."' class='a-doc'>".$fichiers[$liens]."</a>";
                                        
                                        echo '<button id="fichier" class="button-liens-video" value="'.$liens_video[$liens].'" type="button">'.$fichiers[$liens].'</button>';
                                        echo "<br>";
                                        $liens++;
                                    ?>
                            
                                <?php
    
                            }
                        }

                    }else
                    {
                        if($fichiers!=false)
                        {
                            for($o = 0; $o < sizeof($fichiers); $o++)  
                            {
                                ?>
                                    
                                        <?php
                                            //echo "<a class='a-doc' href='".$controller_video."?video=".$fichiers[$liens]."' class='a-doc'>".$fichiers[$liens]."</a>";
                                            echo '<button id="fichier" class="button-liens-video" value="'.$liens_video[$liens].'">'.$fichiers[$liens].'</button>';
                                            echo "<br>";
                                            $liens++;
                                        ?>
                                <?php
    
                            }
                        }else
                        {
                            ?>
                                <h1>AUCUN FICHIERS</h1>
                            <?php
                        }
                    }
                ?>
            </div>
           
        </nav>
                                                    <!-- LECTEUR VIDEO -->
        <nav class="nav-lecteur-video">
            <div id="conteneur-para-onglet" class="conteneur-para-onglet">
                <nav id="para-nav" class="para-nav">Lecteur Normal</nav>
                <nav id="para-nav" class="para-nav">JSON Lecteur</nav>
            </div>

            <div class="conteneur-para-contenue" id="conteneur-para-contenue">
                <nav class='box-nav-lecteur-video' style='z-index:0;' id="nav-normal-video">
                        
                </nav>
                <nav class='box-nav-lecteur-video' style='z-index:-1;' id="nav-js-video">
                        
                </nav>
            </div>
            
        </nav>
</div>
        <script src="../Scripts/jquery-3.5.1.js"></script>
        <script src="../Scripts/video.js"></script>
    </body>
</html>