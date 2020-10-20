<html> 
    <head>
        <title>Musique : <?php echo  $info_music[0]->getTitre() ?></title> <!-- Titre de l'onglet de la page web -->
        <meta http-equiv="Content-Type" content="text/html; charset=iso-10646"/>
        <meta charset="UTF-8">
        <LINK rel="icon" type="image/png" href=<?php echo $IconeSite ?> /> <!-- Icone de l'onglet de la page web -->
        <link rel="stylesheet" href=<?php echo $liens_css_musique ?> /> <!-- Importations du css -->
    </head>
        <header>
            <div class="div-headers-1">
                <a href="../" class="Lien-nav-Accueil"><h1>Menu</h1></a>
            </div>
        </header>
    <body>
        <div class="div-contenue">
            <div class="div-navigation">
                <a class="a-boutton" href="">Précédent</a>
                    <nav class="nav-liens-musique">
                        <?php
                        $iop = 0;
                        if($fichier!=false)
                        {
                            for($i=0; $i<10/*sizeof($fichier)*/;$i++)
                            {
                                echo "<div class='div-liens-musique' >
                                        <div class='div-min-liens-musique'>
                                            ".$liens_musique[$i][0]->getImage()."
                                        </div>

                                        <div class='div-liens-musique-info'>
                                            <a href='".$controller_musique."?musique=".$fichier[$iop]."' class='liens-musique'>".$fichier[$iop]."</a>
                                        </div>
                                        
                                    </div>";
                                $iop++;
                            }
                        }else
                        {
                            ?>
                                <h1>AUCUN FICHIERS</h1>
                            <?php
                        }
                        ?>
                    </nav>
                <a class="a-boutton" href="">Suivant</a>
            </div>
        
            
            <div class="div-affichage-musique">
                <div class="gestion-div-info">
                        <?php 
                            if (!isset($image) || $image==null)
                            {
                                ?>
                                    <div class="div-img">
                                        <img class="img" src= <?php echo $liensMediaSite."album.jpg" ?>>
                                    </div>
                                <?php
                            }else
                            {
                                echo $info_music[0]->getImage();
                            }

                        ?>


                </div>
                    <div class="div-info">
                        <div class="div-p-info-musique">
                            <p>Nom de la piste :  <?php echo  $info_music[0]->getTitre() ?></p>
                        </div>
                        <div class="div-p-info-musique">
                            <p>Nom de l'album : <?php echo  $info_music[0]->getAlbum() ?></p> 
                        </div>
                        <div class="div-p-info-musique">
                            <p>Artiste :  <?php echo $info_music[0]->getArtiste() ?></p>
                        </div>
                        <div class="div-p-info-musique">
                            <p>Genre : <?php echo $info_music[0]->getGenre() ?></p> 
                        </div>
                        <div class="div-p-info-musique">
                            <p>Durée :  <?php echo $info_music[0]->getTemps() ?></p>
                        </div>
                        <div class="div-p-info-musique">
                            <p>Date :  <?php echo $info_music[0]->getAnnee() ?></p>
                        </div>
                    </div>
                <div class="div-lecteur-audio">
                    <?php
                        LecteurAudio($musique); 
                    ?>
                </div> 
            </div>


</div>

        </div>
    </body>

</html>