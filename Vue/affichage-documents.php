<html>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-10646"/>
        <meta charset="UTF-8">
        <LINK rel="icon" type="image/png" href=<?php echo $IconeSite ?> /> <!-- Icone de l'onglet de la page web -->
        <link rel="stylesheet" href=<?php echo $liens_css_all ?> /> <!-- Importations du css -->
            <head>
                <title>Documents</title> <!-- Titre de l'onglet de la page web -->
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
        <nav class="Nav-Accueil-Liens">
            <nav class="Nav-Box">
<!-- BOX DU TITRE -->
                <nav class="Titre-Nav">
                    <h2>Dossier</h2>
                </nav>

                    <nav class="Nav-Dossier">
                        <?php
                            $liens = 0;
                            if($dossier!=false)
                            {
                                for($o = 0; $o < sizeof($dossier); $o++)  
                                {

                                    ?>
                                        <div class="div-documents">
                                            <?php
                                                $nb = $o+1;
                                             ?>
                                            <a href=<?php echo $lien_retour_documents.$dossier[$liens] ?> class='a-doc'><?php echo $nb." :".$dossier[$liens]?></a>
                                            <br>
                                        </div>
                                    <?php
                                $liens++;    
                                }
                            }else
                            {
                                ?>
                                <h1>AUCUN DOSSIER</h1>
                                <?php
                            }
                        ?>
                    </nav>
            </nav>
            <nav class="Nav-Box">
<!-- BOX DU TITRE -->
                <nav class="Titre-Nav">
                    <h2>Fichiers</h2>
                </nav>

                    <nav class="Nav-Fichiers">
                        <?php
                            $liens = 0;
                            if($fichiers!=false)
                            {
                                for($o = 0; $o < sizeof($fichiers); $o++) 
                                    {
                                        if($fichiers[$liens] != "0")
                                            {
                                                ?>
                                                    <div class="div-documents">
                                                        <?php
                                                            $nb = $o+1;
                                                        ?>
                                                        <a href=<?php echo $liens_fichiers[$liens]?> class='a-doc'><?php echo $nb." :".$fichiers[$liens]?></a>
                                                        <br>
                                                    </div>
                                                <?php
                                            }
                                            $liens++;    
                                    }
                            }else
                            {
                                ?>
                                    <h1>AUCUN FICHIERS</h1>
                                <?php
                            }  
                        ?>
                    </nav>
            </nav>
        </nav>
    </body>
</html>