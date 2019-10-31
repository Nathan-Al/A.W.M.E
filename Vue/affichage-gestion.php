<html>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-10646"/>
        <meta charset="UTF-8">
        <LINK rel="icon" type="image/png" href=<?php echo $IconeSite ?> /> <!-- Icone de l'onglet de la page web -->

        <link rel="stylesheet" href=<?php echo $liens_css_gestion ?> /> <!-- Importations du css -->
            
            <head>
                <title>Page d'administrations</title> <!-- Titre de l'onglet de la page web -->
            </head>
                <header>

                </header>
            <body>
                <div class="conteneur-1">
                    <form method="post" class="form-1" action=<?php echo $controller_affichage_gestion ?>>
                        <p>Creer une nouvelle page : </p>
                        <label for="nomfichier">Nom de la page web : </label>
                        <input id="nomfichier" type="text" name="name">
                        <input type="submit" name="create">
                    </form>

                    <form method="post" class="form-2" action=<?php echo $controller_affichage_gestion ?>>
                    <p>Supprimer une page : </p>
                        <label for="nomfichier">Nom de la page web : </label>
                        <input id="nomfichier" type="text" name="name">
                        <input type="submit" name="supp">
                    </form>
                </div>

                <nav class="Nav-Fichiers">
                    <?php
                        $liens = 0;
                            for($o = 0; $o < sizeof($fichiers); $o++) 
                                {
                                    if($tabliens[$liens] != "0")
                                        {
                                            ?>
                                                <div class="div-documents">
                                                    <?php
                                                        echo "<p class='p-page-name'>".$o." :".$fichiers[$liens]."</p>";
                                                    ?>
                                                </div>
                                            <?php
                                        }
                                    $liens++;    
                                }
                                    
                            //closedir($dir);
                                
                    ?>
                </nav>
            </body>
</html>