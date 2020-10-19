<?php
    require "../Outil/lecteur-liens.php";
    require $require_lecteur_fichier;

    $extensionsimage = array('image/png', 'image/gif', 'image/jpeg','image/x-icon','image/webp');
    $extensionsvideo = array('video/mp4', 'video/x-matroska', 'video/x-msvideo', 'video/mpeg','video/ogg','video/webm','video/mpeg','video/x-mpeg');
    $extensionsmusique = array('audio/mpeg', 'audio/x-wav', 'audio/ogg', '.flac','audio/webm','audio/aac', 'audio/mpeg3','audio/x-mpeg-3');
    $extensionsdocuments = array('application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/pdf', 'text/plain','application/zip','application/x-rar-compressed','application/x-tar','application/x-7z-compressed');
    $extensionsoustitre = array('.vtt','.ass');
    error_reporting(E_ALL);
    if(isset($_FILES['fichiers']))
    {
        $i=0;
        if(gettype($_FILES['fichiers'])=="array")
        {
            $fichier_upload = $_FILES['fichiers'];

            for($m=0; $m<sizeof($fichier_upload['name']);$m++)
            {
                if($fichier_upload ['error'][$m]==0)
                {
                    $fichier = array("name"=>$fichier_upload['name'][$m],"type"=>$fichier_upload['type'][$m],"tmp_name"=>$fichier_upload['tmp_name'][$m],"error"=>$fichier_upload['error'][$m],"size"=>$fichier_upload['size'][$m]);
                    if(in_array($fichier['type'], $extensionsimage))
                    {
                        $effectuer = uploadfichier($dossier_image_default,$fichier);
                    }
                    elseif(in_array($fichier['type'], $extensionsvideo))
                    {
                        $effectuer = uploadfichier($dossier_video_default,$fichier);
                    }
                    elseif(in_array($fichier['type'], $extensionsmusique))
                    {
                        $effectuer = uploadfichier($dossier_musique_default,$fichier);
                    }
                    elseif(in_array($fichier['type'], $extensionsdocuments))
                    {
                        $effectuer = uploadfichier($dossier_document_default,$fichier);
                    }elseif(in_array($fichier['type'],$extensionsoustitre))
                    {
                        $effectuer = uploadfichier($dosier_sous_titre,$fichier);
                    }
                }     
            }

        }else
        {
            $fichier = $_FILES['fichiers'];
            $nom = $_FILES['fichiers']['name'];
            $extension = strtolower(strrchr($nom, '.'));

            if(in_array($extension, $extensionsimage))
            {
                $effectuer = uploadfichier($liensHomeImage,$fichier);
            }
            elseif(in_array($extension, $extensionsvideo))
            {
                $effectuer = uploadfichier($liensHomeVideo,$fichier);
            }
            elseif(in_array($extension, $extensionsmusique))
            {/*
                $nom = strtolower($fichier['name']);
                $tmpnom = $fichier['tmp_name'];
                $taille = $fichier['size'];
                $type = $fichier['type'];
                $erreurr = $fichier['error'];
                $dossier = $chemindossier;
            
                echo "Nom:".$nom." - Nom temp:".$tmpnom." - Taille:".$taille." - Type:".$type." - Erreur:".$erreurr." - Dossier:".$dossier;
            */
                $effectuer = uploadfichier($liensHomeMusique,$fichier);
            }
            elseif(in_array($extension, $extensionsdocuments))
            {
                $effectuer = uploadfichier($liensHomeDocuments,$fichier);
            }elseif(in_array($extension,$extensionsoustitre))
            {
                $effectuer = uploadfichier($dosier_sous_titre,$fichier);
            }
        }
        
        

       
    }
    require $require_vue_affichage_upload;
?>