<html>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-10646"/>
        <meta charset="UTF-8">
        <LINK REL="SHORTCUT ICON" href="../Media/Image/icone.jpg" /> <!-- Icone de l'onglet de la page web -->

        <link rel="stylesheet" href="../Css/image.css" /> <!-- Importations du css -->
            
            <head>
                <title>Image</title> <!-- Titre de l'onglet de la page web -->
            </head>
    <body>
        <header>
            <div class="div-headers-1">
                <a href="../" class="Lien-nav-Accueil"><h1>Samba</h1></a>
                <div class="div-separation"></div>
            </div>
            <div class="div-headers-2">
                <a href="../Controller/affichage-image.php?chgp=0 & page=1" class="Lien-nav-Accueil">Première page</a>
                <?php
                    if($page!=1)
                    {
                ?>
                    <form action="../Controller/affichage-image.php?chgp=1 & chang=prec" method="post">
                        <input name="Précédent" value="Précédent" type="submit" />
                        <input name="prec" value ="<?php echo $page?>" type="hidden" class="Lien-nav-Accueil"/>
                    </form>
                <?php
                    }
                    if($tabliens[0][$page+1]!=null)
                    {
                ?>
                    <br>
                    <form action="../Controller/affichage-image.php?chgp=1 & chang=suiv" method="post">
                        <input name="Suivante" value="Suivante" type="submit" />
                        <input name="suiv" value ="<?php echo $page?>" type="hidden" class="Lien-nav-Accueil"/>
                    </form>
                <?php
                    }
                ?>
            </div>
        </header>
<?php
   /* if ($_GET["chgp"]==0)
    {*/
?>
        <div class="conteneur-1">
            <div class="conteneur-2">
                <?php
                $liens = 0;
                //echo $tabliens[0][1];
                if($page!=null)
                {
                    //echo $page;
                    while($liens != 25) 
                    {
                        //echo "<br> L".$liens." P".$page;
                       //echo $tabliens[$liens][$page];
                       if($tabliens[$liens][$page] != "0")
                       {
                        ?>
                            <div class="div-image">
                                <img class="Min-Image" src="<?php echo "../Image/".$tabliens[$liens][$page] ?>"/>
                            </div>
                        <?php
                       }
                        $liens++;
                            
                    }
                    //$page++;
                    
                    closedir($dir);
                }
 
                ?>
            </div>
        </div>
<?php
    //}
?>
    </body>
    
</html>