<html>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-10646"/>
        <meta charset="UTF-8">
        <LINK rel="icon" type="image/png" href=<?php echo $IconeSite ?> /> <!-- Icone de l'onglet de la page web -->

        <link rel="stylesheet" href=<?php echo $liens_css_musique ?> /> <!-- Importations du css -->
            
            <head>
                <title>Musique</title> <!-- Titre de l'onglet de la page web -->
            </head>
    <body>
        <header>
            <div class="div-headers-1">
                <a href="../" class="Lien-nav-Accueil"><h1>Samba</h1></a>
            </div>
        </header>

        <div class="div-contenue">
            <div class="div-liens-musique">
                <?php
                $iop = 0;
                    for($i=0; $i<sizeof($fichier);$i++)
                    {
                        echo "<a href='".$controller_musique."?musique=".$fichier[$iop]."' class='liens-musique'>-".$fichier[$iop]."</a>";
                        echo "<br>";
                        $iop++;
                    }
                ?>
            </div>
            <div class="div-lecteur">
                <nav class="nav-img">
                    <img class="img" src="">
                </nav>
                <nav class="nav-lecteur">
                    <?php
                        LecteurAudio($musique); 
                    ?>
                </nav>
            </div>
        </div>
    </body>

</html>