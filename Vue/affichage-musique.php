<html>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-10646"/>
        <meta charset="UTF-8">
        <LINK rel="icon" type="image/png" href="../media-site/icone.png" /> <!-- Icone de l'onglet de la page web -->

        <link rel="stylesheet" href="../Css/musique.css" /> <!-- Importations du css -->
            
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
                        echo "<a href='../Controller/controll-musique.php?musique=".$fichier[$iop]."' class='liens-musique'>".$fichier[$iop]."</a>";
                        echo "<br>";
                        $iop++;
                    }
                ?>
            </div>
            <div class="div-lecteur">
                <?php
                    LecteurAudio($musique); 
                ?>
            </div>
        </div>
    </body>

</html>