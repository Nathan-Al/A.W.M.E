<!DOCTYPE html>
<html>
    <head>
        <title>Image</title> <!-- Titre de l'onglet de la page web -->
        <meta http-equiv="Content-Type" content="text/html; charset=iso-10646"/>
        <meta charset="UTF-8">
        <LINK rel="icon" type="image/png" href=<?php echo $IconeSite ?> /> <!-- Icone de l'onglet de la page web -->
        <link rel="stylesheet" href=<?php echo $liens_css_all ?> /> <!-- Importations du css -->
    </head>

    <body>
        <header>
            <div class="div-headers-1">
                <a href="../" class="Lien-nav-Accueil"><h1>Menu</h1></a>
            </div>
            <div class="div-headers-2">
                
            </div>
            <div class="div-headers-3">
                
            </div>
        </header>
        <div id="conteneur-1" class="conteneur-1">
            <div id="conteneur-2" class="conteneur-2">
                <div id="conteneur-3" class="conteneur-3" style="filter: blur(0);">
                    <?php
                        if ($tabliens!=false)
                        {
                            for($f = 0; $f < sizeof($tabliens); $f++)
                            {
                                if($tabliens[$f] != "0")
                                {
                                    ?>
                                            <div id="div-image-<?php echo $f?>" class="affichage-div-image" style="background-image: url(<?php echo $tabliens[$f] ;?>); ">
                                                <div id="a-image-background" class="a-image-background" data-target="div-image-<?php echo $f?>" data-name=<?php $nom_fichier = str_replace("%20"," ",explode("/",$tabliens[$f])); echo $nom_fichier[sizeof($nom_fichier)-1]; ?>>
                                                    <!-- Background nom image (apparait en hover) -->
                                                    <!--<span id="image-span" class="div-image-span"><?php //$nom_fichier = str_replace("%20"," ",explode("/",$tabliens[$f])); echo $nom_fichier[sizeof($nom_fichier)-1]; ?></span>-->
                                                </div>  <!--                             
                                                <div class="div-image" >

                                                </div>
                                                -->
                                            </div>
                                    <?php
                                }
                            }
                        }else
                        {
                            ?>
                                <h1 class="h1_center">AUCUNE IMAGE</h1>
                             <?php
                        }
                    ?>
                </div>
            </div>
        </div>
        <script src="../Scripts/gallerie.js"></script>
    </body>
    
</html>