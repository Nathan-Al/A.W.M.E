<html>
    <head>
        <?php
            if(isset($video) && isset($dossier) && $videosansmp4!="")
            {
                if($video!="default")
                {
                    $nom = $dossier;
                    ?>
                        <title> Video : <?php echo $videosansmp4 ?> </title>
                    <?php
                }else
                {
                    ?>
                        <title>Video</title>
                    <?php
                }
            }
        ?>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-10646"/>
        <meta charset="UTF-8">
        <LINK rel="icon" type="image/png" href=<?php echo $IconeSite ?> /> <!-- Icone de l'onglet de la page web -->
        <link rel="stylesheet" href=<?php echo $liens_css_all ?> /> <!-- Importations du css -->
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
                <a href="../" class="Lien-nav-Accueil"><h1>Menu</h1></a>
            </div>
            <div class="div-headers-2">
                <div class="header-contenue">
                    <p id="titre_video">Vous regardez : </p>
                </div>
            </div>
            <div class="div-headers-3">
            </div>
        </header>
    <div class="div-contenue">
        <nav class="nav-liste-video">
                                           <!-- BOUCLE AFFICHAGE DOSSIER --> 
            <div class="div-video">
                <div class="titre_multimedia">
                        <p class="denomination">Dossier</p>
                </div>
                <div class="div-dossier-video" id="div-dossier-video">
                    <?php
                        if(isset($dossier))
                        {
                            if($dossier!=false)
                            {
                                for($o = 0; $o < sizeof($dossier); $o++)  
                                {
                                    ?>
                                        <button id="dossier" class="button-liens-dossier" value="<?php echo$dossier_liens[$o]?>"><?php echo $dossier[$o] ?></button>
                                    <?php
                                }
                            }else
                            {
                                ?>
                                    <H1>AUCUN DOSSIER</H1>
                                <?php
                            }
                        }
                    ?>
                </div>
            </div>
            <input type="hidden" id="far_from_home" value="<?php echo $far_from_home; ?>">
            <nav class='nav-separation-div' id="nav-separation-div"></nav>
                                           <!-- BOUCLE AFFICHAGE FICHIER VIDEO -->     
            <div class="div-video">
                <div class="titre_multimedia">
                    <p class="denomination">Video</p> 
                </div>
                    <div class="div-liens-video" id="div-liens-video">
                        <?php
                            $liens = 0;
                            if(isset($dossier))
                            {
                                if(isset($fichiers))
                                {
                                    $NDosier=$dossier;
                                    for($o = 0; $o < sizeof($fichiers); $o++)  
                                    {
                                        ?>
                                            <button id="fichier" class="button-liens-video" value="<?php echo $liens_video[$liens]?>" type="button"><?php echo $fichiers[$liens]?></button>
                                        <?php
                                            $liens++;
                                    }
                                }else
                                {
                                    ?>
                                        <h1>AUCUN FICHIERS</h1>
                                    <?php
                                }

                            }else
                            {
                                if($fichiers!=false)
                                {
                                    for($o = 0; $o < sizeof($fichiers); $o++)  
                                    {
                                        ?>
                                            <button id="fichier" class="button-liens-video" value="<?php echo $liens_video[$liens]?>"><?php echo $fichiers[$liens]?></button> 
                                        <?php
                                            $liens++;
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
            </div>
        </nav>
                                                <!-- LECTEUR VIDEO -->
        <nav class="nav-lecteur-video">
            <div id="conteneur-para-onglet" class="conteneur-para-onglet">
                <nav id="para-nav" class="para-nav">Lecteur Normal</nav>
                <nav id="para-nav" class="para-nav">JSON Lecteur</nav>
            </div>

            <div class="conteneur-lecteur-contenue" id="conteneur-para-contenue">
                <nav class='box-nav-lecteur-video' style='z-index:0;' id="nav-normal-video">
                            
                </nav>
                <nav class='box-nav-lecteur-video' style='z-index:-1;' id="nav-js-video">
                            
                </nav>
            </div>
        </nav>
    </div>
        <script src="../Scripts/jquery.js"></script>
        <script src="../Scripts/video.js"></script>
    </body>
</html>