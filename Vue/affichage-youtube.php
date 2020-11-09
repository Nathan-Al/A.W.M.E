<html>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-10646"/>
        <meta charset="UTF-8">
        <LINK rel="icon" type="image/png" href=<?php echo $IconeSite ?> /> <!-- Icone de l'onglet de la page web -->
        <link rel="stylesheet" href=<?php echo $liens_css_all ?> /> <!-- Importations du css -->
            
            <head>
                <title>Youtube Playlist</title>
            </head>

            <body>
                <header>
                    <div class="div-headers-1">
                        <a href="../" class="Lien-nav-Accueil"><h1>Menu</h1></a>
                    </div>
                    <div class="div-headers-2">
                    <?php
                        if($Array_youtube!=false)
                        for($p = 0; $p < sizeof($Array_youtube); $p++)
                            {
                                ?>
                                    <a href="#playlist-<?php echo $p ?>" class="a-play">Playlist <?php echo $p+1 ?></a>
                                <?php
                            }
                    ?>
                    </div>
                    <div class="div-headers-3">
                    </div>
                </header>
                <div class="div-contenue">
                    <div class="div-contenue-playlist">
                        <?php
                        if($Array_youtube!=false)
                            for($p = 0; $p < sizeof($Array_youtube); $p++)
                            {
                                ?>
                                    <div class="div-playlist">
                                        <iframe id="playlist-<?php echo $p ?>" src=<?php echo $Array_youtube[$p] ?> frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="iframe-playlist"></iframe>
                                    </div>
                                <?php
                            }
                        else
                        {
                            ?>
                                <h1>Aucune playlist</h1>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </body>
</html>