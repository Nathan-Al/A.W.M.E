<html>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-10646"/>
        <meta charset="UTF-8">
        <LINK rel="icon" type="image/png" href=<?php echo $IconeSite ?> /> <!-- Icone de l'onglet de la page web -->

        <link rel="stylesheet" href=<?php echo $liens_css_image ?> /> <!-- Importations du css -->
            
            <head>
                <title>Image <?php echo ""?></title> <!-- Titre de l'onglet de la page web -->
            </head>

            <body>
                <div class="conteneur-1">
                    <div class="conteneur-image">
                        <div class="div-image-1">
                            <div class="div-image-2">
                                <div class="div-image-3">
                                    <img class="Min-Image" src="<?php echo $lien_retour_images.$liens_image ?>"/>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <div class="div-info">
                        <div class="bouttonRetour">
                            <a href=<?php echo $controller_affichage_gallery."?chgp=0&page=".$page ?> class="bouttonRetourA">Retour</a>
                        </div>
                        <div class="InfoImage">
                            <p>Titre : <?php echo $liens_image ?> </p>
                        </div>
                        <div class="InfoImage">
                            <p>Resolution : <?php echo $width."x".$height ?> </p>
                        </div>
                        <div class="InfoImage">
                            <p>Taille : <?php echo $taille ?></p>
                        </div>
                        <div class="InfoImage">
                            <p>Type : <?php echo $type ?></p>
                        </div>
                    </div>
                </div>

            </body>
</html>