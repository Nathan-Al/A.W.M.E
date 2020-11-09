<html>
<meta http-equiv="Content-Type" content="text/html; charset=iso-10646"/>
        <meta charset="UTF-8">
        <LINK rel="icon" type="image/png" href=<?php echo $IconeSite ?> /> <!-- Icone de l'onglet de la page web -->

        <link rel="stylesheet" href=<?php echo $liens_css_musique ?> /> <!-- Importations du css -->
            
            <head>
                <title>Musique : <?php echo  $info_music[0]->getTitre() ?></title> <!-- Titre de l'onglet de la page web -->
            </head>
        <header>
            <div class="div-headers-1">
                <a href="../" class="Lien-nav-Accueil"><h1>Menu</h1></a>
            </div>
        </header>

<div class="gestion-div-lecteur-modif">
    <div class="div-modif-audio">
    <h2 class="h23">Modification du fichier .mp3</h2>
        <form action="<?php echo $controller_musique?>" method="post" enctype="multipart/form-data">
            <div class="div-label-textarea"> 

                <div class="div-contenue-modif">

                    <div class="div-label-texte">
                        <label for="nom">Miniature musique :  </label>
                    </div>
                    <div class="div-input"> 
                        <input type="file" name="fichiers" accept="image/jpeg, image/gif, image/png" value=<?php $Data ?> >
                    </div>

                </div>
                <div class="div-contenue-modif">
                <?php
                     echo '<div class="div-input">';
                        foreach ($ValidTagTypes as $ValidTagType) 
                        {
                            echo '<p class="checkbox-php"><input type="checkbox" class="checkbox-php" name="TagFormatsToWrite[]" value="'.$ValidTagType.'"';
                        if (count($ValidTagTypes) == 1) 
                        {
                            echo ' checked="checked"';
                        } else 
                        {
                            switch ($ValidTagType) {
                                case 'id3v2.2':
                                case 'id3v2.3':
                                case 'id3v2.4':
                                if (isset($OldThisFileInfo['tags']['id3v2'])) {
                                    echo ' checked="checked"';
                                }
                                break;
        
                            default:
                                if (isset($OldThisFileInfo['tags'][$ValidTagType])) {
                                    echo ' checked="checked"';
                                }
                                break;
                        }
                    }
                    echo '>'.$ValidTagType.'</p>';
                }
                if (count($ValidTagTypes) > 1) {
                    echo '<hr><p class="checkbox-php"><input type="checkbox" name="remove_other_tags" value="1"> Remove non-selected tag formats when writing new tag</p>';
                }
                echo ' </div>';

                echo '<select name="APICpictureType">';
                
                $APICtypes = getid3_id3v2::APICPictureTypeLookup('', true);
                foreach ($APICtypes as $key => $value) {
                    echo '<option value="'.htmlentities($key, ENT_QUOTES).'">'.htmlentities($value).'</option>';
                }
                echo '</select></td></tr>';
                ?>
                </div>
                <div class="div-contenue-modif">

                    <div class="div-label-texte">
                        <label for="nom">Nom de la piste :  </label>
                    </div> 
                    <div class="div-input"> 
                        <input type="text" id="nom" name="titre" required maxlength="100" size="30" value="<?php echo htmlspecialchars($info_music[0]->getTitre()) ?>">
                    </div>

                </div>
                <div class="div-contenue-modif">

                    <div class="div-label-texte">
                        <label for="album">Nom de l'album :   </label>
                    </div>
                    <div class="div-input"> 
                        <input type="text" id="album" name="album" required maxlength="100" size="30" value="<?php echo htmlspecialchars($info_music[0]->getAlbum()) ?>">
                    </div>

                </div>
                <div class="div-contenue-modif">

                    <div class="div-label-texte">
                        <label for="artiste">Artiste :   </label>
                    </div>
                    <div class="div-input"> 
                        <input type="text" id="artiste" name="artiste" required maxlength="100" size="30" value="<?php echo htmlspecialchars($info_music[0]->getArtiste()) ?>">
                    </div>

                </div>
                <div class="div-contenue-modif">

                    <div class="div-label-texte">
                        <label for="genre">Genre :  </label>
                    </div>
                    <div class="div-input"> 
                        <input type="text" id="genre" name="genre" required maxlength="100" size="30" value="<?php echo htmlspecialchars($info_music[0]->getGenre()) ?>">
                    </div>

                </div>
                <div class="div-contenue-modif">

                    <div class="div-label-texte">
                        <label for="date">Date :   </label> 
                    </div>
                    <div class="div-input"> 
                        <input type="number" id="date" name="datecreation" required maxlength="100" size="30" value="<?php echo htmlspecialchars($info_music[0]->getAnnee()) ?>">
                    </div>

                </div>
       
            <input type="hidden" required maxlength="100" name="liensmusique" value= "<?php echo htmlspecialchars($liens) ?>" />
            <input type="hidden" name="modification" />
            <input type="submit" value="Save Changes" />

            </div> 
        </form>
    </div>


</div>


</html>