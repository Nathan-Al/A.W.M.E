<html> 
    <head>
        <title>Musique</title> <!-- Titre de l'onglet de la page web -->
        <meta http-equiv="Content-Type" content="text/html; charset=iso-10646"/>
        <meta charset="UTF-8">
        <LINK rel="icon" type="image/png" href=<?php echo $IconeSite ?> /> <!-- Icone de l'onglet de la page web -->
        <link rel="stylesheet" href=<?php echo $liens_css_all ?> /> <!-- Importations du css -->
        <link rel="stylesheet" href=<?php echo  $liens_bootstrap?> integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    </head>
    <header>
            <div class="div-headers-1">
                <a href="../" class="Lien-nav-Accueil"><h1>Menu</h1></a>
            </div>
            <div class="div-headers-2">
                <div class="header-contenue">

                </div>
            </div>
            <div class="div-headers-3">
            </div>
        </header>
    <body>
        <div class="div-contenue">
            <div class="div-navigation">
                    <nav class="nav-liens-musique">
                        <?php
                        $iop = 1;
                        if(isset($data_musique))
                        if($data_musique!=false)
                        {
                            for($i=1; $i<sizeof($data_musique)+1;$i++)
                            {
                                ?>
                                <div class='div-liens-musique' >
                                        <div class='div-min-liens-musique'>
                                            <img class="img-min-lecteur" src="<?php echo $liensMediaSite."album.png" ?>">
                                        </div>

                                        <div class='div-liens-musique-info'>
                                            <button id="button-musique" type="button" data-link='<?php echo $liens_musique[$iop]?>' class='liens-musique'><?php echo $data_musique[$i][0]->getTitre()?></button>
                                        </div>
                                        
                                    </div>
                                    <?php
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
                    <div class="gestion-div-info">
                        <div class="div-img" id="cover-image">
                            <img class="img-min-lecteur" src= <?php echo $liensMediaSite."album.png" ?>>
                        </div>
                        <div id="info-fetche" class="fetche-info">

                        </div>
                    </div>
            </div>
        
<!-- PARTIT LECTEUR DE MUSIQUE -->           
            <div class="div-affichage-musique">
                <div class="div-lecteur-audio">
                    <div class="div-info">
                        <div class="div-p-info-musique">
                           <?php /*echo  $info_music[0]->getTitre()*/ ?>
                        </div>
                    </div>
                        <div id="lecteur-musique" class="lecteur-musique">
                            <?php
                                LecteurAudio(""); 
                            ?>
                        </div>
                    </div> 
                </div> 
            </div>
</div>

        </div>
    </body>
    <script src="../Scripts/musique.js"></script>
</html>