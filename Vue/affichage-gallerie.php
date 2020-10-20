<html>
    <head>
        <title>Image</title> <!-- Titre de l'onglet de la page web -->
        <meta http-equiv="Content-Type" content="text/html; charset=iso-10646"/>
        <meta charset="UTF-8">
        <LINK rel="icon" type="image/png" href=<?php echo $IconeSite ?> /> <!-- Icone de l'onglet de la page web -->
        <link rel="stylesheet" href=<?php echo $liens_css_gallery ?> /> <!-- Importations du css -->
    </head>

    <body>
        <header>
            <div class="div-headers-1">
                    <a href="../" class="Lien-nav-Accueil"><h1>Menu</h1></a>
                <div class="div-separation"></div>
            </div>
            <div class="div-headers-2">
                <?php
                    if(isset($page))
                    {
                        if(isset($nbpage))
                        {
                            echo "<p>Page ".$page."/".$nbpage."</p>";
                        }
                    }
                ?>
            </div>
            <div class="div-headers-3">
                <form action="<?php echo $controller_affichage_gallery ?>?chgp=chercher" method="post" class="form-recherche">
                    <div class="div-input-search">
                        <input type="search" name="searchEngine" placeholder="Recherche..." />
                        <input type="submit" value="Valider" />
                    </div>
                </form>
<!-- Bouton de changements de pages -->
                <div class="div-container-bouton-page">
                    <?php
                        if($page>1)
                        {
                    ?>
                        <div class="div-a-page">
                            <a href="<?php echo $controller_affichage_gallery ?>?page=<?php echo $_GET["page"]-1 ?>" class="a-chgp">Précédent</a>
                        </div>
                        <div class="div-a-page">
                            <a href="<?php echo $controller_affichage_gallery ?>?page=1" class="a-accueil">Première page</a>
                        </div>

                    <?php
                        }
                    ?>
                     <?php
                        if($page>0 && $page<$nbpage)
                        {
                    ?>
                        <div class="div-a-page">            
                            <a href="<?php echo $controller_affichage_gallery ?>?page=<?php echo $_GET["page"]+1 ?>" class="a-chgp">Suivant</a>
                        </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </header>
<?php
   /* if ($_GET["chgp"]==0)
    {*/
?>
        <div id="conteneur-1" class="conteneur-1">
            <div id="conteneur-2" class="conteneur-2">
                <div id="conteneur-3" class="conteneur-3">
                    <?php
                    //echo $tabliens[0][1];
                    if($page!=null)
                    {
                        if ($tabliens!=false)
                        {
                            if ($page>0 && $page<=$nbpage)
                            {
                                for($f = 0; $f < sizeof($tabliens[$page]); $f++)
                                {
                                    //echo "<br> L".$liens." P".$page;
                                    //echo $tabliens[$liens][$page];
                                    if($tabliens[$page][$f] != "0")
                                    {
                                        ?>
                                            <div id="affichage-div-image" class="affichage-div-image">
                                                
                                                    <!--<a class="a-image" href="<?php //echo $controller_affichage_image."?nomimage=".$tabliens[$liens][$page]."&page=".$page ?>"> -->
                                                        <div id="a-image-background" class="a-image-background">
                                                            <!-- Background nom image (apparait en hover) -->
                                                            <span id="image-span" class="div-image-span"><?php $nom_fichier = explode("/",$tabliens[$page][$f]); echo $nom_fichier[sizeof($nom_fichier)-1]; ?></span>
                                                        </div>
                                                    <!--</a>-->
                                                
                                                                                    
                                                <div id="div-image" class="div-image">
                                                    <img class="Min-Image" id="<?php echo $f?>" src="<?php echo $tabliens[$page][$f] ?>"/>
                                                </div>
                                            </div>
                                        <?php
                                    }
                                }  
                            }else
                            {  
                            ?>
                                <h1 class="h1_center">LA PAGE N'EXISTE PAS</h1>
                            <?php
                            } 
                        }else
                        {
                            ?>
                                <h1 class="h1_center">AUCUNE IMAGE</h1>
                             <?php
                        }
                    }
    
                    ?>

                    <?php
                        if(isset($_GET["chgp"]))
                        {
                            if($_GET["chgp"]=="chercher")
                            {
                                for($liens=0;$liens<sizeof($tabliens);$liens++)
                                {
                                    if($tabliens[$liens] != "0")
                                    {
                                        if($lien_retour_images.$tabliens[$liens]!=$lien_retour_images)
                                        {
                                            ?>
                                                <div class="div-image">
                                                    <img class="Min-Image" src="<?php echo $lien_retour_images.$tabliens[$liens] ?>"/>
                                                </div>
                                            <?php
                                        }
                                    } 
                                }
                            }
                        }

                    ?>
                </div>
                <div id="conteneur-4" class="conteneur-4">

                </div>
            </div>
        </div>
<?php
    //}
?>
        <script src="../Scripts/gallerie.js"></script>
    </body>
    
</html>