<?php
    require "../Outil/lecteur-chemin.php";

    function ScanFichiers($liens_video){
        if(is_array($liens_video))
        {
            for($o = 0; $o <sizeof($liens_video);$o++)
            {
                $dir = "../".$liens_video[$o];
                if ( is_dir($dir) )  {
                    if ( $dh = opendir($dir) ) {
                        while ( ($element = readdir($dh)) !== false){{
                                if (($element != '_vti_cnf')&($element != '.')&($element != '..')&($element != '.DS_Store')	){
                                        if (is_dir($dir.'/'.$element))
                                        {
                                            //$tb_directories[] = $element;	
                                        }
                                        else
                                        {
                                            $tb_files[] = $element;	
                                        }
                                    }else
                                    {
                                        //$tb_directories = false;
                                    }
                                }	
                            }
                    }else
                    {
                        //$tb_files = false;
                    }
                }
            }
            if($tb_files==false || $tb_files[0]=="" || $tb_files[0]==null)
                return false;
            else
                return $tb_files;
        }else
        {

        }
    }

    function ScanDossier($liens_dossier){
        $tb_directories = array();
        if(is_array($liens_dossier))
        {
            try {   
                for($o = 0; $o < sizeof($liens_dossier); $o++)  
                {
                    $dir = CheckLink($liens_dossier[$o]);
                    if ( is_dir($dir) )  {
                        if ( $dh = opendir($dir) ) {
                            while ( ($element = readdir($dh)) !== false){{
                                if (	($element != '_vti_cnf')	&
                                    ($element != '.')		&
                                    ($element != '..')		&
                                    ($element != '.DS_Store')	){
                                        
                                        if (is_dir($dir.'/'.$element))
                                        {
                                            $tb_directories[] = $element;	
                                        }
                                        else
                                        {
                                            $tb_files[] = $element;	
                                        }
                                    }
                                }	
                            }
                        }else
                        {
                            $tb_directories = false;
                        }
                    }
                }   

            } catch(Exception $e){
                $tb_directories = false;
            }

            if($tb_directories==false || $tb_directories[0]=="" || $tb_directories[0]==null)
                return false;
            else
                return $tb_directories;
        }
        else
        {
            try {   
                $dir = CheckLink($liens_dossier);
                    if ( is_dir($dir) )  {
                        if ( $dh = opendir($dir) ) {
                            while ( ($element = readdir($dh)) !== false){{
                                if (	($element != '_vti_cnf')	&
                                    ($element != '.')		&
                                    ($element != '..')		&
                                    ($element != '.DS_Store')	){
                                        
                                        if (is_dir($dir.'/'.$element))
                                        {
                                            $tb_directories[] = $element;	
                                        }
                                        else
                                        {
                                            $tb_files[] = $element;	
                                        }
                                    }
                                }	
                            }
                        }else
                        {
                            $tb_directories = false;
                        }
                    }
                 

            } catch(Exception $e){
                $tb_directories = false;
            }

            if($tb_directories==false || $tb_directories[0]=="" || $tb_directories[0]==null)
                return false;
            else
                return $tb_directories; 
        }
    }

    //Affichage documents

    function ScanFichiersDoc($liensfich){
        $tb_files = null;
        for($o = 0; $o < sizeof($liensfich); $o++)
        {
            $dir = CheckLink($liensfich[$o]);
            try{
                if ( is_dir($dir) )  {
                    if ( $dh = opendir($dir) ) {
                        while (false !== ($element = readdir($dh))){{
                                if (	($element != '_vti_cnf')	&
                                    ($element != '.')		&
                                    ($element != '..')		&
                                    ($element != '.DS_Store')	){
                                        
                                        if (is_dir($dir.'/'.$element))
                                        {
                                            $tb_directories[] = $element;	
                                        }
                                        else
                                        {
                                            $tb_files[] = $element;	
                                        }
                                    }
                                }	
                            }
                        }
                    }

            }catch(Exception $e){
                $tb_files = false;
            }
        }
        if($tb_files!=null)
            return $tb_files;
        else
            return false;
    }

    function ScanDossierDoc($LiensDoc){
        $tb_directories = null;
        for($o = 0; $o < sizeof($LiensDoc); $o++)
        {
            $dir = CheckLink($LiensDoc[$o]);
            if ( is_dir($dir) )  {
                if ( $dh = opendir($dir) ) {
                    while ( ($element = readdir($dh)) !== false){{
                            if (	($element != '_vti_cnf')	&
                                ($element != '.')		&
                                ($element != '..')		&
                                ($element != '.DS_Store')	){
                                    
                                    if (is_dir($dir.'/'.$element))
                                    {
                                        $tb_directories[] = $element;	
                                    }
                                    else
                                    {
                                        $tb_files[] = $element;	
                                    }
                                }
                            }	
                        }
                    }
                }else
                {
                    $tb_directories = false;
                }
            if($tb_directories!=null)
                return $tb_directories;
            else
                return $tb_directories = false;
        }
    }
    /**
     * Fonctions qui permet de récupérer le chemin des ou du fichier/s qui se trouve dans le dossier envoyer
     * Integer limite_fichier : indique combien de chemin vont être mise par par page Default = 0
     * Array / String chemin_dossier : chemin ou la function devra récupérer les chemin des fichiers
     */
    function chargeLiens($chemin_dossier, $limite_fichier = 0)
    {
        $dir[]=null;
        $page = 1;
        if(is_array($chemin_dossier))
        {
            for ($o = 0; $o < sizeof($chemin_dossier); $o++)
            {
                $dirname[$o] = CheckLink($chemin_dossier[$o]);
                try{
                    if(is_dir($dirname[$o]))
                    {
                        if ( $dir[$o] = opendir($dirname[$o])) {

                            if($limite_fichier > 0)
                            {
                                $file = array();
                                $liens = 0;
                                while (false !== ($entry = readdir($dir[$o]))) {
                                    if($entry!="."&&$entry!="..")
                                    {
                                        $file[$page][$liens] = $dirname[$o].$entry;
                                        $liens++;
                                        if($liens==15)
                                        {
                                            $page++;
                                            $liens = 0;
                                        }
                                            
                                    }
                                }
                            }else
                            {
                                $file = array();
                                $a = 0;
                                while (false !== ($entry = readdir($dir[$o]))) {
                                    if($entry!="."&&$entry!="..")
                                    {
                                        $file[$a] = $dirname[$o]."/".$entry;
                                        $a++;
                                    }
                                }
                            }
                            closedir($dir[$o]);
                        }
                    }
                    else
                    {
                        $dir[$o] = false;
                    }
                }catch(Exception $e)
                {
                    $dir = false;
                }
            }
        }else
        {
            try{
                if(is_dir($chemin_dossier))
                {
                    if ( $dir = opendir($chemin_dossier)) {

                        if($limite_fichier > 0)
                        {
                            $file = array();
                            $liens = 0;
                            while (false !== ($entry = readdir($dir))) {
                                if($entry!="."&&$entry!="..")
                                {
                                    $file[$page][$liens] = $chemin_dossier.$entry;
                                    $liens++;
                                    if($liens==15)
                                    {
                                        $page++;
                                        $liens = 0;
                                    }
                                        
                                }
                            }
                        }else
                        {
                            $file = array();
                            $a = 0;
                            while (false !== ($entry = readdir($dir))) {
                                if($entry!="."&&$entry!="..")
                                {
                                    $file[$a] = $chemin_dossier."/".$entry;
                                    $a++;
                                }
                            }
                        }
                        closedir($dir);
                    }
                }
                else
                {
                    $dir = false;
                }
            }catch(Exception $e)
            {
                $dir = false;
            }
        }
        return $file;
    }

    function ListerTotalitefichier($chemindacces)
    {
        $dossier = ScanDossier($chemindacces);
        $fichier = ScanFichiers($chemindacces);
        if($dossier != false && $fichier != false)
        {
            for($o = 0; $o < sizeof($chemindacces); $o++)
            {
                if($dossier[$o]!=false && $dossier[$o] !=null)
                for($p=0;$p<sizeof($dossier[$o]);$p++)
                {
                    $sousfichier = ScanFichiers($chemindacces.$dossier[$p]);
                    $indexmulti = sizeof($fichier)+sizeof($sousfichier);
                }
                else
                $indexmulti = false;
                //$indexmulti = sizeof($fichier);
    
                $o=0;
                for($m=0;$m<$indexmulti;$m++)
                {
                    if($m<sizeof($fichier))
                    {
                        $fichierfin[$m]=$fichier[$m];
                    }else
                    {
                        $fichierfin[$m]=$sousfichier[$o];
                        
                        $o++;
                    }
                }
            }
        }else
        {
            $fichierfin = false;
        }

    
        return $fichierfin;  
    }

    function ChercherFicher($CharactACherh, $liensDossier)
    {
        $dossier = ScanDossier($liensDossier);
        $fichier = ScanFichiers($liensDossier);

        for($p=0;$p<sizeof($dossier);$p++)
        {
            if($dossier[$p] != "." && $dossier[$p] != ".." && !is_dir($dirname.$dossier[$p] && $dossier[$p]!="" && $dossier[$p]!=false && $dossier[$p]!=null))
            {
                $sousfichier = ScanFichiers($liensDossier.$dossier[$p]);
            }
            if ($dossier[$p]=="..")
            {
                $dossier[$p] = "0";
            }
        }

        $indexmulti = sizeof($fichier)+sizeof($sousfichier);
        $o=0;
        for($m=0;$m<$indexmulti;$m++)
        {
            if($m<sizeof($fichier))
            {
                if($fichier[$m] != "." && $fichier[$m] != ".." && !is_dir($dirname.$fichier[$m] && $fichier[$m]!="" && $fichier[$m]!=false && $fichier[$m]!=null))
                {
                    $fichierfin[$m]=strtolower($fichier[$m]);
                }
                if ($fichier[$m]=="..")
                {
                    $fichier[$m] = "0";
                }
                
            }else
            {
                $fichierfin[$m]=$sousfichier[$o];
                
                $o++;
            }
        }
        for($l=0;$l<sizeof($fichierfin);$l++)
        {
            $position = similar_text($CharactACherh,$fichierfin[$l], $perc);
            if($perc>0)
            {
                echo "Pourcentage de similariter : $position ($perc %)\n";
                echo "<br>";
                $lienstrouver[$l] = $fichierfin[$l];
                
            }
        }
        
        return $lienstrouver;
    }


    function renommerfichier ($chemindossier,$anciennom,$nouveauxnom)
    {
        rename ($chemindossier."/".$anciennom,$chemindossier."/".$nouveauxnom);
    }

    function uploadfichier($chemindossier,$fichier)
    {
        if(gettype($fichier)=="array")
        {
            $fichier = array_filter($fichier,'strlen');
            for($m=0;$m<sizeof($fichier);$m++)
            {
                
                if($fichier['name']!=null)
                $nom = strtolower($fichier['name'][$m]);

                if($fichier['tmp_name']!=null)
                $tmpnom = $fichier['tmp_name'][$m];

                if($fichier['size']!=null)
                $taille = $fichier['size'][$m];

                if($fichier['type']!="")
                $type = $fichier['type'][$m];

                if($fichier['error']!=null)
                $erreurr = $fichier['error'][$m];

                $dossier = $chemindossier;
                $extension = strtolower(strrchr($nom, '.')); 

                echo "Nom:".$nom." - Nom temp:".$tmpnom." - Taille:".$taille." - Type:".$type." - Extensions:".$extension." - Erreur:".$erreurr." - Dossier:".$dossier." - Key:".$key."<br>";
            }
        }
        else
        {
            $nom = strtolower($fichier['name']);
            $tmpnom = $fichier['tmp_name'];
            $taille = $fichier['size'];
            $type = $fichier['type'];
            $erreurr = $fichier['error'];
            $dossier = $chemindossier;

            $fichier = basename($nom);
            $taille_maxi = 10000000;
            
            $taille = filesize($tmpnom);
            $extensions = array('.png', '.gif', '.jpg', '.jpeg','.mp4', '.mkv', '.avi', '.mpeg','.mp3', '.waw', '.ogg', '.flac','.doc', '.docx', '.pdf', '.txt','.zip','.rar');
            $extension_Sp = array('.vtt','.ass');
            $extension = strtolower(strrchr($nom, '.')); 
            //Début des vérifications de sécurité...

            //echo "Nom:".$nom." - Nom temp:".$tmpnom." - Taille:".$taille." - Type:".$type." - Extensions:".$extension." - Erreur:".$erreurr." - Dossier:".$dossier;
            
            if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
            {
                $erreur = 'Mauvais format de fichier';
            }
        
            if($taille>$taille_maxi)
            {
                $erreur = 'Le fichier est trop gros...';
            }

            if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
            {
                //On formate le nom du fichier ici...
                if($extension!=$extension_Sp)
                {
                    $fichier = strtr($fichier, 
                    'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
                    'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
                    $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
                }

                if(move_uploaded_file($tmpnom, $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
                {
                    return "Fichier Uploader !";
                }
                else //Sinon (la fonction renvoie FALSE).
                {
                    if($erreurr==1)
                    $message="Le fichier dépasse la taille autoriser par upload_max_filesize !";
                    else if($erreurr==2)
                    $message="Le fichier dépasse le poids autorisé par max_file_size !";
                    else if($erreurr==3)
                    $message="Une partit du fichier n'a pas été uploader.";
                    else if($erreurr==3)
                    $message="Aucun fichier.";
                    else if($message==null || $message=="")
                    $message="Une Erreur inconnu c'est produite";
                    return $message;
                }
            }
            elseif(isset($erreur))
            {
                if($erreur!=""&&$erreur!=null)
                if($erreurr==1)
                    $message="Le fichier dépasse la taille autoriser par upload_max_filesize !";
                    else if($erreurr==2)
                    $message="Le fichier dépasse le poids autorisé par max_file_size !";
                    else if($erreurr==3)
                    $message="Une partit du fichier n'a pas été uploader.";
                    else if($erreurr==3)
                    $message="Aucun fichier.";
                    return $message;
            }
        }

    }

    function nettoyageCharacters($chaineCarach)
    {
        $chaineCarach = strtr($chaineCarach, 
                'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
                'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
        $chaineCarach = preg_replace('/([^.a-z0-9]+)/i ', '', $chaineCarach);
        $chaineCarach = strtolower($chaineCarach);

        return $chaineCarach;
    }

    /* ---------------------- INFORMATIONS FICHIER AUDIO ET VIDEO ----------------------- */
                            /* ---------------------------- */

    
    function read_mp3_tags($liens,$musique)
    {
        include("MP3/Id.php");
        $PageEncoding = 'UTF-8';
        $ValidTagTypes = array('id3v1', 'id3v2.3', 'ape');
        $getID3 = new getID3;
        $OldThisFileInfo = $getID3->analyze($liens);
        getid3_lib::CopyTagsToComments($OldThisFileInfo);
            
        //$ValidTagTypes = ValidTagTypes($OldThisFileInfo);
            
        // Analyze file and store returned data in $ThisFileInfo
        $ThisFileInfo = $getID3->analyze($musique);

        getid3_lib::CopyTagsToComments($ThisFileInfo);
        $info_music = array();
            
                $c = "img";
                $titre = (isset($ThisFileInfo['tags']['id3v2']['title'][0]))? $ThisFileInfo['tags']['id3v2']['title'][0]:"Inconnue";
                $album = (isset($ThisFileInfo['tags']['id3v2']['album'][0]))? $ThisFileInfo['tags']['id3v2']['album'][0]:"Inconnue";
                $artiste = (isset($ThisFileInfo['comments_html']['artist'][0]))? $ThisFileInfo['comments_html']['artist'][0]:"Inconnue";
                $band = (isset($ThisFileInfo['comments_html']['band'][0]))? $ThisFileInfo['comments_html']['band'][0]:"Inconnue";
                $genre = (isset($ThisFileInfo['comments_html']['genre'][0]))? $ThisFileInfo['comments_html']['genre'][0]:"Inconnue";
                $time = (isset($ThisFileInfo['playtime_string']))? $ThisFileInfo['playtime_string']:"Inconnue";
                $date = (isset($ThisFileInfo['comments_html']['year'][0]))? $ThisFileInfo['comments_html']['year'][0]:"Inconnue";
                $image = (isset($ThisFileInfo['comments']['picture'][0]))? GetImageCover($ThisFileInfo['comments']['picture'][0], false, $PageEncoding,$c):false;
                $arara = array('Data'=>GetDataImage($ThisFileInfo, false, $PageEncoding));
                $format_file = (isset($ThisFileInfo['fileformat']))? $ThisFileInfo['fileformat']:"Inconnue";
                $format_size = (isset($ThisFileInfo['filesize']))? $ThisFileInfo['filesize']:"Inconnue";
                $bitrate = (isset($ThisFileInfo['audio']['bitrate']))? $ThisFileInfo['audio']['bitrate']:"Inconnue";

                $Data = $arara['Data'];
                $return_music =  Verify($titre , $album , $artiste , $genre , $time , $date , $image, $format_file , $format_size ,$bitrate, $band);
    
                $info_music [] =  new Musique (
                $return_music [0],
                $return_music [1],
                $return_music [2],
                $return_music [3],
                $return_music [4],
                $return_music [5],
                $return_music [6],
                $return_music [7],
                $return_music [8],
                $return_music [9]);

        return $info_music;
    }

    function modif_mp3_tags($dir)
    {

    }

    function GetImageCover($variable, $wrap_in_td=false, $encoding='ISO-8859-1',$classimage) {
        $returnstring = "";
        switch (gettype($variable)) {
            case 'array':
                
                foreach ($variable as $key => $value) {
                    
                    //if (($key == 'data') && isset($variable['image_mime']) && isset($variable['dataoffset'])) {
                    if (($key == 'data') && isset($variable['image_mime'])) {
                        $imageinfo = array();
                        if ($imagechunkcheck = getid3_lib::GetDataImageSize($value, $imageinfo)) {
                            try{ 
                                $base64Image = base64_encode($value);
                            }catch(Exception $e){
                                throw $e;
                            }
                            $returnstring .= '</td>'."\n".'<td><img class="'.$classimage.'" src="data:'.$variable['image_mime'].';base64,'.$base64Image.'" width="'.$imagechunkcheck[0].'" height="'.$imagechunkcheck[1].'"></td></tr>'."\n";
                        } else {
                            $returnstring .= '</td>'."\n".'<td><i>invalid image data</i></td></tr>'."\n";
                        }
                    } else {
                        //$returnstring .= GetImageCover($value, true, $encoding,$classimage);
                    }
                }
                break;
        }
        return $returnstring;
    }

    function GetDataImage($variable, $wrap_in_td=false, $encoding='ISO-8859-1')
    {
        $returnstring = "";
            switch (gettype($variable)) {
                case 'array':
                    
                    foreach ($variable as $key => $value) {
                        
                        //if (($key == 'data') && isset($variable['image_mime']) && isset($variable['dataoffset'])) {
                        if (($key == 'data') && isset($variable['image_mime']) && $returnstring!="") {
                            $imageinfo = array();
                            if ($imagechunkcheck = getid3_lib::GetDataImageSize($value, $imageinfo)) {
                        $variable['image_mime'];

                        } else {
                            $returnstring .= '</td>'."\n".GetImageCover($value, true, $encoding).'</tr>'."\n";
                        }
                    }
                    break;
            }
            return $returnstring;
        }
    }

    function ValidTagTypes ($OldThisFileInfo)
    {
        switch ($OldThisFileInfo['fileformat']) {
            case 'mp3':
            case 'mp2':
            case 'mp1':
                $ValidTagTypes = array('id3v1', 'id3v2.3', 'ape');
                break;

            case 'mpc':
                $ValidTagTypes = array('ape');
                break;

            case 'ogg':
                if (!empty($OldThisFileInfo['audio']['dataformat']) && ($OldThisFileInfo['audio']['dataformat'] == 'flac')) {
                    //$ValidTagTypes = array('metaflac');
                    // metaflac doesn't (yet) work with OggFLAC files
                    $ValidTagTypes = array();
                } else {
                    $ValidTagTypes = array('vorbiscomment');
                }
                break;

            case 'flac':
                $ValidTagTypes = array('metaflac');
                break;

            case 'real':
                $ValidTagTypes = array('real');
                break;

            default:
                $ValidTagTypes = array();
                break;
        }

        return $ValidTagTypes;
    }

    function Verify($titre , $album , $artiste , $genre , $time , $date , $image , $format_file , $format_size , $bitrate, $band)
    {
        $info_music_veri = array();
        if($titre=="" || $titre==null)
        {
            $info_music_veri [0] = "Inconnue";
        }else
        {
            $info_music_veri [0] = $titre;
        }
        
        if ($album==""|| $album==null)
        {
            $info_music_veri [1]= "Inconnue";
        }else
        {
            $info_music_veri [1]= $album;
        }
        
        if ($artiste=="")
        {
            $info_music_veri [2]="Inconnue";
        }else
        {
            $info_music_veri [2]=$artiste;
        }
        
        if ($genre=="")
        {
            $info_music_veri [3]="Inconnue";
        }else
        {
            $info_music_veri [3]=$genre;
        }
        
        if ($time=="")
        {
            $info_music_veri [4]="Inconnue";
        }else
        {
            $info_music_veri [4]=$time;
        }
        
        if ($date=="")
        {
            $info_music_veri [5]="Inconnue";
        }else
        {
            $info_music_veri [5]=$date;
        }
        
        if ($image=="" || $image==null)
        {
            $info_music_veri [6]=null;
        }else
        {
            $info_music_veri [6]=$image;
        }
        
        if ($format_file=="")
        {
            $info_music_veri [7]="Inconnue";
        }else
        {
            $info_music_veri [7]=$format_file;
        }
        
        if ($format_size=="")
        {
            $info_music_veri [8]="Inconnue";
        }else
        {
            $info_music_veri [8]=$format_size;
        }
        
        if ($bitrate=="")
        {
            $info_music_veri [9]="Inconnue";
        }else
        {
            $info_music_veri [9]=$bitrate;
        }

        if($band=="")
        {
            $info_music_veri[10]="Inconnue";
        }else
        {
            $info_music_veri[10]=$band;
        }

        return $info_music_veri;
    }